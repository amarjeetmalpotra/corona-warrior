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
        <title>Covid Portal</title>
        <link href="https://fonts.googleapis.com/css2?family=Google+Sans:wght@400;500&amp;display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <a href="php/de_auth.php"><button class="btn-lg btn btn-primary btn-block mt-2 mb-4" id="logout-btn">Logout</button></a>
        <!-- Script section -->
        <script src="js/main.js"></script>    
    </body>
</html>