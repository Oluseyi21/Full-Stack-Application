<?php
$pageTitle = "Update/Edit Product";
require_once 'includes/Database.php';
$database = Database::getInstance();
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid Product ID");
}
$product_id = $_GET['id'];
$product = $database->getProduct($product_id);
if (!$product) {
    die("Product not found");
}
$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $price = trim($_POST['price']);
    $imageFile = $_FILES['image'];
    if(empty($name) || empty($description) || empty($price)) {
        $message = "All fields are required";
    } elseif(!is_numeric($price)){
        $message = "Price must be a valid number";
    } else {
        $updated = $database->updateProduct($product_id, $name, $description, $price, $imageFile);
        if ($updated) {
            header('Location: read.php');
            exit;
        } else{
            $message = "Failed to update product " . $database->error;
        }
    }
}
require 'Templates/header.php';
?>
<main class="admin-container">
    <h1>Edit Product</h1>
    <?php if ($message): ?>
    <p class="error-message"><?php echo htmlspecialchars($message) ?></p>
    <?php endif; ?>
    <form method="POST" enctype="multipart/form-data" class="admin-form">

        <label for="name">Product Name</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($product['name']) ?>">
        <label for="description">Description</label>
        <textarea id="description" name="description" rows="5"><?php echo htmlspecialchars($product['description']) ?></textarea>
        <label for="price">Price</label>
        <input type="text" id="price" name="price" value="<?php echo htmlspecialchars($product['price']); ?>">
        <label>Existing Image</label><br>
        <img src="<?php echo htmlspecialchars($product['image_path']); ?> alt=<?php echo htmlspecialchars($product['name']); ?>">
        <label for="image">Change Image</label>
        <input type="file" id="image" name="image">
        <button type="submit" class="btn">Save Changes</button>
    </form>
    <a href="product.php" class="btn-back">Back to Products</a>
</main>
<?php require 'Templates/footer.php'; ?>