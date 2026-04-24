<?php
include 'baglan.php'; // Veritabanı bağlantımızı dahil ediyoruz

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan gelen verileri alıyoruz
    $kitap_adi = $_POST['kitap_adi'];
    $yazar_adi = $_POST['yazar_adi'];
    $tur       = $_POST['tur'];

    // Veritabanına kayıt için SQL hazırlıyoruz
    $sorgu = $db->prepare("INSERT INTO kitaplar (kitap_adi, yazar_adi, tur) VALUES (?, ?, ?)");
    $sonuc = $sorgu->execute([$kitap_adi, $yazar_adi, $tur]);

    if ($sonuc) {
        // Kayıt başarılıysa tekrar admin paneline geri gönder
        header("Location: admin.php?durum=basarili");
    } else {
        echo "Bir hata oluştu, kitap kaydedilemedi.";
    }
}
?>