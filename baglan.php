<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "kutuphane_db";

try {
    $db = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
} catch ( PDOException $e ){
    print $e->getMessage();
}
?>