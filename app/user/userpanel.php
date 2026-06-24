<?php
session_start();
require __DIR__ . "/../config/database.php";

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>The Airliner</title>
    <link rel="stylesheet" href="/css/style.css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="overflow-x-hidden">
    <header>
        <nav
            class="bg-[#EEEEEE] rounded-3xl opacity-80 flex flex-col lg:flex-row mx-4 lg:mx-8 mt-4 px-4 lg:px-8 py-4 items-center gap-4 lg:gap-0">
            <h2 class="montserrat font-bold text-2xl lg:text-lg text-center lg:text-left">
                <a href="/../index.php">The Airliner</a>
            </h2>
            <div class="flex-1 flex flex-wrap justify-center items-center gap-3 lg:gap-8 w-full">
                <a class="bg-[#EEEEEE] hover:bg-[#CCCCCC] transition rounded-full px-4 py-2 opensans"
                    href="/../index.php">Home</a>
                <a class="bg-[#EEEEEE] hover:bg-[#CCCCCC] transition rounded-full px-4 py-2 opensans"
                    href="/../travel.php">Travel</a>
                <a class="bg-[#EEEEEE] hover:bg-[#CCCCCC] transition rounded-full px-4 py-2 opensans"
                    href="/../all-inclusive.php">All inclusive</a>
                <a class="bg-[#EEEEEE] hover:bg-[#CCCCCC] transition rounded-full px-4 py-2 opensans"
                    href="/../flights.php">Flights</a>
                <a class="bg-[#EEEEEE] hover:bg-[#CCCCCC] transition rounded-full px-4 py-2 opensans"
                    href="/../private-flights.php">Private flights</a>
            </div>
            <div class="lg:ml-auto">
                <a class="bg-[#EEEEEE] hover:bg-[#CCCCCC] transition rounded-full px-4 py-2 opensans" href="/../config/logout.php">
                    Logout
                </a>
            </div>

        </nav>
    </header>

    <main>
        <div class="flex justify-center mt-12 px-4">
            <div class="flex flex-col opacity-80 items-center gap-8 p-6 bg-[#EEEEEE] rounded-3xl max-w-2xl w-full">
                <h1 class="montserrat text-3xl lg:text-4xl text-center font-bold">
                    Welcome, <?php echo ($_SESSION["user_name"] ?? "User"); ?>
                </h1>
                <p class="lato text-base lg:text-lg text-center">
                    Manage your account, bookings and travel preferences from your personal dashboard.
                </p>
            </div>
        </div>
        <div class="flex flex-col lg:flex-row justify-center gap-6 mt-12 px-4 lg:px-6">
            <div
                class="flex flex-col justify-between opacity-80 items-center gap-6 p-6 lg:p-12 bg-[#EEEEEE] rounded-3xl w-full max-w-[40rem] min-h-[20rem]">
                <h1 class="montserrat text-xl lg:text-2xl font-bold text-center">
                    My Profile
                </h1>
                <p class="opensans text-center">
                    View and update your personal information, contact details and preferences.
                </p>
                <a href="profile.php" class="bg-[#DDDDDD] rounded-full px-5 py-2 text-center hover:bg-[#CCCCCC] transition w-fit">
                    Manage Profile
                </a>
            </div>
            <div
                class="flex flex-col justify-between opacity-80 items-center gap-6 p-6 lg:p-12 bg-[#EEEEEE] rounded-3xl w-full max-w-[40rem] min-h-[20rem]">
                <h1 class="montserrat text-xl lg:text-2xl font-bold text-center">
                    My Bookings
                </h1>
                <p class="opensans text-center">
                    View your active bookings, upcoming trips and booking history.
                </p>
                <a href="mybookings.php" class="bg-[#DDDDDD] rounded-full px-5 py-2 text-center hover:bg-[#CCCCCC] transition w-fit">
                    View Bookings
                </a>
            </div>
        </div>

    </main>
    <footer class="bg-[#EEEEEE] opacity-80 rounded-t-3xl mt-12 px-6 py-10">
        <div
            class="max-w-7xl mx-auto flex flex-col md:grid md:grid-cols-2 xl:flex xl:flex-row justify-between gap-10 text-center lg:text-left">
            <div class="flex flex-col gap-3 items-center lg:items-start">
                <h2 class="montserrat text-2xl font-bold">The Airliner</h2>
                <p class="opensans max-w-sm">
                    Luxury travel experiences, exclusive destinations and premium flights tailored for every journey.
                </p>
                <a href="/../admin/adminlogin.php" class="mt-4">Admin</a>
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