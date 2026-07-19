<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once "connect.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users
            WHERE email='$email'
            AND role='admin'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {

        $user = mysqli_fetch_assoc($result);

        if ($password == $user['password']) {

            $_SESSION['admin'] = true;
            $_SESSION['id'] = $user['id'];
            $_SESSION['fullname'] = $user['fullname'];
            $_SESSION['email'] = $user['email'];

            header("Location: dashboard.php");
            exit();

        } else {
            $error = "Incorrect password.";
        }

    } else {
        $error = "Admin account not found.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atelier Nade | Seller Login</title>
    <link rel="stylesheet" href="style.css">
    <!-- Great Vibes font for brand title -->
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
</head>
<body>

<div class="container">

    <div class="logo">
        AN
    </div>

    <h1 class="brand-title">
        Atelier Nade
    </h1>

    <h2>Seller Login</h2>
    <h3>Sign in to access the Seller Dashboard</h3>

    <?php
    if($error != "")
    {
        echo "<div class='error'>$error</div>";
    }
    ?>

    <form method="POST">
        <label>Email Address</label>
        <input
            type="email"
            name="email"
            placeholder="Enter your email"
            required>

        <label>Password</label>
        <input
            type="password"
            name="password"
            placeholder="Enter your password"
            required>

        <button type="submit">
            Login
        </button>
    </form>

    <a href="index.php" class="back-link">
        &larr; Back to Home
    </a>

    <!-- Educational Project Disclaimer -->
    <div style="margin-top: 30px; border-top: 1px solid #eee; padding-top: 15px; text-align: center;">
        <p style="font-size: 0.8rem; opacity: 0.7; margin: 0;">Created By Athena Ysabelle Palomo & Nadine Hyacinth Razalan.</p>
        <p style="font-size: 0.75rem; opacity: 0.6; margin: 5px 0 0 0;">Disclaimer: This website is for educational purposes only and is a requirement for our final project.</p>
    </div>

</div>

</body>
</html>
