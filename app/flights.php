<?php
session_start();
require __DIR__ . "/config/database.php";


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

<body class="overflow-x-hidden">
  <header>
    <nav
      class="bg-[#EEEEEE] rounded-3xl opacity-80 flex flex-col lg:flex-row mx-4 lg:mx-8 mt-4 px-4 lg:px-8 py-4 items-center gap-4 lg:gap-0">
      <h2 class="montserrat font-bold text-2xl lg:text-lg text-center lg:text-left">
        <a href="index.php">The Airliner</a>
      </h2>

      <div class="flex-1 flex flex-wrap justify-center items-center gap-3 lg:gap-8 w-full">
        <a class="bg-[#EEEEEE] hover:bg-[#CCCCCC] transition rounded-full px-4 py-2 opensans" href="index.php">Home</a>
        <a class="bg-[#EEEEEE] hover:bg-[#CCCCCC] transition rounded-full px-4 py-2 opensans"
          href="travel.php">Travel</a>
        <a class="bg-[#EEEEEE] hover:bg-[#CCCCCC] transition rounded-full px-4 py-2 opensans"
          href="all-inclusive.php">All inclusive</a>
        <a class="bg-[#EEEEEE] hover:bg-[#CCCCCC] transition rounded-full px-4 py-2 opensans"
          href="flights.php">Flights</a>
        <a class="bg-[#EEEEEE] hover:bg-[#CCCCCC] transition rounded-full px-4 py-2 opensans"
          href="private-flights.php">Private flights</a>
      </div>

      <div class="lg:ml-auto">
        <?php if (isset($_SESSION["user_id"])): ?>
          <a class="bg-[#EEEEEE] hover:bg-[#CCCCCC] transition rounded-full px-4 py-2 opensans" href="userpanel.php">
            User Panel
          </a>
        <?php else: ?>
          <a class="bg-[#EEEEEE] hover:bg-[#CCCCCC] transition rounded-full px-4 py-2 opensans" href="login.php">
            Login
          </a>
        <?php endif; ?>
      </div>
    </nav>
  </header>
  <main>
    <section class="flex justify-center mt-12 px-4">
      <div class="bg-[#EEEEEE] opacity-80 rounded-3xl p-8 lg:p-12 text-center max-w-4xl w-full">
        <h1 class="montserrat text-3xl lg:text-4xl font-bold mb-4">
          Flight Destinations
        </h1>
        <p class="opensans text-lg lg:text-xl max-w-2xl mx-auto">
          Discover direct flights from Amsterdam to the world’s most iconic
          destinations. Travel in comfort, speed and style with The Airliner.
        </p>
      </div>
    </section>

    <section class="px-4 lg:px-8 py-12">
      <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 mx-auto">
        <div class="bg-[#EEEEEE] opacity-80 rounded-3xl p-6 flex flex-col">
          <h2 class="montserrat text-2xl font-bold mb-2">
            Amsterdam → Dubai
          </h2>
          <p class="opensans mb-4 flex-grow">
            Direct long-haul flight to a modern luxury city full of
            skyscrapers, beaches and shopping.
          </p>
          <p class="font-bold text-xl mb-4">From €349</p>
          <a href="#" class="bg-[#DDDDDD] hover:bg-[#CCCCCC] transition rounded-full py-3 text-center">
            Book Flight
          </a>
        </div>

        <div class="bg-[#EEEEEE] opacity-80 rounded-3xl p-6 flex flex-col">
          <h2 class="montserrat text-2xl font-bold mb-2">
            Amsterdam → New York
          </h2>
          <p class="opensans mb-4 flex-grow">
            Fly to the city that never sleeps with world-class entertainment,
            culture and skyline views.
          </p>
          <p class="font-bold text-xl mb-4">From €499</p>
          <a href="#" class="bg-[#DDDDDD] hover:bg-[#CCCCCC] transition rounded-full py-3 text-center">
            Book Flight
          </a>
        </div>

        <div class="bg-[#EEEEEE] opacity-80 rounded-3xl p-6 flex flex-col">
          <h2 class="montserrat text-2xl font-bold mb-2">Amsterdam → Bali</h2>
          <p class="opensans mb-4 flex-grow">
            Escape to tropical paradise with beaches, temples and relaxing
            luxury resorts.
          </p>
          <p class="font-bold text-xl mb-4">From €399</p>
          <a href="#" class="bg-[#DDDDDD] hover:bg-[#CCCCCC] transition rounded-full py-3 text-center">
            Book Flight
          </a>
        </div>

        <div class="bg-[#EEEEEE] opacity-80 rounded-3xl p-6 flex flex-col">
          <h2 class="montserrat text-2xl font-bold mb-2">
            Amsterdam → Tokyo
          </h2>
          <p class="opensans mb-4 flex-grow">
            Experience futuristic city life mixed with tradition, food culture
            and neon skylines.
          </p>
          <p class="font-bold text-xl mb-4">From €579</p>
          <a href="#" class="bg-[#DDDDDD] hover:bg-[#CCCCCC] transition rounded-full py-3 text-center">
            Book Flight
          </a>
        </div>

        <div class="bg-[#EEEEEE] opacity-80 rounded-3xl p-6 flex flex-col">
          <h2 class="montserrat text-2xl font-bold mb-2">
            Amsterdam → Paris
          </h2>
          <p class="opensans mb-4 flex-grow">
            Quick and stylish European getaway to the city of romance, fashion
            and culture.
          </p>
          <p class="font-bold text-xl mb-4">From €129</p>
          <a href="#" class="bg-[#DDDDDD] hover:bg-[#CCCCCC] transition rounded-full py-3 text-center">
            Book Flight
          </a>
        </div>

        <div class="bg-[#EEEEEE] opacity-80 rounded-3xl p-6 flex flex-col">
          <h2 class="montserrat text-2xl font-bold mb-2">
            Amsterdam → Cape Town
          </h2>
          <p class="opensans mb-4 flex-grow">
            Discover breathtaking landscapes, mountains and coastlines in
            South Africa’s most iconic city.
          </p>
          <p class="font-bold text-xl mb-4">From €699</p>
          <a href="#" class="bg-[#DDDDDD] hover:bg-[#CCCCCC] transition rounded-full py-3 text-center">
            Book Flight
          </a>
        </div>
      </div>
    </section>
  </main>
  <footer class="bg-[#EEEEEE] opacity-80 rounded-t-3xl mt-12 px-6 py-10">
    <div
      class="max-w-7xl mx-auto flex flex-col md:grid md:grid-cols-2 xl:flex xl:flex-row justify-between gap-10 text-center lg:text-left">
      <div class="flex flex-col gap-3 items-center lg:items-start">
        <h2 class="font-montserrat text-2xl font-bold">The Airliner</h2>

        <p class="font-opensans max-w-sm">
          Luxury travel experiences, exclusive destinations and premium
          flights tailored for every journey.
        </p>
        <a href="adminlogin.php" class="mt-4">Admin</a>
      </div>
      <div class="flex flex-col gap-3 items-center lg:items-start">
        <h3 class="font-montserrat text-xl font-bold">Contact</h3>

        <p class="font-opensans">support@theairliner.com</p>

        <p class="font-opensans">+31 6 12345678</p>

        <p class="font-opensans">Amsterdam, Netherlands</p>
      </div>
    </div>
    <div class="border-t border-gray-300 mt-8 pt-6 text-center flex justify-center">
      <p class="font-opensans text-sm">
        © 2026 The Airliner. All rights reserved.
      </p>
    </div>
  </footer>
</body>

</html>