<?php
global $product;
$pageTitle = "Shop- Sunny's Tech Store";
$pageDescription = "Browse all available tech gadgets, laptops, smartphones, and accessories at Sunny's Tech Store.";
require_once 'Templates/header.php';
?>
<main>
    <section class="page-header">
        <div class="container">
            <h1>Shop All Products</h1>
            <p>Discover the latest gadgets, accessories, and devices at unbeatable prices.</p>
        </div>
    </section>
    <!-- Shop grids -->
    <section class="shop-products">
        <div class="container">
            <div class="product-grid">
                <!-- Product 1 -->
                <div class="product-card">
                    <img src="images/Laptop%20pro%2015.jpeg">
                    <h3>Apple Macbook Pro 15</h3>
                    <p>High performance laptop designed for speed with up to 24 hours battery life.</p>
                    <p class="price">$1,599.99</p>
                    <a href="product1.php?id=1" class="btn-link">View Details</a>
                </div>

                <!-- Product 2 -->
                <div class="product-card">
                    <img src="images/Iphone%2014%20pro.jpeg">
                    <h3>Iphone 14 pro</h3>
                    <p>An advanced triple-lens camera design.</p>
                    <p class="price">$899.99</p>
                    <a href="product2.php?id=2" class="btn-link">View Details</a>
                </div>

                <!-- Product 3 -->
                <div class="product-card">
                    <img src="images/Wireless%20headphones.jpeg">
                    <h3>Wireless Headphones</h3>
                    <p>Noise-cancelling Bluetooth headphones with 15-hour battery life</p>
                    <p class="price">$399.99</p>
                    <a href="product3.php?id=3" class="btn-link">View Details</a>
                </div>

                <!-- Product 4 -->
                <div class="product-card">
                    <img src="images/Smartwatch.jpeg">
                    <h3>Smartwatch</h3>
                    <p>Multipurpose use</p>
                    <p class="price">$299.99</p>
                    <a href="product4.php?id=4" class="btn-link">View Details</a>
                </div>

                <!-- Product 5 -->
                <div class="product-card">
                    <img src="images/Bluetooth%20speaker.jpeg">
                    <h3>Bluetooth Speaker</h3>
                    <p>Portable wireless speaker.</p>
                    <p class="price">$599.99</p>
                    <a href="product5.php?id=5" class="btn-link">View Details</a>
                </div>
                <a href="read.php" class="btn-link">View Products added</a>
            </div>
        </div>
    </section>
</main>

<?php require 'Templates/footer.php'; ?>
