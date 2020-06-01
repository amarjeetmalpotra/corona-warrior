<?php
    require_once("conn.php");
    // Check if the data from the login form was submitted
    if (!isset($_POST['phone'], $_POST['signup-pass'], $_POST['confirm-pass'], $_POST['name'])) {
    	exit('Invalid access method');
    }
    // Make sure the submitted values are not empty.
    if (empty($_POST['phone']) || empty($_POST['signup-pass']) || empty($_POST['confirm-pass']) || empty($_POST['name'])) {
	    exit('Invalid access method');
    }
    // We need to check if the account with that username exists.
    if ($stmt = $con->prepare('SELECT id, u_pass FROM users WHERE u_phone = ?')) {
	    // Bind parameters (s = string, i = int, b = blob, etc)
	    $stmt->bind_param('i', $_POST['phone']);
	    $stmt->execute();
	    $stmt->store_result();
	    // Store the result so we can check if the account exists in the database.
	    if ($stmt->num_rows > 0) {
	    	// Username already exists
	    	echo 'You are already registered';
	    } else {
		    // Username doesnt exists
            if ($stmt = $con->prepare('INSERT INTO users (u_name, u_phone, u_pass, created) VALUES (?, ?, ?, ?)')) {
	            // Hash the passwords
                $password = password_hash($_POST['signup-pass'], PASSWORD_DEFAULT);
                // Current datetime
                $date = date('Y-m-d H:i:s');
	            $stmt->bind_param('siss', $_POST['name'], $_POST['phone'], $password, $date);
	            $stmt->execute();
	            echo 'Request successfully submitted';
            } else {
	            // Something is wrong with the sql statement
	            echo 'Internal server error';
            }
	    }
	    $stmt->close();
    } else {
	    // Something is wrong with the sql statement
	    echo 'Interal server error';
    }
    $con->close();
?>