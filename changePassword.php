<?php
require 'config.php';

// Get old and new password from form
$oPass = $_POST["old_password"];
$nPass = $_POST["new_password"];

// Prepare the update statement
$updateSql = "UPDATE employee SET pass = ? WHERE pass = ?";
$stmt = $con->prepare($updateSql);
$stmt->bind_param("ss", $nPass, $oPass);

// Execute the update statement
if ($stmt->execute()) {
    // Check if any rows were affected
    if ($stmt->affected_rows > 0) {
        // Popup message for success
        echo "<script>
                alert('Password updated successfully!');
                window.location.href = 'adminAcc.php'; // Redirect after showing the message
              </script>";
    } else {
        // Popup message for no rows affected
        echo "<script>
                alert('Error: Old password is incorrect.');
                window.history.back(); // Go back to the previous page
              </script>";
    }
} else {
    // Popup message for error
    echo "<script>
            alert('Error updating password: " . addslashes($stmt->error) . "');
            window.history.back(); // Go back to the previous page
          </script>";
}

// Close the statement and connection
$stmt->close();
$con->close();
?>
