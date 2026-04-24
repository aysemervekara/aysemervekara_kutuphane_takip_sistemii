<?php
include 'baglan.php';

if ($_POST) {
    $ad_soyad = $_POST['ad_soyad'];
    $telefon  = $_POST['telefon'];
    $eposta   = $_POST['eposta'];

    $sorgu = $db->prepare("INSERT INTO uyeler (ad_soyad, telefon, eposta) VALUES (?, ?, ?)");
    $ekle = $sorgu->execute([$ad_soyad, $telefon, $eposta]);

    if ($ekle) {
        echo "<script>alert('Aramıza hoş geldin! Kaydın başarıyla oluşturuldu.'); window.location.href='index.php';</script>";
    } else {
        echo "<div class='alert alert-danger text-center'>Kayıt sırasında bir veritabanı hatası oluştu.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Umut Kütüphanesi - Üye Ol</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f0f2f5; font-family: 'Segoe UI', sans-serif; }
        .register-card { max-width: 450px; margin: 60px auto; border: none; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .form-control { border-radius: 10px; padding: 12px; }
        .btn-register { border-radius: 10px; padding: 12px; font-weight: bold; transition: 0.3s; }
    </style>
</head>
<body>
    <div class="container">
        <div class="card register-card">
            <div class="card-body p-5">
                <h2 class="text-center fw-bold text-primary mb-4">Üye Kaydı</h2>
                <p class="text-center text-muted mb-4">Kütüphane dünyasına katılmak için bilgilerinizi doğru giriniz.</p>
                
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Ad Soyad</label>
                        <input type="text" name="ad_soyad" class="form-control" 
                               placeholder="Sadece harf kullanın" 
                               pattern="[A-Za-zÇçĞğİıÖöŞşÜü\s]+" 
                               title="Lütfen sadece harf giriniz (Rakam kullanılamaz)." 
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Telefon Numarası</label>
                        <input type="text" name="telefon" class="form-control" 
                               placeholder="Örn: 05XXXXXXXXX" 
                               oninput="this.value = this.value.replace(/[^0-9]/g, '');" 
                               maxlength="11"
                               pattern="\d{10,11}" 
                               title="Lütfen sadece rakam giriniz (10 veya 11 haneli)." 
                               required>
                        <div class="form-text">Harf girilemez, sadece rakam.</div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">E-posta Adresi</label>
                        <input type="email" name="eposta" class="form-control" 
                               placeholder="ornek@mail.com" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 btn-register shadow">Kaydı Tamamla</button>
                    
                    <hr class="my-4 text-muted">
                    <div class="text-center">
                        <a href="index.php" class="text-decoration-none text-secondary">← Ana Sayfaya Dön</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>