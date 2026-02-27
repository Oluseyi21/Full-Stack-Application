<?php
$pageTitle = "Bluetooth Speaker - Sunny's Tech Shop";
$pageDescription = "Powerful portable Bluetooth speaker with deep bass.";
require_once './Templates/header.php';
?>

<main>
    <section class="page-header">
        <div class="container">
            <h1>Bluetooth Speaker</h1>
            <p>Take your music anywhere — clear sound and long battery life.</p>
        </div>
    </section>

    <section class="single-product container">
        <div class="product-wrapper">
            <div class="product-image">
                <img src="images/Bluetooth%20speaker.jpeg">
            </div>
            <div class="product-info">
                <h2>Bluetooth Speaker</h2>
                <p class="price">$599.99</p>
                <p class="description">
                    Compact and powerful — the Bluetooth Speaker delivers crystal-clear sound and punchy bass on the go.
                </p>
                <ul class="features">
                    <li>20W high-quality stereo sound</li>
                    <li>Bluetooth 5.1 + AUX input</li>
                    <li>12-hour playtime</li>
                    <li>Waterproof design (IPX6)</li>
                </ul>
                <a href="shop.php" class="btn-link">← Back to Shop</a>
            </div>
        </div>
    </section>
</main>

<?php require './Templates/footer.php'; ?>
