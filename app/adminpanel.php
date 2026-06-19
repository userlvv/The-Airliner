<?php
session_start();
if (!isset($_SESSION["admin_id"])) {
  header("Location: adminlogin.php");
  exit;
}
require __DIR__ . "/config/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  if (isset($_POST['delete_flight'])) {
    $stmt = $pdo->prepare("DELETE FROM flights WHERE id = ?");
    $stmt->execute([$_POST['id']]);
    header("Location: adminpanel.php");
    exit;
  }

  if (isset($_POST['delete_travelplan'])) {
    $stmt = $pdo->prepare("DELETE FROM `travel plans` WHERE id = ?");
    $stmt->execute([$_POST['id']]);
    header("Location: adminpanel.php");
    exit;
  }

  if (isset($_POST['delete_allinclusive'])) {
    $stmt = $pdo->prepare("DELETE FROM `all-inclusive` WHERE id = ?");
    $stmt->execute([$_POST['id']]);
    header("Location: adminpanel.php");
    exit;
  }

  if (isset($_POST['delete_booking'])) {
    $stmt = $pdo->prepare("DELETE FROM bookings WHERE id = ?");
    $stmt->execute([$_POST['id']]);
    header("Location: adminpanel.php");
    exit;
  }

  if (isset($_POST['add_item'])) {
    $destination = $_POST['destination'];
    $price = $_POST['price'];
    $table = $_POST['table'];
    if ($table === 'flights') {
      $stmt = $pdo->prepare("INSERT INTO flights (destination, price) VALUES (?, ?)");
    }
    if ($table === 'travel_plans') {
      $stmt = $pdo->prepare("INSERT INTO `travel plans` (destination, price) VALUES (?, ?)");
    }
    if ($table === 'all_inclusive') {
      $stmt = $pdo->prepare("INSERT INTO `all-inclusive` (destination, price) VALUES (?, ?)");
    }
    $stmt->execute([$destination, $price]);
    header("Location: adminpanel.php");
    exit;
  }
}

$stmt = $pdo->prepare("SELECT * FROM `flights`");
$stmt->execute();
$flights = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT * FROM `travel plans`");
$stmt->execute();
$travelplans = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT * FROM `all-inclusive`");
$stmt->execute();
$allinclusive = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT bookings.*, userinformation.name, userinformation.email FROM bookings JOIN userinformation ON bookings.user_id = userinformation.id ORDER BY booking_date DESC");
$stmt->execute();
$allbookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
      <a href="index.php" class="transition hover:bg-[#CCCCCC] justify-center mt-4 bg-[#DDDDDD] px-4 rounded-full py-2">
        Index Page
      </a>
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
                <form method="POST" class="flex gap-2 justify-end">
                  <input type="hidden" name="id" value="<?= $f['id'] ?>">
                  <button type="submit" name="delete_flight"
                    class="text-sm px-3 py-1 rounded-full bg-red-500 hover:bg-red-600 text-white">
                    Delete
                  </button>
                </form>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <div class="flex justify-center mt-12 px-4">
      <div class="bg-[#EEEEEE] rounded-3xl p-6 w-full max-w-4xl opacity-80">
        <div class="flex justify-center gap-4 mb-6"></div>
        <div id="travelplans" class="tab-content">
          <h2 class="text-2xl font-bold mb-2">Travel Plans</h2>
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
                <form method="POST" class="flex gap-2 justify-end">
                  <input type="hidden" name="id" value="<?= $tp['id'] ?>">
                  <button type="submit" name="delete_travelplan"
                    class="text-sm px-3 py-1 rounded-full bg-red-500 hover:bg-red-600 text-white">
                    Delete
                  </button>
                </form>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <div class="justify-center flex px-4 mt-12">
      <div class="opacity-80 max-w-4xl w-full rounded-3xl p-6 bg-[#EEEEEE]">
        <div class="flex mb-6 justify-center gap-4"></div>
        <div id="allinclusive" class="tab-content">
          <h2 class="text-2xl font-bold mb-2">All Inclusive</h2>
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
                <form method="POST" class="flex gap-2 justify-end">
                  <input type="hidden" name="id" value="<?= $ai['id'] ?>">
                  <button type="submit" name="delete_allinclusive "
                    class="text-sm px-3 py-1 rounded-full bg-red-500 hover:bg-red-600 text-white">
                    Delete
                  </button>
                </form>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <div class="justify-center flex px-4 mt-12">
      <div class="opacity-80 max-w-4xl w-full rounded-3xl p-6 bg-[#EEEEEE]">
        <h2 class="text-2xl font-bold mb-2">Customer Bookings</h2>
        <div class="grid grid-cols-7 border-b mb-2 font-bold pb-2 border-gray-400 text-sm">
          <div>ID</div>
          <div>Customer</div>
          <div>Destination</div>
          <div>Type</div>
          <div>Price</div>
          <div>Status</div>
          <div class="text-right">Actions</div>
        </div>
        <?php foreach ($allbookings as $b): ?>
          <div class="grid items-center grid-cols-7 py-2 border-b border-gray-300 text-sm">
            <div><?= $b['id'] ?></div>
            <div>
              <?= $b['name'] ?><br>
              <span class="text-xs text-gray-500"><?= $b['email'] ?></span>
            </div>
            <div><?= $b['destination'] ?></div>
            <div><?= $b['item_type'] ?></div>
            <div>€<?= $b['price'] ?></div>
            <div><?= $b['status'] ?></div>
            <div class="flex gap-2 justify-end">
              <form method="POST">
                <input type="hidden" name="id" value="<?= $b['id'] ?>">
                <button type="submit" name="delete_booking" class="text-sm px-3 py-1 rounded-full bg-red-500 hover:bg-red-600 text-white">
                  Delete
                </button>
              </form>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="w-full max-w-4xl mx-auto bg-[#EEEEEE] p-6 rounded-3xl mt-12 opacity-80">
      <h2 class="text-2xl font-bold mb-4">Add Item</h2>

      <form method="POST" class="grid gap-4">
        <select name="table" class="p-2 rounded border">
          <option value="flights">Flights</option>
          <option value="travel_plans">Travel Plans</option>
          <option value="all_inclusive">All Inclusive</option>
        </select>
        <input type="text" name="destination" placeholder="Destination" class="p-2 rounded border" required>
        <input type="number" step="0.01" name="price" placeholder="Price" class="p-2 rounded border" required>
        <button type="submit" name="add_item" class="bg-green-500 text-white py-2 rounded hover:bg-green-600">
          Add
        </button>
      </form>
    </div>
  </main>
  <footer>

  </footer>
</body>

</html>