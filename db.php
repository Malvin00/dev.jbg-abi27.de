<?php
// db.php - Stellt die sichere Verbindung zur Datenbank her
$host = '10.35.233.220';
$dbname = 'k329817_abi27_db'; 
$username = 'k329817_abi27_user'; 
$password = 'wobra9-pyprez-Vidtir';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Datenbankverbindung fehlgeschlagen: " . $e->getMessage());
}
?>