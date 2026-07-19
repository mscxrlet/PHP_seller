<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header("Location: seller_login.php");
    exit();
}
require_once "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stocks - Inventory Management</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
<div class="page-container">
    <div class="logo"><i class="fa-solid fa-box-open"></i></div>
    <h1>Stocks</h1>
    <h2>Inventory Management</h2>

    <div class="search-box">
        <input type="text" id="searchInput" placeholder="Search Product on page...">
    </div>

    <button class="add-btn" onclick="location.href='add_product.php'">
        <i class="fa-solid fa-plus"></i> Add Stock
    </button>

    <div class="table-container">
        <table class="user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="stockTable">
            <?php
            $result = mysqli_query($conn, "SELECT * FROM products");
            while($row = mysqli_fetch_assoc($result)) {
                $stock = $row['stock'];
                if($stock <= 0) {
                    $statusText = "Out of Stock"; $statusClass = "out";
                } elseif($stock <= 10) {
                    $statusText = "Low Stock"; $statusClass = "low";
                } else {
                    $statusText = "Available"; $statusClass = "available";
                }
            ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= htmlspecialchars($row['name']); ?></td>
                    <td><?= htmlspecialchars($row['category']); ?></td>
                    <td>P<?= number_format($row['price'], 2); ?></td>
                    <td><?= $stock; ?></td>
                    <td><span class="status <?= $statusClass; ?>"><?= $statusText; ?></span></td>
                    <td>
                        <div class="actions">
                            <a href="edit_product.php?id=<?= $row['id']; ?>" class="action-btn edit-btn"><i class="fa-solid fa-pen"></i> Edit</a>
                            <a href="delete_product.php?id=<?= $row['id']; ?>" class="action-btn delete-btn" onclick="return confirm('Delete this product permanently?')"><i class="fa-solid fa-trash"></i> Delete</a>
                        </div>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <a href="dashboard.php" class="back-link"><i class="fa-solid fa-arrow-left"></i> Back to Dashboard</a>
</div>

<script>
document.getElementById('searchInput').addEventListener('keyup', function() {
    let filter = this.value.toLowerCase();
    let rows = document.querySelectorAll('#stockTable tr');
    rows.forEach(row => {
        let text = row.innerText.toLowerCase();
        row.style.display = text.includes(filter) ? '' : 'none';
    });
});
</script>

<!-- Educational Project Disclaimer -->
    <div style="margin-top: 30px; border-top: 1px solid #eee; padding-top: 15px; text-align: center;">
        <p style="font-size: 0.8rem; opacity: 0.7; margin: 0;">Created By Athena Ysabelle Palomo & Nadine Hyacinth Razalan.</p>
        <p style="font-size: 0.75rem; opacity: 0.6; margin: 5px 0 0 0;">Disclaimer: This website is for educational purposes only and is a requirement for our final project.</p>
    </div>

</body>
</html>
