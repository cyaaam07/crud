<?php
// config.php
$host = 'localhost';
$dbname = 'music_db';
$user = 'root';
$pass = ''; // standaard XAMPP wachtwoord is leeg

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>