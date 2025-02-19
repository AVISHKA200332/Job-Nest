<?php

include 'config.php'; 

    
    $username = $_POST["username"];
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
	
	$sql = "INSERT INTO user VALUES ('','$username','$fullname','$email','$password')";
	
	if($con->query($sql)){
		
		echo "<script>
					window.location.href = 'login.html';
					alert(\"Account Created successfully🎉\");
			</script>";
	}
	
    else{
		
		echo "Error".$con->error;
	}
	
$con->close();
?>
