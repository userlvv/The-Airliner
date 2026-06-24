<?php
session_start();
require __DIR__ . "/config/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $stmt = $pdo->prepare("SELECT * FROM userinformation WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password_hash'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        header("Location: user/userpanel.php");
        exit;
    } else {
        $error = "Verkeerde email of wachtwoord";
    }
}

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
        <h2
          class="montserrat font-bold text-2xl lg:text-lg text-center lg:text-left">
          <a href="index.php">The Airliner</a>
        </h2>
        <div
          class="flex-1 flex flex-wrap justify-center items-center gap-3 lg:gap-8 w-full">
          <a
            class="bg-[#EEEEEE] hover:bg-[#CCCCCC] transition rounded-full px-4 py-2 opensans"
            href="index.php"
            >Home</a
          >
          <a
            class="bg-[#EEEEEE] hover:bg-[#CCCCCC] transition rounded-full px-4 py-2 opensans"
            href="travel.php"
            >Travel</a
          >
          <a
            class="bg-[#EEEEEE] hover:bg-[#CCCCCC] transition rounded-full px-4 py-2 opensans"
            href="all-inclusive.php"
            >All inclusive</a
          >
          <a
            class="bg-[#EEEEEE] hover:bg-[#CCCCCC] transition rounded-full px-4 py-2 opensans"
            href="flights.php"
            >Flights</a
          >
          <a
            class="bg-[#EEEEEE] hover:bg-[#CCCCCC] transition rounded-full px-4 py-2 opensans"
            href="private-flights.php"
            >Private flights</a
          >
          <button class="ml-12" id="themeToggle">Theme Switch</button>
        </div>

        <div class="lg:ml-auto">
          <a
            class="bg-[#EEEEEE] hover:bg-[#CCCCCC] transition rounded-full px-4 py-2 opensans"
            href="login.php"
            >Login</a
          >
        </div>
      </nav>
    </header>
    <main class="flex items-center justify-center mt-24 mb-24 px-4">
      <div class="bg-[#EEEEEE] opacity-80 rounded-3xl p-8 w-full max-w-md">
        <h1 class="montserrat text-3xl font-bold text-center mb-6">Login</h1>
        <form method="POST" class="flex flex-col gap-4">
          <div class="flex flex-col gap-2">
            <label class="opensans" for="email">Email</label>
            <input
              id="email"
              type="email"
              name="email"
              placeholder="Enter your email"
              class="p-3 rounded-full bg-white outline-none" />
          </div>
          <div class="flex flex-col gap-2">
            <label class="opensans" for="password">Password</label>
            <input
              id="password"
              type="password"
              name="password"
              placeholder="Enter your password"
              class="p-3 rounded-full bg-white outline-none" />
          </div>
          <button
            type="submit"
            class="bg-[#DDDDDD] hover:bg-[#CCCCCC] transition rounded-full py-3 opensans font-semibold">
            Login
          </button>
          <p class="text-center text-sm opensans mt-2">
            Don't have an account?
            <a href="register.php" class="underline">Sign up</a>
          </p>
        </form>
      </div>
    </main>
    <footer class="bg-[#EEEEEE] opacity-80 rounded-t-3xl mt-12 px-6 py-10">
      <div
        class="max-w-7xl mx-auto flex flex-col md:grid md:grid-cols-2 xl:flex xl:flex-row justify-between gap-10 text-center lg:text-left">
        <div class="flex flex-col gap-3 items-center lg:items-start">
          <h2 class="montserrat text-2xl font-bold">The Airliner</h2>

          <p class="opensans max-w-sm">
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
      <div
        class="border-t border-gray-300 mt-8 pt-6 text-center flex justify-center">
        <p class="opensans text-sm">
          © 2026 The Airliner. All rights reserved.
        </p>
      </div>
    </footer>
    <script src="js/themes.js"></script>
  </body>
</html>
