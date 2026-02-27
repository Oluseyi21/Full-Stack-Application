<?php
$pageTitle = "About Us - Sunny's Tech Store";
$pageDescription = "Learn more about Sunny's Tech Store - our story, mission, and commitment to providing the best technology products at affordable prices.";

require_once 'Templates/header.php';
?>

<main>
    <!-- Header -->
    <section class="page-header">
        <div class="container">
            <h1>About Sunny's Tech Store</h1>
            <p>Your trusted and reliable source for the latest tech and gadgets.</p>
        </div>
    </section>

    <!-- Content -->
    <section class="about-content">
        <div class="container">
            <h2>Our Story</h2>
            <p>
                Founded in 2025, <strong>Sunny's Tech Store</strong> began with a passion for making modern technology accessible to everybody. From the latest laptops and smartphones to wireless accessories, our mission is to bring high-quality products at prices that fits your budget
            </p>

            <h2>Our Mission</h2>
            <p>
                We believe technology should make life easier, not more stressful and complicated.
                That's why our goal is to focus on delivering reliable devices, honest information, and seamless shopping experience.
            </p>

            <h2>Why Shop With Us?</h2>
            <ul>
                <li>Affordable pricing and regular deals</li>
                <li>Fast, friendly and reliable customer service</li>
                <li>Trusted products from verified suppliers</li>
                <li>Secure checkout and account registration</li>
            </ul>

            <h2>Our Vision</h2>
            <p>
                To become one of Canada's most trusted, customer-focused online tech stores, known for innovation and simplicity.
            </p>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section">
        <div class="container">
            <h2>Meet Our Team</h2>
            <div class="team-grid">
                <div class="team-member">
                    <img src="images/Founder%20Sunny's%20Tech%20Store.jpg" alt="Team Member 1">
                    <h3>John Paul</h3>
                    <p>Founder & Lead Developer</p>
                </div>
                <div class="team-member">
                    <img src="images/Product%20Manager.jpg" alt="Team Member 2">
                    <h3>Alexa Morgan</h3>
                    <p>Product Manager</p>
                </div>
                <div class="team-member">
                    <img src="images/Customer%20Support.jpg" alt="Team Member 3">
                    <h3>James Robert</h3>
                    <p>Customer Support</p>
                </div>
            </div>
        </div>
    </section>
</main>
<?php require 'Templates/footer.php'; ?>