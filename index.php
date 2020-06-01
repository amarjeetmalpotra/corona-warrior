<?php
session_start();
if(isset($_SESSION["loggedin"])){
    header("Location: dashboard.php");
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
        <!-- Alert toast -->
        <div class="alert" id="alert"></div>
        <!-- Login panel -->
        <div class="panel" id="login-panel">
            <h2 class="text-center pt-5">LogIn</h2>
            <form id="login-form" novalidate>
                <div class="form-group">
                <input type="tel" class="form-control " id="login-phone" name="login-phone" placeholder=" " required="required" minlength="10" maxlength="10">
                <label class="h6 mt-4 label" for="login-phone">Phone</label>
                <input type="password" class="form-control" id="login-pass" name="login-pass" placeholder=" "  required="required" minlength="6">
                <label class="h6 mt-4 label" for="login-pass">Password</label>
                <h6 class="mt-3"><a href="#">Forgot Password?</a></h6>
                </div>
                <div class="form-check form-check-inline mt-4 mb-3">
                    <input class="form-check-input" type="checkbox" id="remember" value="agree">
                    <label class="form-check-label h6" for="remember">Remember me</label>
                </div>  
                <button type="submit" class="btn-lg btn btn-primary btn-block mt-2 mb-4" id="login-btn">Login</button>
            </form>
            <h6 class="text-center">Don't have an account? <a href="#" id="open-signup">Register</a> now!</h6>  
        </div>
        <!-- Signup panel -->
        <div class="panel hidden" id="signup-panel">
            <h2 class="text-center pt-5">SignUp</h2>
            <form id="signup-form" novalidate>
                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder=" " required="required">
                    <label class="h6 mt-4 label" for="name">Name</label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder=" " required="required" minlength="10" maxlength="10">
                    <label class="h6 mt-4 label" for="phone">Phone</label>
                    <input type="password" class="form-control" id="signup-pass" name="signup-pass" placeholder=" " required="required" minlength="6">
                    <label class="h6 mt-4 label" for="signup-pass">Password</label>
                    <input type="password" class="form-control" id="confirm-pass" name="confirm-pass" placeholder=" " required="required" minlength="6">
                    <label class="h6 mt-4 label" for="confirm-pass">Confirm Password</label>
                </div>
                <div class="form-check form-check-inline mt-5">
                    <input class="form-check-input" type="checkbox" id="terms" name="terms" value="agree" required="required">
                    <label class="form-check-label h6" for="terms">Agree Terms & Conditions</label>
                </div>
                <button type="submit" class="text-center btn-lg btn btn-primary btn-block my-4 px-5" id="signup-btn">Request Account</button>
            </form>
            <h6 class="text-center mt-4">Already have an account? <a href="#" id="open-login">Login</a></h6>  
        </div>
        <!-- Script section -->
        <script src="js/main.js"></script>    
    </body>
</html>