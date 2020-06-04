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
        <title>Covid Portal | Profile</title>
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
                <a href="profile.php" class="current">Profile</a>
                <a href="history.php">History</a>
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
            <div class="h3">Your business details</div>
            <?php
                require_once("php/conn.php");
                // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
                if ($stmt = $con->prepare('SELECT b_name, b_address FROM business WHERE u_id = ?')) {
    	            // Bind parameters (s = string, i = int, b = blob, etc)
    	            $stmt->bind_param('i', $_SESSION['id']);
    	            $stmt->execute();
    	            // Store the result so we can check if the account exists in the database.
    	            $stmt->store_result();
                    if ($stmt->num_rows > 0) {
                        $stmt->bind_result($b_name, $b_address);
                        $stmt->fetch();
                        // Show business details
                        echo '<div class="container my-5">';
                        echo '<div class="h5"> Name :</div>' . $b_name;
                        echo '<div class="h5 mt-4"> Address :</div>' . $b_address;
                        echo '</div>';
                    } else {
                        echo '<div class="row my-3">';
                        echo '<div class="col-md-5">';
                        echo '<form id="b-form">';
                        echo '<input type="text" class="form-control" id="b-name" name="b-name" placeholder=" ">';
                        echo '<label class="h6 mt-4 label" for="b-name">Business name</label>';
                        echo '<input type="text" class="form-control" id="b-add" name="b-add" placeholder=" ">';
                        echo '<label class="h6 mt-4 label" for="b-add">Business address</label>';
                        echo '<input type="tel" class="form-control" id="b-aadh" name="b-aadh" placeholder=" " maxlength=12>';
                        echo '<label class="h6 mt-4 label" for="b-aadh">Your 12 digit aadhar number</label>';
                        echo '<button type="submit" class="text-center btn-lg btn btn-primary btn-block my-5" id="b-btn">Add Business</button>';
                        echo '</form>';
                        echo '</div>';
                        echo '</div>';
                    }
                }
    	        $stmt->close();
                $con->close();
            ?>
            <hr>
            <div class="h3 mt-5">Change Password</div>
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