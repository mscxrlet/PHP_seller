<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header("Location: seller_login.php");
    exit();
}
require_once "connect.php";

if (!isset($_GET['id'])) {
    header("Location: stocks.php");
    exit();
}

$id = mysqli_real_escape_string($conn, $_GET['id']);

if (isset($_POST['name'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    mysqli_query($conn, "UPDATE products SET name='$name', category='$category', price='$price', stock='$stock' WHERE id='$id'");
    header("Location: stocks.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM products WHERE id='$id'");
$product = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Edit Product</h2>
    <form method="POST">
        <label>Product Name</label>
        <input type="text" name="name" value="<?= htmlspecialchars($product['name']); ?>" required>
        
        <label>Category</label>
        <input type="text" name="category" value="<?= htmlspecialchars($product['category']); ?>" required>
        
        <label>Price</label>
        <input type="number" step="0.01" name="price" value="<?= $product['price']; ?>" required>
        
        <label>Stock</label>
        <input type="number" name="stock" value="<?= $product['stock']; ?>" required>
        
        <button type="submit">Update Product</button>
    </form>
    <a href="stocks.php" class="back-link">Back to Stocks</a>
</div>
</body>
</html>
