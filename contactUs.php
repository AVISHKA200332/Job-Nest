<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Nest</title>
    <!-- Link to external CSS -->
    <link rel="stylesheet" href="styles/contactUs.css">
    <link rel="stylesheet" href="styles/modal.css">
</head>
<body>

<!-- Header section -->
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
        <a href="login.html">Login</a>/<a href="signup.html">Sign Up</a>
    </div>
</header>

<main>
    <!-- Hero Section -->
    <div class="hero-image">
        <div class="hero-text">
            <h1>Welcome to Job Nest</h1>
            <p>Your Career, Our Mission</p>
            <a href="jobsearch.html" class="cta-button">Get Started</a>
        </div>
    </div>

    <div class="contact-container">
        <!-- Contact Information Section -->
        <div class="contact-info">
            <h2>Contact Us</h2>
            <p><strong>Call us:</strong> +94 11322200</p>
            <p><strong>Mail:</strong> jobnest@gmail.com</p>
            <p><strong>Address:</strong> SLIIT Malabe, Sri Lanka</p>
            <div class="map-container">
                <!-- Embedded Google Map -->
                <iframe src="https://www.google.com/maps/embed?pb=..." width="300" height="200" style="border:0;" allowfullscreen loading="lazy"></iframe>
            </div>
            <h4>Let's stay in touch!</h4>
            <div class="social-links">
                <a href="#">Facebook</a>
                <a href="#">LinkedIn</a>
                <a href="#">Instagram</a>
            </div>
        </div>

        <!-- Contact Form Section -->
        <div class="contact-form">
            <form id="contactForm" method="POST" action="insertContact.php">
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="tel" name="phone" placeholder="Phone" required>
                <input type="text" name="company" placeholder="Company">
                <textarea name="message" placeholder="Type your message" rows="5" required></textarea>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <!-- Success Modal for Form Submission -->
    <div id="successModal" class="modal">
        <div class="modal-content">
            <img src="images/checked.png" alt="Success">
            <h2>Message Sent Successfully!</h2>
            <p>Thank you for reaching out to Job Nest. We'll get back to you shortly!</p>
            <button id="closeModal">OK</button>
        </div>
    </div>
</main>

<!-- Footer Section -->
<footer>
    <div class="footer-logo">
        <img src="images/logo.png" alt="Company Logo">
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

<!-- Link to external JavaScript -->
<script src="scripts/contactUs.js"></script>


</body>
</html>
