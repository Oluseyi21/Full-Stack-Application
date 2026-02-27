<?php
$pageTitle = "Contact - Sunny's Tech Store";
$pageDescription = "Here for any questions about our products or need support, we're here to help.";
require_once 'Templates/header.php';
?>

<main>
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>Contact Us</h1>
            <p>We would love to hear from you! Whether you have any questions or need support.</p>
        </div>
    </section>

    <!-- Contact -->
    <section class="contact-section">
        <div class="container contact-container">
            <!-- Contact Form -->
            <div class="contact-form">
                <h2>Send Us a Message</h2>
                <form class="contact-form" action="#" method="post">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" placeholder="Your name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" placeholder="Your email" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" placeholder="Message Subject" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="5" placeholder="Type your message here" required></textarea>
                    </div>
                    <button type="submit" class="btn-link">Send Message</button>
                </form>
            </div>

            <!-- Contact Info -->
            <div class="contact-info">
                <h2>Our Contact Information</h2>
                <p>You can also reach us through any of the following:</p>
                <ul>
                    <li>Email: support@sunnystechstore.com</li>
                    <li>Phone: +1 (123) 345-6789</li>
                    <li>Address: Apple Drive, Barrie, ON, Canada</li>
                    <li>Working Hours: Monday - Friday, 9:00 AM - 8:00 PM</li>
                </ul>
            </div>
        </div>
    </section>
</main>

<?php require 'Templates/footer.php'; ?>
