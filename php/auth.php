<?php
    session_start();
    require_once("conn.php");
    // Check if the data from the login form was submitted
    if ( !isset($_POST['login-phone'], $_POST['login-pass']) ) {
    	exit('Invalid access method');
    }
    // Make sure the submitted values are not empty.
    if (empty($_POST['login-phone']) || empty($_POST['login-pass'])) {
	    exit('Invalid access method');
    }
    // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
    if ($stmt = $con->prepare('SELECT id, u_name, u_pass, active FROM users WHERE u_phone = ?')) {
    	// Bind parameters (s = string, i = int, b = blob, etc)
    	$stmt->bind_param('i', $_POST['login-phone']);
    	$stmt->execute();
    	// Store the result so we can check if the account exists in the database.
    	$stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $name, $pass, $active);
            $stmt->fetch();
            // Account exists, now we verify whether it's active or not?
            if ($active == 0) {
                echo 'Account verification pending';
            }
            else if (password_verify($_POST['login-pass'], $pass)) {
                // Verification success! User has loggedin
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['id'] = $id;
                $_SESSION['name'] = $name;
                echo 'loggedin';
            } else {
                echo 'Incorrect password';
            }
        } else {
            echo 'Incorrect phone number';
        }
    	$stmt->close();
    }
    $con->close();
?>