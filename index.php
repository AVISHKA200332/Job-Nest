<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Nest</title>
    <link rel="stylesheet" href="styles/styles.css"> <!-- Link to the CSS -->
    <script src="scripts/index.js"></script>
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

<!-- Hero section -->
<section class="hero-alt">
    <div class="hero-content-alt">
        <h1>Your Dream Job Awaits</h1>
        <p>Connecting you with the best opportunities to shape your future.</p>
        <div class="search-bar-alt">
            <input type="text" id="jobSearchAlt" placeholder="Search by keyword, job title, or location">
            <button onclick="search()">Find Jobs</button>
        </div>
        <br><br>
        <div class="explore-section">
            <a href="jobsearch.html" class="explore-button">Explore All Jobs</a>
        </div>
    </div>
</section>

<!-- Job categories section -->
<h2 class="browse">Browse our jobs by:</h2>
<div class="job-categories">
    <div class="category" style="background-image: url('images/it.jpg');">IT & Software</div>
    <div class="category" style="background-image: url('images/marketing.jpg');">Marketing</div>
    <div class="category" style="background-image: url('images/finance.png');">Finance</div>
    <div class="category" style="background-image: url('images/design.avif');">Design</div>
</div>

<!-- Footer section -->
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
</body>
</html>
