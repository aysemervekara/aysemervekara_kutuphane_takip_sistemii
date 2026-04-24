<?php
session_start();
if (isset($_SESSION['admin'])) { header("Location: admin.php"); exit; }

if ($_POST) {
    $kullanici = $_POST['kullanici'];
    $sifre = $_POST['sifre'];

    // Senin belirlediğin bilgiler
    if ($kullanici == "mervekara" && $sifre == "92068ccf") {
        $_SESSION['admin'] = true;
        header("Location: admin.php");
        exit;
    } else {
        $hata = "Hatalı kullanıcı adı veya şifre!";
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yönetici Girişi - Umut Kütüphanesi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #1a1a2e; display: flex; align-items: center; height: 100vh; font-family: 'Segoe UI', sans-serif; }
        .login-card { width: 100%; max-width: 400px; margin: auto; border: none; border-radius: 20px; box-shadow: 0 15px 35px rgba(0,0,0,0.3); background: #ffffff; }
        .btn-login { border-radius: 10px; padding: 12px; font-weight: bold; font-size: 1.1rem; transition: 0.3s; }
        .btn-login:hover { background-color: #0d6efd; transform: translateY(-2px); }
        .form-control { border-radius: 10px; padding: 12px; border: 1px solid #dee2e6; }
        .form-control:focus { box-shadow: 0 0 0 0.25 margin-right: rgba(13, 110, 253, 0.1); }
    </style>
</head>
<body>
    <div class="card login-card p-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-primary">Giriş Yap</h2>
            <p class="text-muted small">Yönetim paneline erişmek için bilgilerinizi giriniz.</p>
        </div>
        
        <?php if(isset($hata)): ?>
            <div class="alert alert-danger py-2 small text-center shadow-sm"><?php echo $hata; ?></div>
        <?php endif; ?>

        <form method="POST" autocomplete="off">
            <div class="mb-3">
                <label class="form-label small fw-bold text-secondary">Kullanıcı Adı</label>
                <input type="text" name="kullanici" class="form-control" autocomplete="off" required>
            </div>
            <div class="mb-4">
                <label class="form-label small fw-bold text-secondary">Şifre</label>
                <input type="password" name="sifre" class="form-control" autocomplete="off" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 btn-login shadow-sm">Panele Bağlan</button>
        </form>
        
        <div class="text-center mt-4">
            <a href="index.php" class="text-decoration-none small text-muted">← Kütüphaneye Geri Dön</a>
        </div>
    </div>
</body>
</html>