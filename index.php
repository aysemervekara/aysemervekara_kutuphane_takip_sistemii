<?php
include 'baglan.php'; // Veritabanı bağlantımızı dahil ediyoruz

// Arama terimi varsa alıyoruz
$arama = isset($_GET['q']) ? $_GET['q'] : '';
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Umut Kütüphanesi - Kitap Keşfet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .hero-section { background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'); background-size: cover; color: white; padding: 100px 0; text-align: center; }
        .search-box { max-width: 600px; margin: -30px auto 0; background: white; padding: 20px; border-radius: 50px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .book-card { border: none; border-radius: 15px; transition: transform 0.3s; }
        .book-card:hover { transform: translateY(-10px); }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">📚 UMUT KÜTÜPHANESİ</a>
        <div class="ms-auto">
            <a href="uye_ekle.php" class="btn btn-outline-primary me-2">Üye Kaydı Yap</a>
            <a href="login.php" class="btn btn-primary">Yönetici Girişi</a>
        </div>
    </div>
</nav>

<header class="hero-section">
    <div class="container">
        <h1 class="display-4 fw-bold">Kitap Keşfet</h1>
        <p class="lead">Kütüphanemizdeki yüzlerce kitap arasından dilediğini ara.</p>
    </div>
</header>

<div class="container">
    <div class="search-box">
        <form action="index.php" method="GET" class="d-flex">
            <input type="text" name="q" class="form-control border-0 px-4" placeholder="Kitap veya yazar adı yazın..." value="<?php echo $arama; ?>">
            <button type="submit" class="btn btn-primary rounded-pill px-4 ms-2">Ara</button>
        </form>
    </div>
</div>

<div class="container mt-5 mb-5">
    <h3 class="mb-4 text-center"><?php echo $arama ? "'$arama' İçin Sonuçlar" : "Tüm Kitaplar"; ?></h3>
    <div class="row g-4">
        <?php
        // Arama yapılmışsa ona göre, yapılmamışsa tüm kitapları getiriyoruz
        if ($arama) {
            $sorgu = $db->prepare("SELECT * FROM kitaplar WHERE kitap_adi LIKE ? OR yazar_adi LIKE ?");
            $sorgu->execute(["%$arama%", "%$arama%"]);
        } else {
            $sorgu = $db->query("SELECT * FROM kitaplar");
        }
        
        $kitaplar = $sorgu->fetchAll(PDO::FETCH_ASSOC);

        if (count($kitaplar) > 0) {
            foreach ($kitaplar as $kitap) {
                ?>
                <div class="col-md-4">
                    <div class="card h-100 book-card shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold"><?php echo $kitap['kitap_adi']; ?></h5>
                            <p class="card-text text-muted"><?php echo $kitap['yazar_adi']; ?></p>
                            <span class="badge bg-info text-dark"><?php echo $kitap['tur']; ?></span>
                        </div>
                        <div class="card-footer bg-transparent border-0 text-center pb-3">
                            <button class="btn btn-sm btn-outline-success">Mevcut</button>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<div class='col-12 text-center'><p class='text-muted'>Aradığınız kitap bulunamadı.</p></div>";
        }
        ?>
    </div>
</div>

<footer class="bg-dark text-white text-center py-4">
    <p>&copy; 2026 Umut Kütüphanesi - Bilgi Gelecektir.</p>
</footer>

</body>
</html>