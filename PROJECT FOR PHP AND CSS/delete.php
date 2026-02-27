<?php
require_once 'includes/Database.php';
$database = Database::getInstance();
if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
    die("Invalid product ID");
}
$productId = $_GET['id'];
$delete = $database->deleteProduct($productId);
if($delete){
    header('Location: product.php');
    exit;
} else{
    die("Failed to delete product: " . $database->error);
}