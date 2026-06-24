<?php
session_start();
if (!isset($_SESSION["admin_id"])) {
  header("Location: adminlogin.php");
  exit;
}
require __DIR__ . "/../config/database.php";

$id = $_GET['id'];
if (!$id) {
  header("Location: adminpanel.php");
  exit;
}
$stmt = $pdo->prepare("SELECT * FROM flights WHERE id = ?");
$stmt->execute([$id]);
$flights = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $destination = $_POST['destination'];
  $price = $_POST['price'];
  $stmt = $pdo->prepare("UPDATE flights SET destination = ?, price = ? WHERE id = ?");
  $stmt->execute([$destination, $price, $id]);
  header("Location: adminpanel.php");
  exit;
}

$stmt = $pdo->prepare("SELECT * FROM `travel plans`");
$stmt->execute();
$travelplans = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $destination = $_POST['destination'];
  $price = $_POST['price'];
  $stmt = $pdo->prepare("UPDATE `travel plans` SET destination = ?, price = ? WHERE id = ?");
  $stmt->execute([$destination, $price, $id]);
  header("Location: adminpanel.php");
  exit;
}

$stmt = $pdo->prepare("SELECT * FROM `all-inclusive`");
$stmt->execute();
$allinclusive = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $destination = $_POST['destination'];
  $price = $_POST['price'];
  $stmt = $pdo->prepare("UPDATE `all-inclusive` SET destination = ?, price = ? WHERE id = ?");
  $stmt->execute([$destination, $price, $id]);
  header("Location: adminpanel.php");
  exit;
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>The Airliner</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="/../css/style.css" />
</head>

<body class="items-center flex h-screen bg-[#87CEFA] justify-center">
  <div class="shadow rounded-2xl p-6 w-full max-w-md bg-[#EEEEEE]">

    <h1 class="mb-4 text-xl font-bold">
      Edit Flight
    </h1>
    <form method="POST" class="gap-4 flex flex-col">
      <div>
        <label class="text-sm font-medium block">
          Destination
        </label>
        <input type="text" name="destination" value="<?= $flights['destination'] ?>" class="w-full p-2 rounded border"
          required>
      </div>
      <div>
        <label class="block font-medium text-sm">
          Price
        </label>
        <input type="number" step="0.01" name="price" value="<?= $flights['price'] ?>" class="rounded w-full border p-2"
          required>
      </div>
      <button type="submit" class="hover:bg-green-600 bg-green-500 text-white rounded py-2">
        Save
      </button>
    </form>
  </div>
</body>