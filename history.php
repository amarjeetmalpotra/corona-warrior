<?php
    session_start();
    if(!isset($_SESSION["loggedin"])){
        header("Location: ./");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Covid Portal | History</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Google+Sans:wght@400;500&amp;display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/global.css">
    </head>
    <body>
        <!-- Alert toast -->
        <div class="alert" id="alert"></div>
        <!-- Navbar -->
        <div class="menu shadow" id="menu-bar">
            <a href="./" class="brand">Covid Portal</a>
            <div class="link-wrapper">
                <a href="dashboard.php">Home</a>
                <a href="profile.php">Profile</a>
                <a href="history.php" class="current">History</a>
                <a href="#about">About Us</a>
                <a href="php/de_auth.php" class="border-bottom-0 current">Logout</a>
            </div>
            <div class="menu-toggle" id="menu-toggle">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </div>
        <!-- Hello -->
        <div class="container my-5 h4">
            Hello 👋 <?php echo $_SESSION["name"]; ?>!
            <hr class="mt-5">
        </div>
        <div class="container mt-4 px-5">
            <div class="h3">Visitor history</div>
            <div class="container my-5">
                Feature under construction 🔧
            </div>
        </div>
        <!-- Footer -->
        <footer class="footer"><span class="">&copy; <span id="copy-year"></span> Covid Portal</footer>
        <!-- Script section -->
        <script src="js/global.js"></script>
        <script src="js/user.js"></script>
    </body>
</html>