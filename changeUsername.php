<?php
require 'config.php';

// Get old and new usernames
$oUser = $_POST["old_username"];
$nUser = $_POST["new_username"];

// Prepare a statement to check if the old username
$checkSql = "SELECT userN FROM employee WHERE userN = ?";
$checkStmt = $con->prepare($checkSql);
$checkStmt->bind_param("s", $oUser);
$checkStmt->execute();
$checkStmt->store_result();

if ($checkStmt->num_rows > 0) {
    // Old username exists, proceed with the update
    // Prepare the update statement
    $updateSql = "UPDATE employee SET userN = ? WHERE userN = ?";
    $stmt = $con->prepare($updateSql);
    $stmt->bind_param("ss", $nUser, $oUser);

    // Execute the update statement and handle the result
    if ($stmt->execute()) {
        // Alert message for successful
        echo "<script>
                alert('🎉 Your username has been successfully updated! 🎉');
                window.location.href = 'adminAcc.php'; // Redirect to admin account page
              </script>";
        exit();
    } else {
        echo "Error updating username: " . $stmt->error;
    }

    // Close the update statement
    $stmt->close();
} else {
    // Old username does not exist
    echo "<script>
            alert('❌ The old username you entered does not exist. Please try again. ❌');
            window.location.href = 'adminAcc.php'; // Redirect or stay on the same page as needed
          </script>";
}

$checkStmt->close();
$con->close();
?>
