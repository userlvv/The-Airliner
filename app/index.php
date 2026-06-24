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
  <link rel="stylesheet" href="css/style.css" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
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
        <button id="themeToggle">Dark Mode</button>
      </div>

      <div class="lg:ml-auto">
        <?php if (isset($_SESSION["user_id"])): ?>
          <a class="bg-[#EEEEEE] hover:bg-[#CCCCCC] transition rounded-full px-4 py-2 opensans" href="/user/userpanel.php">
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
    <div class="flex justify-center mt-12 px-4">
      <div class="flex flex-col opacity-80 items-center gap-8 p-6 bg-[#EEEEEE] rounded-3xl max-w-2xl w-full">
        <h1 class="montserrat text-3xl lg:text-4xl text-center font-bold">
          Welcome to The Airliner
        </h1>
        <p class="lato text-base lg:text-lg text-center">
          Discover the world with us. We offer the best travel deals,
          all-inclusive packages, and private flights to make your journey
          unforgettable.
        </p>
        <a href="travel.php"
          class="bg-[#DDDDDD] rounded-full px-6 py-3 font-opensans text-center hover:bg-[#CCCCCC] transition w-fit">
          Explore Now
        </a>
      </div>
    </div>
    <div class="flex flex-col lg:flex-row justify-center gap-6 mt-12 px-4 lg:px-6">
      <div
        class="flex flex-col justify-between opacity-80 items-center gap-6 p-6 lg:p-12 bg-[#EEEEEE] rounded-3xl w-full max-w-[40rem] min-h-[20rem]">
        <h1 class="montserrat text-xl lg:text-2xl font-bold text-center">
          Popular Destinations
        </h1>
        <div class="flex flex-col gap-2 text-center">
          <p class="opensans">
            <span class="font-bold">Dubai</span> - from €699
          </p>
          <p class="opensans">
            <span class="font-bold">Bali</span> - from €399
          </p>
          <p class="opensans">
            <span class="font-bold">New York</span> - from €599
          </p>
        </div>
        <a href="travel.php"
          class="bg-[#DDDDDD] rounded-full px-5 py-2 text-center hover:bg-[#CCCCCC] transition w-fit">
          View Deals
        </a>
      </div>
      <div
        class="flex flex-col justify-between opacity-80 items-center gap-6 p-6 lg:p-12 bg-[#EEEEEE] rounded-3xl w-full max-w-[40rem] min-h-[20rem]">
        <h1 class="montserrat text-xl lg:text-2xl font-bold text-center">
          Private Flights
        </h1>
        <h2 class="opensans text-center italic text-lg">
          Luxury travel with maximum comfort and privacy
        </h2>
        <ul class="font-opensans text-center">
          <li>VIP Services</li>
          <li>Worldwide Destinations</li>
          <li>Premium Jets</li>
        </ul>
        <a href="private-flights.php"
          class="bg-[#DDDDDD] rounded-full px-5 py-2 text-center hover:bg-[#CCCCCC] transition w-fit">
          View our Services
        </a>
      </div>
    </div>
    <div class="flex flex-col lg:flex-row justify-center gap-6 mt-12 px-4 lg:px-6 mb-12">
      <div
        class="flex flex-col justify-between opacity-80 items-center gap-6 p-6 lg:p-12 bg-[#EEEEEE] rounded-3xl w-full max-w-[40rem] min-h-[20rem]">
        <h1 class="montserrat text-xl lg:text-2xl font-bold text-center">
          Why Choose Us?
        </h1>
        <p class="opensans text-center italic text-lg">
          The Airliner takes your travel expectations to a higher level.
        </p>
        <ul class="opensans text-center">
          <li>Best prices guaranteed</li>
          <li>24/7 customer support</li>
          <li>Trusted by thousands</li>
          <li>Fast booking, good communcation</li>
        </ul>
      </div>
      <div
        class="flex flex-col justify-between opacity-80 items-center gap-6 p-6 lg:p-12 bg-[#EEEEEE] rounded-3xl w-full max-w-[40rem] min-h-[20rem]">
        <h1 class="montserrat text-xl lg:text-2xl font-bold text-center">
          Special Offers
        </h1>
        <p class="opensans text-center text-lg font-semibold">
          Save up to 30% on selected all-inclusive summer destinations!
        </p>
        <a href="all-inclusive.php"
          class="bg-[#DDDDDD] rounded-full px-5 py-2 text-center hover:bg-[#CCCCCC] transition w-fit">
          See Offers
        </a>
      </div>
    </div>
  </main>
  <footer class="bg-[#EEEEEE] opacity-80 rounded-t-3xl mt-12 px-6 py-10">
    <div
      class="max-w-7xl mx-auto flex flex-col md:grid md:grid-cols-2 xl:flex xl:flex-row justify-between gap-10 text-center lg:text-left">
      <div class="flex flex-col gap-3 items-center lg:items-start">
        <h2 class="montserrat text-2xl font-bold">The Airliner</h2>

        <p class="font-opensans max-w-sm">
          Luxury travel experiences, exclusive destinations and premium
          flights tailored for every journey.
        </p>
        <a href="admin/adminlogin.php" class="mt-4">Admin</a>
      </div>
      <div class="flex flex-col gap-3 items-center lg:items-start">
        <h3 class="montserrat text-xl font-bold">Contact</h3>

        <p class="opensans">support@theairliner.com</p>

        <p class="opensans">+31 6 12345678</p>

        <p class="opensans">Amsterdam, Netherlands</p>
      </div>
    </div>
    <div class="border-t border-gray-300 mt-8 pt-6 text-center flex justify-center">
      <p class="opensans text-sm">
        © 2026 The Airliner. All rights reserved.
      </p>
    </div>
  </footer>
</body>

</html>