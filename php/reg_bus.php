<?php
    session_start();
    require_once("conn.php");
    // Check if the data from the form was submitted
    if (!isset($_POST['b-name'], $_POST['b-add'], $_POST['b-aadh'])) {
    	exit('Invalid access method');
    }
    // Make sure the submitted values are not empty.
    if (empty($_POST['b-name']) || empty($_POST['b-add']) || empty($_POST['b-aadh'])) {
	    exit('Invalid access method');
    }
    // We need to check if the business with that userid exists.
    if ($stmt = $con->prepare('SELECT id FROM business WHERE u_id = ?')) {
	    // Bind parameters (s = string, i = int, b = blob, etc)
	    $stmt->bind_param('i', $_SESSION['id']);
	    $stmt->execute();
	    $stmt->store_result();
	    // Store the result so we can check if the a business exists in the database.
	    if ($stmt->num_rows > 0) {
	    	// Business already exists
	    	echo 'Business already registered';
	    } else {
		    // Business doesnt exists
            if ($stmt = $con->prepare('INSERT INTO business (u_id, b_name, b_address, b_aadhar, created) VALUES (?, ?, ?, ?, ?)')) {
                // Current datetime
                $date = date('Y-m-d H:i:s');
	            $stmt->bind_param('issis', $_SESSION['id'], $_POST['b-name'], $_POST['b-add'], $_POST['b-aadh'], $date);
                $stmt->execute();
	            echo 'registered';
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