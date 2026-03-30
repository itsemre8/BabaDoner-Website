<?php
$host = 'db';
$dbname = 'babadoner';
$gebruiker = 'root';
$wachtwoord = 'rootpassword';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $gebruiker, $wachtwoord);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Verbinding mislukt: " . $e->getMessage());
}
?>