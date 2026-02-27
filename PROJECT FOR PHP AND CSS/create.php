<?php

$pageTitle = "Create Product";
$pageDescription = "Admin page to add a new product";
require_once 'includes/Database.php';
$database = Database::getInstance();
$conn = $database->getConnection();

$message = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $price = trim($_POST['price']);
    $imageFile = $_FILES['image'];

    if(empty($name) || empty($description) || empty($price)){
        $message = "All fields are required";
    } elseif (!is_numeric($price)){
        $message = "Price must be a valid number";
    } else{
        $created = $database->create($name, $description, $price, $imageFile);
        if($created){
            header('Location: read.php');
            exit;
        } else{
            $message = "Failed to create product. " . $database->error;
        }
    }
}
require_once 'Templates/header.php'; ?>

<main class="admin-container">
    <h1>Add in a New Product</h1>
    <!-- error or success message -->
    <?php if(!empty($message)): ?>
    <p class="error-message"><?php echo htmlspecialchars($message) ?></p>
    <?php endif; ?>
    <!-- product creation form -->
    <form method="POST" enctype="multipart/form-data" class="admin-form">
        <label for="name">Product Name</label>
        <input type="text" id="name" name="name" required>
        <label for="description">Description</label>
        <textarea id="description" name="description" rows="5"></textarea>
        <label for="price">Product Price ($)</label>
        <input type="text" id="price" name="price" required>
        <label for="image">Product Image</label>
        <input type="file" id="image" name="image" required>
        <small>Allowed: JPG, PNG, GIF, JPEG. Max 2MB.</small>
        <button type="submit" class="btn">Create Product</button>
    </form>
    <a href="product.php" class="btn-back">Back to Products</a>
</main>
<?php require 'Templates/footer.php'; ?>