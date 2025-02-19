<?php

	include 'config.php';

	$username = $_POST["username"];
	
	$sql= "DELETE FROM user WHERE username = '$username'";
	
	if ($con->query($sql)){
		
    if ($con->affected_rows > 0) {
        echo "<script>
                alert(\"Account Deleted successfully🎉\");
                window.location.href = 'login.html';
              </script>";
    }
	else {
        echo "<script>
                alert('⚠️Please enter the correct username');
              </script>";
    }
}
else {
    echo "Error".$con->error;
}
	
$con->close();

?>
