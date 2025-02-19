<?php
require 'config.php';

// Fetch admin info from the database
$adminId = 1; // Update this dynamically based on the logged-in user
$sql = "SELECT * FROM employee WHERE id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $adminId);
$stmt->execute();
$admin = $stmt->get_result()->fetch_assoc();
$stmt->close();

// Fetch contact messages from the database
$sqlMessages = "SELECT * FROM contacts ORDER BY id DESC";
$stmtMessages = $con->prepare($sqlMessages);
$stmtMessages->execute();
$messages = $stmtMessages->get_result()->fetch_all(MYSQLI_ASSOC);
$stmtMessages->close();

// Handle message deletion
if (isset($_GET['delete_id'])) {
    $deleteId = intval($_GET['delete_id']);
    $stmtDelete = $con->prepare("DELETE FROM contacts WHERE id = ?");
    $stmtDelete->bind_param("i", $deleteId);
    $stmtDelete->execute();
    $stmtDelete->close();
    
    // Redirect to the same page to refresh the message list
    header("Location: adminAcc.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Account - Job Nest</title>
    <link rel="stylesheet" href="styles/adminAcc.css">
    <script src="script.js" defer></script>
    <style>
        .contact-messages-section {
            display: none;
        }
    </style>
</head>
<body>
<!--Header-->
<header>
    <div class="logo"><img src="images/logo.png" alt="Job Nest Logo"></div>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="jobsearch.html">All Jobs</a></li>
            <li><a href="aboutus.html">About Us</a></li>
        </ul>
    </nav>
    <div class="header-right">
    <span>Hello, <?php echo htmlspecialchars($admin['name']); ?>!</span>
    <a href="index.php">Logout</a>
</div>
</header>

<section class="hero-section">
    <h1>Welcome, <?php echo htmlspecialchars($admin['name']); ?>!</h1>
    <p>Your account details are as follows:</p>
</section>

<main>
    <div class="admin-info">
        <div class="profile-picture">
            <img src="<?php echo htmlspecialchars($admin['profile_pic'] ?: 'default-profile.png'); ?>" alt="Profile Picture">
        </div>
        <div class="admin-details">
            <h3>Name: <?php echo htmlspecialchars($admin['name']); ?></h3>
            <p>Email: <?php echo htmlspecialchars($admin['email']); ?></p>
            <p>Phone: <?php echo htmlspecialchars($admin['tel']); ?></p>
        </div>
    </div>
    
    <div class="manage-section">
        <h2>Manage Your Account</h2>
        
        <!-- Change Username -->
        <div class="manage-users">
            <h3>Change Username</h3>
            <form action="changeUsername.php" method="post" class="form-control">
                <input type="text" name="old_username" placeholder="Old Username" required>
                <input type="text" name="new_username" placeholder="New Username" required>
                <button type="submit">Update Username</button>
            </form>
        </div>

        <!-- Change Password -->
        <div class="manage-password">
            <h3>Change Password</h3>
            <form action="changePassword.php" method="post" class="form-control">
                <input type="password" name="old_password" placeholder="Old Password" required>
                <input type="password" name="new_password" placeholder="New Password" required>
                <button type="submit">Update Password</button>
            </form>
        </div>

        <!-- Edit Profile Info -->
        <div class="edit-profile">
            <h3>Edit Profile Info</h3>
            <form action="editAdminInfo.php" method="post" enctype="multipart/form-data" class="form-control">
                <input type="text" name="admin_name" placeholder="Name" value="<?php echo htmlspecialchars($admin['name']); ?>" required>
                <input type="email" name="admin_email" placeholder="Email" value="<?php echo htmlspecialchars($admin['email']); ?>" required>
                <input type="tel" name="admin_phone" placeholder="Phone" value="<?php echo htmlspecialchars($admin['tel']); ?>" required>
                <input type="file" name="admin_profile_pic" accept="image/jpeg">
                <button type="submit">Update Profile</button>
            </form>
        </div>
    </div>

    <button onclick="toggleMessages()">Contact Us Messages</button>

    <div class="contact-messages-section" id="contactMessages">
        <h2>Contact Us Messages</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Company</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
            <?php foreach ($messages as $message): ?>
            <tr>
                <td><?php echo htmlspecialchars($message['id']); ?></td>
                <td><?php echo htmlspecialchars($message['name']); ?></td>
                <td><?php echo htmlspecialchars($message['email']); ?></td>
                <td><?php echo htmlspecialchars($message['phone']); ?></td>
                <td><?php echo htmlspecialchars($message['company']); ?></td>
                <td><?php echo htmlspecialchars($message['message']); ?></td>
                <td>
                    <a href="?delete_id=<?php echo htmlspecialchars($message['id']); ?>" onclick="return confirm('Are you sure you want to delete this message?');">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</main>

<footer>
    <div class="footer-logo">
        <img src="images/logo.png" alt="Company Logo" />
    </div>
    <div class="footer-links">
        <a href="contactUs.php">Contact Us</a>
        <a href="TermsAndConditions.html">Terms and Conditions</a>
        <a href="PrivacyAndPolicy.html">Privacy Policy</a>
        <a href="FAQ.html">FAQs</a>
    </div>
    <div class="social-links">
        <img src="images/fb logo.png" alt="Facebook">
        <img src="images/insta logo.png" alt="Instagram">
        <img src="images/linkedin logo.png" alt="LinkedIn">
    </div>
    <p>&copy; 2024 JobNest. All rights reserved.</p>
</footer>

<script>
    function toggleMessages() {
        const messagesSection = document.getElementById('contactMessages');
        messagesSection.style.display = (messagesSection.style.display === 'block') ? 'none' : 'block';
    }
</script>
</body>
</html>
