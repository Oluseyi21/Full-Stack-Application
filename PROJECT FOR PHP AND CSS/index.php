<?php
// define thee page title and description
$pageTitle = "Home - Sunny's Tech Store";
$pageDescription = "Shop the latest tech gadgets at affordable prices. Explore laptops, phones, and accessories at Sunny's Tech Store.";

// include the header
require_once 'Templates/header.php';
?>

<main>
    <!-- Hero Section -->
    <section class="page-header hero">
        <div class="container">
            <h1>Welcome to Sunny's Tech Store</h1>
            <p>Your one-stop shop for amazing tech gadgets and electronics.</p>
            <a href="shop.php" class="btn-link">Shop Now</a>
        </div>
    </section>
    <!-- Featured products -->
    <section class="featured-products">
        <div class="container">
            <h2>Featured Products</h2>
            <p> Explore our best-selling products</p>

    <div class="product-list">
        <!-- Product 1 -->
        <div class="product-card">
            <img src="images/Laptop%20pro%2015.jpeg" alt="Laptop Pro 15">
            <h3>Apple Macbook Pro 15</h3>
            <p>High-performance with up to 24 hours of battery life.</p>
            <p class="price">$1,599.99</p>
            <a href="product.php?id=1" class="btn-link">View Details</a>
        </div>

        <!-- Product 2 -->
        <div class="product-card">
            <img src="images/Iphone%2014%20pro.jpeg" alt="Iphone 14 pro">
            <h3> iPhone 14 pro</h3>
            <p>A 3-Camera design and one of the best phone cameras.</p>
            <p class="price">$899.99</p>
            <a href="shop.php" class="btn-link">View Details</a>
        </div>

        <!-- Product 3 -->
        <div class="product-card">
                <img src="images/Wireless%20headphones.jpeg" alt="Wireless Headphones">
                <h3>Wireless Headphones</h3>
                <p>Experience crystal-clear sound without limits.</p>
                <p class="price">$399.99</p>
                <a href="shop.php" class="btn-link">View Details</a>
            </div>
            <a class="btn-link" href="create.php"> Back to Home</a>
        </div>
    </div>
    </section>
</main>
<?php require 'Templates/footer.php'; ?>
