<?php
    session_start();
    require_once("conn.php");
    // Check if the data from the form was submitted
    if (!isset($_POST['v-name'], $_POST['v-aadh'], $_POST['v-time'])) {
    	exit('Invalid access method');
    }
    // Make sure the submitted values are not empty.
    if (empty($_POST['v-name']) || empty($_POST['v-aadh']) || empty($_POST['v-time'])) {
	    exit('Invalid access method');
    }
    // Fetch business id first
    if ($stmt = $con->prepare('SELECT id FROM business WHERE u_id = ?')) {
    	// Bind parameters (s = string, i = int, b = blob, etc)
    	$stmt->bind_param('i', $_SESSION['id']);
    	$stmt->execute();
    	// Store the result
    	$stmt->store_result();
        if ($stmt->num_rows > 0) {
            // Business exists and we can proceed
            $stmt->bind_result($b_id);
            $stmt->fetch();
            // Add Visitor
            if ($stmt = $con->prepare('INSERT INTO visitors (b_id, v_name, v_aadhar, v_time) VALUES (?, ?, ?, ?)')) {
                $stmt->bind_param('isis', $b_id, $_POST['v-name'], $_POST['v-aadh'], $_POST['v-time']);
                $stmt->execute();
                echo 'Visitor added successfully';
            } else {
                // Something is wrong with the sql statement
                echo 'Internal server error';
            }
        } else {
            echo 'Register your business in your profile first';
        }
    	$stmt->close();
    }
    $con->close();
?>