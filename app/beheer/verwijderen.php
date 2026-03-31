<?php
require '../db.php';
session_start();

if (!isset($_SESSION['ingelogd'])) {
    header('Location: ../login.php');
    exit;
}

$stmt = $pdo->prepare("DELETE FROM gerechten WHERE id = ?");
$stmt->execute([$_GET['id']]);
header('Location: index.php');
exit;
?>