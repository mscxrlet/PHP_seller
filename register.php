<?php
session_start();

if(!isset($_SESSION['admin']))
{
    header("Location: seller_login.php");
    exit();
}

require_once "connect.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);

    if ($password != $confirm) {

        $message = "Passwords do not match.";

    } else {

        $check = mysqli_query($conn,
            "SELECT * FROM users WHERE email='$email'");

        if (mysqli_num_rows($check) > 0) {

            $message = "Email already exists.";

        } else {

            mysqli_query($conn,"
            INSERT INTO users
            (fullname,email,password,address,contact,role)
            VALUES
            (
            '$fullname',
            '$email',
            '$password',
            '$address',
            '$contact',
            'buyer'
            )");

            $message = "Registration successful!";

        }

    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Seller Registration</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<!-- REGISTER -->
<div class="container">
    <h2>Seller Registration</h2>
    <h3>Please fill in your details to create an account</h3>

    <form>
        <label>Name: </label>
        <input type="text" placeholder="Enter your name" required>

        <label>Contact Number: </label>
        <input type="text" placeholder="+12 345 678 910" required>

        <label>Email</label>
        <input type="email" placeholder="Enter Email" required>

        <label>Username</label>
        <input type="text" placeholder="Create Username" required>

        <label>Password</label>
        <input type="password" placeholder="Create Password" required>

        <button type="button" onclick="window.location.href='home.php'">
        Register
        </button>
        <label><a href="home.html">I already have an account</a></label>


    </form>
</div>

</html>
