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
  <header>

  </header>
  <main>
    <div class="mt-12 px-4 justify-center flex">
      <div class="opacity-80 w-full bg-[#EEEEEE] p-2 max-w-lg rounded-3xl">
        <div class="gap-1 mb-6 flex justify-center">
          <a href="adminflight.php"
            class="transition hover:bg-[#CCCCCC] justify-center mt-4 bg-[#DDDDDD] px-4 rounded-full py-2">
            Flights
          </a>
          <a href="admintravel.php"
            class="transition hover:bg-[#CCCCCC] justify-center mt-4 bg-[#DDDDDD] px-4 rounded-full py-2">
            Travel Plans
          </a>
          <a href="adminallinclu.php"
            class="transition hover:bg-[#CCCCCC] justify-center mt-4 bg-[#DDDDDD] px-4 rounded-full py-2">
            All Inclusive
          </a>
          <a href="index.php"
            class="transition hover:bg-[#CCCCCC] justify-center mt-4 bg-[#DDDDDD] px-4 rounded-full py-2">
            Home
          </a>
        </div>
      </div>
    </div>

  </main>
  <footer>

  </footer>
</body>

</html>