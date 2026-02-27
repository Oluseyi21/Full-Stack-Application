<?php
$pageTitle = "SmartWatch - Sunny's Tech Shop";
$pageDescription = "SmartWatch  with fitness tracking and smart notifications.";
require_once './Templates/header.php';
?>

<main>
    <section class="page-header">
        <div class="container">
            <h1>SmartWatch</h1>
            <p>Track your health and stay connected wherever you go.</p>
        </div>
    </section>

    <section class="single-product container">
        <div class="product-wrapper">
            <div class="product-image">
                <img src="images/Smartwatch.jpeg">
            </div>
            <div class="product-info">
                <h2>SmartWatch</h2>
                <p class="price">$299.99</p>
                <p class="description">
                    The SmartWatch blends technology and style, keeping you in control of your health and notifications.
                </p>
                <ul class="features">
                    <li>Heart-rate & sleep monitoring</li>
                    <li>Bluetooth & Wi-Fi connectivity</li>
                    <li>Water-resistant up to 50m</li>
                    <li>7-day battery life</li>
                </ul>
                <a href="shop.php" class="btn-link">← Back to Shop</a>
            </div>
        </div>
    </section>
</main>

<?php require './Templates/footer.php'; ?>
