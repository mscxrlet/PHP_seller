<?php
// connect.php
$conn = mysqli_connect("localhost", "root", "cassy", "ateliernade_db");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
