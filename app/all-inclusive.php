<?php
session_start();
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
  <link rel="stylesheet" href="css/style.css" />
  <script src="https://cdn.tailwindcss.com"></script>
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
        <h1 class="montserrat text-1xl lg:text-3xl font-bold mb-4">
          All Inclusive Holidays
        </h1>
        <p class="opensans text-lg lg:text-xl max-w-2xl mx-auto">
          Enjoy luxury resorts, unlimited dining, premium drinks and
          unforgettable experiences at the world's most popular destinations.
        </p>
      </div>
    </section>

    <?php if (isset($_GET['success'])): ?>
      <div class="bg-green-200 text-green-800 rounded-full px-6 py-3 text-center max-w-md mx-auto mb-6">
        Booking confirmed!
      </div>
    <?php endif; ?>

    <section class="px-4 lg:px-8 py-12">
      <input type="text" id="search" onkeyup="zoek()" placeholder="Search for all inclusive packages..."
        class="bg-[#EEEEEE] opacity-80 rounded-full px-6 py-3 opensans block mx-auto mb-8 w-full max-w-md">
      <div class="mx-auto gap-8 grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1" id="grid">
        <?php foreach ($allinclusive as $ai): ?>
          <div class="flex flex-col rounded-3xl opacity-80 bg-[#EEEEEE]">
            <!--<img src="" class="h-64 w-full object-cover" />-->
            <div class="flex flex-col flex-grow p-6">
              <h2 class="mb-2 text-2xl font-bold montserrat">
                <?= $ai['destination'] ?>
              </h2>
              <p class="flex-grow mb-4 opensans">
                Private flight to
                <?= $ai['destination'] ?> with transport to a luxury hotel and a two-week stay.
              </p>
              <p class="text-xl font-bold mb-4">
                From €
                <?= $ai['price'] ?> per person
              </p>
              <form action="book.php" method="POST">
                <input type="hidden" name="item_type" value="all_inclusive">
                <input type="hidden" name="item_id" value="<?= $ai['id'] ?>">
                <input type="hidden" name="destination" value="<?= $ai['destination'] ?>">
                <input type="hidden" name="price" value="<?= $ai['price'] ?>">
                <button type="submit" class="w-full transition bg-[#DDDDDD] hover:bg-[#CCCCCC] rounded-full py-3 text-center">
                  Book Vacation
                </button>
              </form>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    </section>
    <section class="px-4 lg:px-8 pb-12">
      <div class="bg-[#EEEEEE] opacity-80 rounded-3xl p-8 max-w-6xl mx-auto">
        <h2 class="montserrat text-3xl font-bold text-center mb-8">
          What's Included?
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 text-center">
          <div>
            <h3 class="font-bold text-xl mb-2">Dining</h3>
            <p>Unlimited meals and snacks.</p>
          </div>
          <div>
            <h3 class="font-bold text-xl mb-2">Drinks</h3>
            <p>Premium beverages included.</p>
          </div>
          <div>
            <h3 class="font-bold text-xl mb-2">Resorts</h3>
            <p>Luxury accommodation.</p>
          </div>
          <div>
            <h3 class="font-bold text-xl mb-2">Flights</h3>
            <p>Return flights available.</p>
          </div>
        </div>
      </div>
    </section>


    <footer class="bg-[#EEEEEE] opacity-80 rounded-t-3xl mt-12 px-6 py-10">
      <div
        class="max-w-7xl mx-auto flex flex-col md:grid md:grid-cols-2 xl:flex xl:flex-row justify-between gap-10 text-center lg:text-left">
        <div class="flex flex-col gap-3 items-center lg:items-start">
          <h2 class="montserrat text-2xl font-bold">The Airliner</h2>

          <p class="opensans max-w-sm">
            Luxury travel experiences, exclusive destinations and premium
            flights tailored for every journey.
          </p>
          <a href="adminlogin.php" class="mt-4">Admin</a>
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

    <script>
      function zoek() {
        let input = document.getElementById("search").value.toLowerCase();
        for (let card of document.getElementById("grid").children) {
          let naam = card.querySelector("h2").innerText.toLowerCase();
          card.style.display = naam.includes(input) ? "flex" : "none";
        }
      }
    </script>
</body>

</html>