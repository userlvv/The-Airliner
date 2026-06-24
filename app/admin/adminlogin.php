<?php
session_start();
require __DIR__ . "/../config/database.php";

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
  <link rel="stylesheet" href="/../css/style.css" />
  <script src="https://cdn.tailwindcss.com"></script>
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