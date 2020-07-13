<?php
session_start();
if(isset($_SESSION["loggedin"])){
    header("Location: dashboard");
    exit();
}
?>
<!DOCTYPE html> 
<html lang="en">
    <head>
        <title>Corona Warrior | Home</title>
        <meta name="description" content="Corona Warrior - a simple approach to victim tracing">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name=”robots” content="index, follow">
        <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
        <link href="https://fonts.googleapis.com/css2?family=Google+Sans:wght@400;500&amp;display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/global.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <!-- Alert toast -->
        <div class="alert" id="alert"></div>
        <!-- Navbar -->
        <div class="menu shadow" id="menu-bar">
            <a href="./" class="brand">Corona Warrior</a>
            <div class="link-wrapper">
                <a href="./" class="current">Home</a>
                <a href="javascript:void(0);">About Us</a>
                <a href="privacy-policy">Privacy Policy</a>
                <a href="javascript:void(0);">Support</a>
            </div>
            <div class="menu-toggle" id="menu-toggle">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </div>
        <!-- Login panel -->
        <div class="panel" id="login-panel">
            <h2 class="text-center pt-5">Login</h2>
            <form id="login-form">
                <div class="form-group">
                <input type="tel" class="form-control " id="login-phone" name="login-phone" placeholder=" " maxlength="10">
                <label class="h6 mt-4 label" for="login-phone">Phone</label>
                <input type="password" class="form-control" id="login-pass" name="login-pass" placeholder=" ">
                <label class="h6 mt-4 label" for="login-pass">Password</label>
                <h6 class="mt-3"><a href="#">Forgot Password?</a></h6>
                </div>
                <div class="form-check form-check-inline mt-4 mb-3">
                    <input class="form-check-input" type="checkbox" id="remember" value="agree">
                    <label class="form-check-label h6" for="remember">Remember me</label>
                </div>  
                <button type="submit" class="btn-lg btn btn-primary btn-block mt-2 mb-4" id="login-btn">Login</button>
            </form>
            <h6 class="text-center">Don't have an account? <a href="javascript:void(0);" id="open-signup">Register</a> now!</h6>  
        </div>
        <!-- Signup panel -->
        <div class="panel hidden" id="signup-panel">
            <h2 class="text-center pt-5">Signup</h2>
            <form id="signup-form">
                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder=" ">
                    <label class="h6 mt-4 label" for="name">Name</label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder=" " maxlength="10">
                    <label class="h6 mt-4 label" for="phone">Phone</label>
                    <input type="password" class="form-control" id="signup-pass" name="signup-pass" placeholder=" ">
                    <label class="h6 mt-4 label" for="signup-pass">Password</label>
                    <input type="password" class="form-control" id="confirm-pass" name="confirm-pass" placeholder=" ">
                    <label class="h6 mt-4 label" for="confirm-pass">Confirm Password</label>
                </div>
                <div class="form-check form-check-inline mt-5">
                    <input class="form-check-input" type="checkbox" id="terms" name="terms" value="agree">
                    <label class="form-check-label h6" for="terms">Agree our <a href="privacy-policy">Privacy Policy</a></label>
                </div>
                <button type="submit" class="text-center btn-lg btn btn-primary btn-block my-4 px-5" id="signup-btn">Request Account</button>
            </form>
            <h6 class="text-center mt-4">Already have an account? <a href="javascript:void(0);" id="open-login">Login</a></h6>  
        </div>
        <!-- Footer -->
        <footer class="footer">
            &copy; <span id="copy-year"></span> Corona Warrior
            <span class="float-right">&lt;/&gt; by <a href="https://amarjeetmalpotra.github.io" target="_blank" class="text-white">Amarjeet Malpotra</a></span>
        </footer>
        <!-- Script section -->
        <script src="js/global.js"></script> 
        <script src="js/main.js"></script> 
    </body>
</html>