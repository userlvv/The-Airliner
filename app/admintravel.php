<?php
session_start();
if (!isset($_SESSION["admin_id"])) {
    header("Location: adminlogin.php");
    exit;
}
require __DIR__ . "/config/database.php";

$stmt = $pdo->prepare("SELECT * FROM `travel plans`");
$stmt->execute();
$travelplans = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>The Airliner</title>
    <link rel="stylesheet" href="style.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Oswald:wght@200..700&family=Saira:ital,wght@0,100..900;1,100..900&family=Slabo+27px&display=swap");
    </style>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Oswald:wght@200..700&family=Saira:ital,wght@0,1００..9００;1,1００..9００&family=Slabo+27px&display=swap");
    </style>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Oswald:wght@200..700&family=Saira:ital,wght@0,100..900;1,100..900&family=Slabo+27px&family=Tangerine:wght@400;700&display=swap");
    </style>
</head>

<body>
    <main>
        <div class="flex justify-center mt-12 px-4">
            <div class="bg-[#EEEEEE] rounded-3xl p-2 w-full max-w-lg opacity-80">
                <div class="flex justify-center gap-1 mb-6">
                    <a href="adminflight.php"
                        class="px-4 py-2 mt-4 rounded-full bg-[#DDDDDD] justify-center hover:bg-[#CCCCCC] transition">
                        Flights
                    </a>
                    <a href="admintravel.php"
                        class="px-4 py-2 mt-4 rounded-full bg-[#DDDDDD] justify-center hover:bg-[#CCCCCC] transition">
                        Travel Plans
                    </a>
                    <a href="adminallinclu.php"
                        class="px-4 py-2 mt-4 rounded-full bg-[#DDDDDD] justify-center hover:bg-[#CCCCCC] transition">
                        All Inclusive
                    </a>
                    <a href="index.php"
                        class="px-4 py-2 mt-4 rounded-full bg-[#DDDDDD] justify-center hover:bg-[#CCCCCC] transition">
                        Home
                    </a>
                </div>
            </div>
        </div>
        <div class="flex justify-center mt-12 px-4">
            <div class="bg-[#EEEEEE] rounded-3xl p-6 w-full max-w-4xl opacity-80">
                <div class="flex justify-center gap-4 mb-6"></div>
                <div id="flights" class="tab-content">
                    <h2 class="text-2xl font-bold mb-2">Flights</h2>
                    <div class="grid grid-cols-4 font-bold border-b border-gray-400 pb-2 mb-2">
                        <div>ID</div>
                        <div>Destination</div>
                        <div>Price</div>
                        <div class="text-right">Actions</div>
                    </div>
                    <?php foreach ($travelplans as $tp): ?>
                        <div class="grid grid-cols-4 py-2 border-b border-gray-300 items-center">
                            <div>
                                <?= $tp['id'] ?>
                            </div>
                            <div>
                                <?= $tp['destination'] ?>
                            </div>
                            <div>€
                                <?= $tp['price'] ?>
                            </div>
                            <div class="flex gap-2 justify-end">
                                <a href="edit.php?id=<?= $tp['id'] ?>"
                                    class="px-3 py-1 rounded-full bg-yellow-400 hover:bg-yellow-500 transition text-sm">
                                    Edit
                                </a>
                                <a href="delete.php?id=<?= $tp['id'] ?>"
                                    class="px-3 py-1 rounded-full bg-red-500 hover:bg-red-600 transition text-white text-sm"
                                    ;">
                                    Delete
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </main>
</body>