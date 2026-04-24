<?php
include 'baglan.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Kitabın durumunu 1 (İade Edildi) olarak güncelliyoruz
    $sorgu = $db->prepare("UPDATE odunc SET durum = 1 WHERE id = ?");
    $guncelle = $sorgu->execute([$id]);

    if ($guncelle) {
        // İşlem başarılıysa admin paneline geri dön
        header("Location: admin.php");
    } else {
        echo "İade işlemi sırasında bir hata oluştu.";
    }
}
?>