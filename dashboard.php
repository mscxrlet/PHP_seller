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
    <title>Seller Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
<div class="page-container">
    <div class="dashboard-header">
        <h1>Seller Dashboard</h1>
        <h2>Welcome to Atelier Nade Management System</h2>
    </div>
    <div class="card-grid">
        <div class="card" onclick="location.href='profile.php'">
            <div class="card-icon"><i class="fa-solid fa-user"></i></div>
            <h3>Profile</h3>
            <p>View and update your personal information.</p>
        </div>
        <div class="card" onclick="location.href='users.php'">
            <div class="card-icon"><i class="fa-solid fa-users"></i></div>
            <h3>Users</h3>
            <p>Manage user accounts and permissions.</p>
        </div>
        <div class="card" onclick="location.href='stocks.php'">
            <div class="card-icon"><i class="fa-solid fa-box-open"></i></div>
            <h3>Stocks</h3>
            <p>Monitor inventory and available products.</p>
        </div>
        <div class="card" onclick="location.href='reports.php'">
            <div class="card-icon"><i class="fa-solid fa-chart-column"></i></div>
            <h3>Reports</h3>
            <p>Generate inventory and audit reports.</p>
        </div>
    </div>
    <div class="logout-container">
        <button class="logout-btn" onclick="location.href='logout.php'">
            <i class="fa-solid fa-right-from-bracket"></i> Logout
        </button>
    </div>
</div>

<!-- Educational Project Disclaimer -->
    <div style="margin-top: 30px; border-top: 1px solid #eee; padding-top: 15px; text-align: center;">
        <p style="font-size: 0.8rem; opacity: 0.7; margin: 0;">Created By Athena Ysabelle Palomo & Nadine Hyacinth Razalan.</p>
        <p style="font-size: 0.75rem; opacity: 0.6; margin: 5px 0 0 0;">Disclaimer: This website is for educational purposes only and is a requirement for our final project.</p>
    </div>
</body>
</html>
