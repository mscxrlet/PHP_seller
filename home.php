<?php

session_start();

if(!isset($_SESSION['admin']))
{
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
    <title>AN Seller Management System</title>
    <link rel="stylesheet" href="style.css">
     <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700&family=Great+Vibes&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">

        <!-- Logo -->
       <div class="logo initials">
         AN
        </div>

        <!-- Header -->
       <h1 class="brand-title">Atelier Nade</h1>
        <h2>Seller Management System</h2>
        <h3>Login Form</h3>

        <!-- Login Form -->
        <form action="Dashboard.html" method="get">
            <div class="input-group">
                <label for="username">Username</label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Enter your username"
                    required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter your password"
                    required>
            </div>
            <div class="button-container">
                <button type="submit" class="login-btn" onclick="window.location.href='dashboard.php'">
                    Log In
                </button>
            </div>
        </form>      
            <a href="register.html">Don't have an account? Register here</a>
    </div>
</body>
</html>
