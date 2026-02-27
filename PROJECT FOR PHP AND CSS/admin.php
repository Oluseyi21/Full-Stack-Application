<?php
require_once 'includes/Session.php';
Session::start();

// Protect the page — only logged-in users can access
if (!Session::isLoggedIn()) {
    header("Location: login.php");
    exit;
}

$pageTitle = "Admin Dashboard";
require 'Templates/header.php';
?>

<main class="admin-container">
    <h1>Admin Dashboard</h1>

    <p>Welcome to the admin panel. Choose an action below:</p>

    <div class="admin-links">
        <a class="btn-link" href="create.php"> Create New Product</a>
        <a class="btn-link" href="read.php"> View All Products</a>
        <a class="btn-link" href="index.php"> Back to Home</a>
    </div>
</main>

<?php require 'Templates/footer.php'; ?>
