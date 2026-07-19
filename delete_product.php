<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header("Location: seller_login.php");
    exit();
}
require_once "connect.php";

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    mysqli_query($conn, "DELETE FROM products WHERE id='$id'");
}

header("Location: stocks.php");
exit();
?>
