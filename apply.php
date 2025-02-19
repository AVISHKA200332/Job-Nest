<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include your existing config.php for database connection
include 'config.php';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get the form data
    $full_name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']); // New phone field

    // Check if a resume file is uploaded
    if (isset($_FILES['resume'])) {
        $fileError = $_FILES['resume']['error'];

        // Check if there were any errors during file upload
        if ($fileError === UPLOAD_ERR_OK) {
            // Get file details
            $fileTmpPath = $_FILES['resume']['tmp_name'];
            $fileName = $_FILES['resume']['name'];
            $fileSize = $_FILES['resume']['size'];
            $fileType = $_FILES['resume']['type'];
            $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

            // Allow only specific file extensions (PDF, DOC, DOCX)
            $allowedExtensions = array('pdf', 'doc', 'docx');

            if (in_array($fileExtension, $allowedExtensions)) {
                // Define the upload directory and create it if it doesn't exist
                $uploadDir = 'resume/';
                if (!is_dir($uploadDir)) {
                    if (!mkdir($uploadDir, 0755, true)) {
                        die('Failed to create resume directory. Check permissions.');
                    }
                }

                // Set the destination path
                $dest_path = $uploadDir . $fileName;

                // Move the uploaded file to the destination folder
                if (move_uploaded_file($fileTmpPath, $dest_path)) {
                    // Insert application data and resume file path into the database
                    $sql = "INSERT INTO applications (full_name, email, phone, resume_path) 
                            VALUES ('$full_name', '$email', '$phone', '$dest_path')";

                    if ($con->query($sql) === TRUE) {
                        echo "Application and resume uploaded successfully!";
                    } else {
                        echo "Error: " . $sql . "<br>" . $con->error;
                    }
                } else {
                    echo "Error uploading the resume file.";
                }
            } else {
                echo "Invalid file type. Only PDF, DOC, and DOCX files are allowed.";
            }
        } else {
            // Provide error messages for common file upload errors
            switch ($fileError) {
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    echo "File too large. Please upload a file smaller than allowed limit.";
                    break;
                case UPLOAD_ERR_PARTIAL:
                    echo "File upload was incomplete.";
                    break;
                case UPLOAD_ERR_NO_FILE:
                    echo "No file uploaded. Please select a file.";
                    break;
                default:
                    echo "Unknown error occurred during file upload.";
                    break;
            }
        }
    } else {
        // Handle the case where no resume is uploaded
        echo "Please upload a resume file.";
    }
}

// Close the connection
$con->close();
?>
