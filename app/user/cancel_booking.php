<?php
session_start();
require __DIR__ . "/../config/database.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: /../login.php");
    exit;
}

$booking_id = $_GET['id'];
$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare("DELETE FROM bookings WHERE id = ? AND user_id = ?");
$stmt->execute([$booking_id, $user_id]);

header("Location: /../user/mybookings.php");
exit;
