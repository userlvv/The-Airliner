<?php
session_start();
require __DIR__ . "/config/database.php";
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $item_type = $_POST['item_type'];
    $item_id = $_POST['item_id'];
    $destination = $_POST['destination'];
    $price = $_POST['price'];


    $stmt = $pdo->prepare("INSERT INTO bookings (user_id, item_type, item_id, destination, price) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$user_id, $item_type, $item_id, $destination, $price]);


    if ($item_type === 'flight') {
        $redirect = 'flights.php';
    } elseif ($item_type === 'all_inclusive') {
        $redirect = 'all-inclusive.php';
    } elseif ($item_type === 'travelplan') {
        $redirect = 'travel.php';
    } else {
        $redirect = 'private-flights.php';
    }

    header("Location: $redirect?success=1");

    exit;

}
