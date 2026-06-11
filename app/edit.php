<?php
session_start();
if (!isset($_SESSION["admin_id"])) {
  header("Location: adminlogin.php");
  exit;
}
require __DIR__ . "/config/database.php";

$stmt = $pdo->prepare("SELECT * FROM `flights`");
$stmt->execute();
$flights = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT * FROM `travel plans`");
$stmt->execute();
$travelplans = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT * FROM `all-inclusive`");
$stmt->execute();
$allinclusive = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>