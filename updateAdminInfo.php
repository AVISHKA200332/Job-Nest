<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['userID'];
    $phone_number = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $current_password = password_hash($_POST['currentPassword'], PASSWORD_DEFAULT);
    $new_password = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO admins (user_id, phone_number, email, current_password, new_password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $user_id, $phone_number, $email, $current_password, $new_password);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
