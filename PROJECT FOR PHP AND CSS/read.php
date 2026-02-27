<?php
$pageTitle = "All Products";
require_once 'includes/Database.php';

$database = Database::getInstance();
$products = $database->getProducts();
require 'Templates/header.php';
?>

<main class="admin-container">
    <h1>All Products</h1>
    <?php if (isset($_GET['success'])): ?>
    <p class="success-message">Product created successfully</p>
    <?php endif ?>

    <?php if (!$products || count($products) === 0): ?>
    <p>No products found.</p>
    <a href="create.php" class="btn">Add First Product</a>
    <?php else: ?>

    <a href="create.php" class="btn"> Add New Product</a>
    <div class="product-table">
        <table>
            <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price ($)</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td>
                    <img src="<?php echo htmlspecialchars($product['image_path']); ?>" alt="">
                </td>
                <td><?php echo htmlspecialchars($product['name']); ?></td>
                <td>
                    <?php echo htmlspecialchars($product['description']); ?>
                </td>
                <td><?php echo ($product['price']); ?></td>
                <td>
                    <a href="update.php?id=<?php echo $product['id']; ?>" class="btn">Update</a>
                    <a href="delete.php?id=<?php echo $product['id']; ?>" class="btn-small delete-btn" onclick="return confirm('Are you sure you want to delete?');">Delete</a>
                </td>
            </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <?php endif ?>
</main>
<?php require 'Templates/footer.php'; ?>
