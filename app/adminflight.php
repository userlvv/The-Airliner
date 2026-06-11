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
        <div class="mt-12 px-4 flex justify-center">
            <div class="opacity-80 bg-[#EEEEEE] w-full p-2 max-w-lg rounded-3xl">
                <div class="gap-1 flex justify-center mb-6">
                    <a href="adminflight.php"
                        class="transition bg-[#DDDDDD] hover:bg-[#CCCCCC] justify-center px-4 mt-4 rounded-full py-2">
                        Flights
                    </a>
                    <a href="admintravel.php"
                        class="transition bg-[#DDDDDD] hover:bg-[#CCCCCC] justify-center px-4 mt-4 rounded-full py-2">
                        Travel Plans
                    </a>
                    <a href="adminallinclu.php"
                        class="transition bg-[#DDDDDD] hover:bg-[#CCCCCC] justify-center px-4 mt-4 rounded-full py-2">
                        All Inclusive
                    </a>
                    <a href="index.php"
                        class="transition bg-[#DDDDDD] hover:bg-[#CCCCCC] justify-center px-4 mt-4 rounded-full py-2">
                        Home
                    </a>
                </div>
            </div>
        </div>
        <div class="justify-center px-4 flex mt-12">
            <div class="w-full p-6 opacity-80 bg-[#EEEEEE] max-w-4xl rounded-3xl">
                <div class="mb-6 flex justify-center gap-4"></div>
                <div id="flights" class="tab-content">
                    <h2 class="text-2xl font-bold mb-2">Flights</h2>
                    <div class="grid grid-cols-4 mb-2 pb-2 border-b border-gray-400 font-bold">
                        <div>ID</div>
                        <div>Destination</div>
                        <div>Price</div>
                        <div class="text-right">Actions</div>
                    </div>
                    <?php foreach ($flights as $f): ?>
                        <div class="items-center grid grid-cols-4 border-b border-gray-300 py-2">
                            <div>
                                <?= $f['id'] ?>
                            </div>
                            <div>
                                <?= $f['destination'] ?>
                            </div>
                            <div>€
                                <?= $f['price'] ?>
                            </div>
                            <div class="flex gap-2 justify-end">
                                <a href="edit.php?id=<?= $f['id'] ?>"
                                    class="text-sm px-3 transition rounded-full hover:bg-yellow-500 bg-yellow-400 py-1">
                                    Edit
                                </a>
                                <a href="delete.php?id=<?= $f['id'] ?>"
                                    class="text-white transition bg-red-500 hover:bg-red-600 text-sm rounded-full py-1 px-3"
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