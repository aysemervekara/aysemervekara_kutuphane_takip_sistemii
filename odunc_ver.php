<?php
error_reporting(E_ALL);
ini_set('display_errors', 1); // Hata varsa ekrana yazması için ekledik

include 'baglan.php';

// Form gönderildi mi kontrol et
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uye_id = $_POST['uye_id'];
    $kitap_id = $_POST['kitap_id'];
    $verilis = $_POST['verilis_tarihi'];
    $iade = $_POST['iade_tarihi'];

    try {
        $sorgu = $db->prepare("INSERT INTO odunc (uye_id, kitap_id, verilis_tarihi, iade_tarihi, durum) VALUES (?, ?, ?, ?, 0)");
        $ekle = $sorgu->execute([$uye_id, $kitap_id, $verilis, $iade]);

        if ($ekle) {
            echo "<script>alert('Kitap başarıyla ödünç verildi!'); window.location.href='admin.php';</script>";
            exit;
        } else {
            echo "Ekleme sırasında bir sorun oluştu.";
        }
    } catch (PDOException $e) {
        echo "Veritabanı Hatası: " . $e->getMessage();
    }
}

// Listeleri Çek
$uyeler = $db->query("SELECT * FROM uyeler ORDER BY ad_soyad ASC")->fetchAll(PDO::FETCH_ASSOC);
$kitaplar = $db->query("SELECT * FROM kitaplar ORDER BY kitap_adi ASC")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Ödünç Ver - Umut Kütüphanesi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow mx-auto" style="max-width: 600px; border-radius: 15px;">
            <div class="card-header bg-warning text-dark text-center py-3">
                <h4 class="mb-0">📖 Kitap Ödünç Ver</h4>
            </div>
            <div class="card-body p-4">
                <form action="odunc_ver.php" method="POST">
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Üye Seçin</label>
                        <select name="uye_id" class="form-select" required>
                            <option value="">-- Seçiniz --</option>
                            <?php foreach($uyeler as $uye): ?>
                                <option value="<?php echo $uye['id']; ?>"><?php echo $uye['ad_soyad']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Kitap Seçin</label>
                        <select name="kitap_id" class="form-select" required>
                            <option value="">-- Seçiniz --</option>
                            <?php foreach($kitaplar as $kitap): ?>
                                <option value="<?php echo $kitap['id']; ?>"><?php echo $kitap['kitap_adi']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Veriliş Tarihi</label>
                            <input type="date" name="verilis_tarihi" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">İade Tarihi</label>
                            <input type="date" name="iade_tarihi" class="form-control" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-warning w-100 fw-bold py-2 shadow-sm">Kayıt Oluştur</button>
                    <a href="admin.php" class="btn btn-link w-100 text-muted mt-2">Geri Dön</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>