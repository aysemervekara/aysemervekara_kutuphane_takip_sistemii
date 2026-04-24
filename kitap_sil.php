<?php
include 'baglan.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sorgu = $db->prepare("DELETE FROM kitaplar WHERE id = ?");
    $sil = $sorgu->execute([$id]);

    if ($sil) {
        header("Location: admin.php?durum=silindi");
    }
}
?>