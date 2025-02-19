<?php

	include 'config.php';


	$username = $_POST["username"];
	$email = $_POST["email"];
	$newpass = $_POST["newpass"];
	
	$sql = "SELECT * FROM user WHERE username = '$username' AND email = '$email'";
	
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $updatesql = "UPDATE user SET password = '$newpass' WHERE username = '$username' AND email = '$email'";

        if ($con->query($updatesql) === TRUE) {
            echo 
			"<script>
				alert('Password has been reset successfully 🎉');
				window.location.href = 'login.html';
			</script>";
        }
		else{
            echo "Error".$con->error;
        }
    }
	else {
        echo "<script>alert('⚠️Username or email incorrect');</script>";
    }

	
?>