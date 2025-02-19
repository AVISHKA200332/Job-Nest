<?php
require 'config.php';

// Proceed only if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $admin_id = 1; // Update this dynamically based on the logged-in user
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $admin_phone = $_POST['admin_phone'];
    $profile_pic = '';

    // Handle profile picture upload
    if (isset($_FILES['admin_profile_pic']) && $_FILES['admin_profile_pic']['error'] === 0) {
        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($_FILES['admin_profile_pic']['name']);
        
        // Move the uploaded file to the server directory
        if (move_uploaded_file($_FILES['admin_profile_pic']['tmp_name'], $uploadFile)) {
            $profile_pic = $uploadFile;
        }
    }

    // Prepare SQL statement with or without profile picture
    if (!empty($profile_pic)) {
        $stmt = $con->prepare("UPDATE employee SET name = ?, email = ?, tel = ?, profile_pic = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $admin_name, $admin_email, $admin_phone, $profile_pic, $admin_id);
    } else {
        $stmt = $con->prepare("UPDATE employee SET name = ?, email = ?, tel = ? WHERE id = ?");
        $stmt->bind_param("sssi", $admin_name, $admin_email, $admin_phone, $admin_id);
    }

    // Execute the statement and handle success or error
    if ($stmt->execute()) {
        header("Location: adminAcc.php?success=1");
        exit;
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
}

$con->close();
?>
