<?php
session_start();

session_unset();      // Clears all session variables
session_destroy();    // Destroys the session

header("Location: seller_login.php"); // or login.php if that's your filename
exit();
?>
