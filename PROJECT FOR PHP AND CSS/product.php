<?php
// product page
$pageTitle = "Product Details";
require_once 'includes/Database.php';
$database = Database::getInstance();
$conn = $database->getConnection();
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid Product ID");
}
$productId  = $_GET['id'];
$product = $database->getProduct($productId);
if(!$product){
    die("Product not found.");
}
require './Templates/header.php';
?>
<main class="product-page">
    <div class="container">
        <h1><?php echo htmlspecialchars($product['name']); ?></h1>
        <div class="product-details">
            <!-- product img -->
            <div class="product-image">
                <img src="<?php echo htmlspecialchars($product['image_path']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
            </div>
            <section class="product-info">
                <h2>Description</h2>
                <p><?php echo htmlspecialchars($product['description']); ?></p>
                <h3 class="product-price">
                    $<?php echo number_format($product['price'], 2); ?>
                </h3>
                <a href="shop.php" class="btn-link">Back to Shop</a>
            </section>
        </div>
    </div>
</main>
<?php require_once 'Templates/footer.php'; ?>