<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header("Location: seller_login.php");
    exit();
}
require_once "connect.php";

if(isset($_POST['name'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $image = mysqli_real_escape_string($conn, $_POST['image']);

    mysqli_query($conn, "INSERT INTO products (name, category, price, stock, image) VALUES ('$name', '$category', '$price', '$stock', '$image')");
    header("Location: stocks.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Add New Product</h2>
    <form method="POST">
        <label>Product Name</label>
        <input type="text" name="name" required>
        
        <label>Category</label>
        <input type="text" name="category" required>
        
        <label>Price</label>
        <input type="number" step="0.01" name="price" required>
        
        <label>Stock</label>
        <input type="number" name="stock" required>
        
        <label>Image URL / Path</label>
        <input type="text" name="image">
        
        <button type="submit">Add Product</button>
    </form>
    <a href="stocks.php" class="back-link">Back to Stocks</a>
</div>
</body>
</html>
