<?php
session_start();
require __DIR__ . "/config/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $stmt = $pdo->prepare("SELECT * FROM admininformation WHERE username = ?");
  $stmt->execute([$username]);
  $user = $stmt->fetch();

  if ($user && password_verify($password, $user['password_hash'])) {
    $_SESSION["admin_id"] = $user["id"];
    $_SESSION["admin_username"] = $user["username"];
    header("Location: adminpanel.php");
    exit;
  } else {
    $error = "Verkeerde username of wachtwoord";
  }
}

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
  <main class="mt-48 mb-24 px-4 justify-center flex items-center">
    <div class="opacity-80 w-full bg-[#EEEEEE] p-8 max-w-md rounded-3xl">
      <h1 class="text-3xl font-bold mb-6 text-center montserrat">Admin Login</h1>
      <form method="POST" class="gap-4 flex flex-col">
        <div class="gap-2 flex flex-col">
          <label class="opensans" for="username">Username</label>
          <input id="username" type="username" name="username" placeholder="Enter your username"
            class="outline-none bg-white rounded-full p-3" />
        </div>
        <div class="gap-2 flex flex-col">
          <label class="opensans" for="password">Password</label>
          <input id="password" type="password" name="password" placeholder="Enter your password"
            class="outline-none bg-white rounded-full p-3" />
        </div>
        <button type="submit"
          class="transition hover:bg-[#CCCCCC] bg-[#DDDDDD] py-3 rounded-full opensans font-semibold">
          Login
        </button>
        <p class="mt-2 text-center text-sm opensans">
          For admins and workers only.
        </p>
      </form>
    </div>
  </main>
</body>

</html>