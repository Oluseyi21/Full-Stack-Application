<?php
$pageTitle = "Wireless Headphones - Sunny’s Tech Shop";
$pageDescription = "Noise-cancelling wireless headphones with rich sound.";
require_once './Templates/header.php';
?>

<main>
    <section class="page-header">
        <div class="container">
            <h1>Wireless Headphones</h1>
            <p>Immersive sound with comfort and clarity.</p>
        </div>
    </section>

    <section class="single-product container">
        <div class="product-wrapper">
            <div class="product-image">
                <img src="images/Wireless%20headphones.jpeg">
            </div>
            <div class="product-info">
                <h2>Wireless Headphones</h2>
                <p class="price">$399.99</p>
                <p class="description">
                    Enjoy premium audio with noise-cancellation and 30-hour battery life.
                </p>
                <ul class="features">
                    <li>Bluetooth 5.0</li>
                    <li>30-hour battery</li>
                    <li>Noise-cancelling microphone</li>
                    <li>Fast USB-C charging</li>
                </ul>
                <a href="shop.php" class="btn-link">← Back to Shop</a>
            </div>
        </div>
    </section>
</main>

<?php require './Templates/footer.php'; ?>
