<?php
session_start();
if (!isset($_SESSION["admin_id"])) {
    header("Location: adminlogin.php");
    exit;
}
require __DIR__ . "/config/database.php";

$stmt = $pdo->prepare("SELECT * FROM `all-inclusive`");
$stmt->execute();
$allinclusive = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        <div class="flex mt-12 justify-center px-4">
            <div class="w-full p-2 rounded-3xl bg-[#EEEEEE] opacity-80 max-w-lg">
                <div class="flex justify-center mb-6 gap-1">
                    <a href="adminflight.php"
                        class="justify-center mt-4 transition hover:bg-[#CCCCCC] rounded-full bg-[#DDDDDD] px-4 py-2">
                        Flights
                    </a>
                    <a href="admintravel.php"
                        class="justify-center mt-4 transition hover:bg-[#CCCCCC] rounded-full bg-[#DDDDDD] px-4 py-2">
                        Travel Plans
                    </a>
                    <a href="adminallinclu.php"
                        class="justify-center mt-4 transition hover:bg-[#CCCCCC] rounded-full bg-[#DDDDDD] px-4 py-2">
                        All Inclusive
                    </a>
                    <a href="index.php"
                        class="justify-center mt-4 transition hover:bg-[#CCCCCC] rounded-full bg-[#DDDDDD] px-4 py-2">
                        Home
                    </a>
                </div>
            </div>
        </div>
        <div class="justify-center flex px-4 mt-12">
            <div class="opacity-80 max-w-4xl w-full rounded-3xl p-6 bg-[#EEEEEE]">
                <div class="flex mb-6 justify-center gap-4"></div>
                <div id="flights" class="tab-content">
                    <h2 class="text-2xl font-bold mb-2">Flights</h2>
                    <div class="grid grid-cols-4 border-b mb-2 font-bold pb-2 border-gray-400">
                        <div>ID</div>
                        <div>Destination</div>
                        <div>Price</div>
                        <div class="text-right">Actions</div>
                    </div>
                    <?php foreach ($allinclusive as $ai): ?>
                        <div class="grid items-center grid-cols-4 py-2 border-b border-gray-300">
                            <div>
                                <?= $ai['id'] ?>
                            </div>
                            <div>
                                <?= $ai['destination'] ?>
                            </div>
                            <div>€
                                <?= $ai['price'] ?>
                            </div>
                            <div class="flex gap-2 justify-end">
                                <a href="edit.php?id=<?= $ai['id'] ?>"
                                    class="transition text-sm bg-yellow-400 hover:bg-yellow-500 rounded-full py-1 px-3">
                                    Edit
                                </a>
                                <a href="delete.php?id=<?= $ai['id'] ?>"
                                    class="text-sm text-white transition bg-red-500 rounded-full px-3 py-1 hover:bg-red-600"
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
</body></html>