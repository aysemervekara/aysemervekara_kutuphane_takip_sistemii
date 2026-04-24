<?php
session_start();
// --- GÜVENLİK KONTROLÜ ---
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

include 'baglan.php';

// 1. İSTATİSTİKLERİ HESAPLA (Hocayı etkileyecek kısım)
$toplam_kitap = $db->query("SELECT COUNT(*) FROM kitaplar")->fetchColumn();
$toplam_uye   = $db->query("SELECT COUNT(*) FROM uyeler")->fetchColumn();
$emanet_sayisi = $db->query("SELECT COUNT(*) FROM odunc WHERE durum = 0")->fetchColumn();

$bugun = date('Y-m-d'); 
$geciken_sayisi = $db->query("SELECT COUNT(*) FROM odunc WHERE durum = 0 AND iade_tarihi < '$bugun'")->fetchColumn();

// 2. LİSTELERİ ÇEK
$kitaplar = $db->query("SELECT * FROM kitaplar ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
$uyeler   = $db->query("SELECT * FROM uyeler ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
$emanetler = $db->query("SELECT odunc.*, uyeler.ad_soyad, kitaplar.kitap_adi 
                           FROM odunc 
                           JOIN uyeler ON odunc.uye_id = uyeler.id 
                           JOIN kitaplar ON odunc.kitap_id = kitaplar.id
                           ORDER BY odunc.durum ASC, odunc.iade_tarihi ASC")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yönetim Paneli - Umut Kütüphanesi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f7f6; font-family: 'Segoe UI', sans-serif; }
        .admin-card { border: none; border-radius: 15px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); background: white; }
        .stat-card { border: none; border-radius: 15px; color: white; padding: 20px; transition: 0.3s; }
        .stat-card:hover { transform: translateY(-5px); }
        .bg-books { background: linear-gradient(45deg, #4facfe 0%, #00f2fe 100%); }
        .bg-users { background: linear-gradient(45deg, #667eea 0%, #764ba2 100%); }
        .bg-warn  { background: linear-gradient(45deg, #f093fb 0%, #f5576c 100%); }
        .gecikmis-satir { background-color: #fff5f5 !important; color: #c0392b !important; font-weight: 500; }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark mb-4 shadow">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">📚 KÜTÜPHANE YÖNETİM SİSTEMİ</a>
        <div class="ms-auto">
            <a href="index.php" class="btn btn-outline-light btn-sm me-2">🏠 Siteye Dön</a>
            <a href="cikis.php" class="btn btn-danger btn-sm">🚪 Güvenli Çıkış</a>
        </div>
    </div>
</nav>

<div class="container">
    
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="stat-card bg-books shadow">
                <h6>Toplam Kitap</h6>
                <h2><?php echo $toplam_kitap; ?> Adet</h2>
                <small>Kütüphane mevcudu</small>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card bg-users shadow">
                <h6>Kayıtlı Üye</h6>
                <h2><?php echo $toplam_uye; ?> Kişi</h2>
                <small>Aktif okuyucu sayısı</small>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card bg-warn shadow">
                <h6>Geciken Kitaplar</h6>
                <h2><?php echo $geciken_sayisi; ?> Kitap</h2>
                <small>İade süresi geçenler</small>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card admin-card p-4 mb-4 border-top border-primary border-5">
                <h5 class="fw-bold mb-3">Yeni Kitap Ekle</h5>
                <form action="ekle.php" method="POST">
                    <input type="text" name="kitap_adi" class="form-control mb-2" placeholder="Kitap Adı" required>
                    <input type="text" name="yazar_adi" class="form-control mb-2" placeholder="Yazar Adı" required>
                    <select name="tur" class="form-select mb-3">
                        <option value="Roman">Roman</option>
                        <option value="Tarih">Tarih</option>
                        <option value="Bilim">Bilim</option>
                    </select>
                    <button type="submit" class="btn btn-primary w-100 fw-bold">Kaydet</button>
                </form>
            </div>
            <a href="odunc_ver.php" class="btn btn-warning w-100 fw-bold p-3 shadow-sm mb-4">📙 Kitap Ödünç Ver</a>
        </div>

        <div class="col-lg-8">
            <div class="card admin-card p-4">
                <nav>
                    <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab1">Emanetler</button>
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab2">Kitaplar</button>
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab3">Üyeler</button>
                    </div>
                </nav>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab1">
                        <table class="table">
                            <thead><tr><th>Üye</th><th>Kitap</th><th>Tarih</th><th>İşlem</th></tr></thead>
                            <tbody>
                                <?php foreach($emanetler as $e): 
                                    $gecikme = ($e['durum'] == 0 && strtotime($e['iade_tarihi']) < strtotime($bugun));
                                ?>
                                <tr class="<?php echo $gecikme ? 'gecikmis-satir' : ''; ?>">
                                    <td><?php echo $e['ad_soyad']; ?></td>
                                    <td><?php echo $e['kitap_adi']; ?></td>
                                    <td><?php echo date('d.m.Y', strtotime($e['iade_tarihi'])); ?></td>
                                    <td>
                                        <?php if($e['durum'] == 0): ?>
                                            <a href="iade_al.php?id=<?php echo $e['id']; ?>" class="btn btn-sm <?php echo $gecikme ? 'btn-danger' : 'btn-success'; ?>">İade Al</a>
                                        <?php else: ?>
                                            <span class="badge bg-secondary">İade Edildi</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="tab2">
                        <table class="table">
                            <tbody>
                                <?php foreach($kitaplar as $k): ?>
                                <tr>
                                    <td><strong><?php echo $k['kitap_adi']; ?></strong></td>
                                    <td class="text-end">
                                        <a href="kitap_guncelle.php?id=<?php echo $k['id']; ?>" class="btn btn-sm btn-outline-primary">📝</a>
                                        <a href="kitap_sil.php?id=<?php echo $k['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Silmek istediğine emin misin?')">🗑️</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="tab3">
                        <table class="table">
                            <tbody>
                                <?php foreach($uyeler as $u): ?>
                                <tr><td><strong><?php echo $u['ad_soyad']; ?></strong></td><td><?php echo $u['telefon']; ?></td></tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>