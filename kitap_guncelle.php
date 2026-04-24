<?php
include 'baglan.php';

$id = $_GET['id'];
$sorgu = $db->prepare("SELECT * FROM kitaplar WHERE id = ?");
$sorgu->execute([$id]);
$kitap = $sorgu->fetch(PDO::FETCH_ASSOC);

if ($_POST) {
    $ad = $_POST['kitap_adi'];
    $yazar = $_POST['yazar_adi'];
    $tur = $_POST['tur'];

    $guncelle = $db->prepare("UPDATE kitaplar SET kitap_adi=?, yazar_adi=?, tur=? WHERE id=?");
    $islem = $guncelle->execute([$ad, $yazar, $tur, $id]);

    if ($islem) {
        header("Location: admin.php?durum=guncellendi");
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Kitap Düzenle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
    <div class="container card p-4 shadow-sm" style="max-width: 500px;">
        <h4>Kitap Düzenle</h4>
        <form method="POST">
            <input type="text" name="kitap_adi" class="form-control mb-2" value="<?php echo $kitap['kitap_adi']; ?>">
            <input type="text" name="yazar_adi" class="form-control mb-2" value="<?php echo $kitap['yazar_adi']; ?>">
            <select name="tur" class="form-select mb-3">
                <option value="Roman" <?php if($kitap['tur'] == 'Roman') echo 'selected'; ?>>Roman</option>
                <option value="Tarih" <?php if($kitap['tur'] == 'Tarih') echo 'selected'; ?>>Tarih</option>
                <option value="Bilim" <?php if($kitap['tur'] == 'Bilim') echo 'selected'; ?>>Bilim</option>
            </select>
            <button class="btn btn-primary w-100">Değişiklikleri Kaydet</button>
        </form>
    </div>
</body>
</html>