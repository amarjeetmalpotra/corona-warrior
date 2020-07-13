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
        <title>Corona Warrior | Dashboard</title>
        <meta name="description" content="Corona Warrior - a simple approach to victim tracing">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name=”robots” content="index, follow">
        <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
        <link href="https://fonts.googleapis.com/css2?family=Google+Sans:wght@400;500&amp;display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/global.css">
    </head>
    <body>
        <!-- Alert toast -->
        <div class="alert" id="alert"></div>
        <!-- Navbar -->
        <div class="menu shadow" id="menu-bar">
            <a href="./" class="brand">Corona Warrior</a>
            <div class="link-wrapper">
                <a href="dashboard" class="current">Home</a>
                <a href="profile">Profile</a>
                <a href="history">History</a>
                <a href="javascript:void(0);">About Us</a>
                <a href="php/de_auth" class="border-bottom-0 current">Logout</a>
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
            <div class="h3">Add new visitor</div>
                <div class="row my-3">  
                    <div class="col-md-5">
                        <form id="v-form">
                            <input type="tel" class="form-control" id="v-aadh" name="v-aadh" placeholder=" " maxlength=12>
                            <label class="h6 mt-4 label" for="v-aadh">12 digit aadhar number</label>
                            <button type="submit" class="text-center btn-lg btn btn-primary btn-block my-5" id="v-btn">Add Visitor</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>    
        <!-- Footer -->
        <footer class="footer">
            &copy; <span id="copy-year"></span> Corona Warrior
            <span class="float-right">&lt;/&gt; by <a href="https://amarjeetmalpotra.github.io" target="_blank" class="text-white">Amarjeet Malpotra</a></span>
        </footer>
        <!-- Script section -->
        <script src="js/global.js"></script>
        <script src="js/user.js"></script>
    </body>
</html>