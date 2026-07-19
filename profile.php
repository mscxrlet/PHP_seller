<?php

require_once "connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Profile</title>

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>

<body>

<div class="page-container">

    <div class="logo">
        <i class="fa-solid fa-user"></i>
    </div>

    <h1>My Profile</h1>
    <h2>Personal Information</h2>

    <form id="profileForm">

        <label for="fullname">Full Name</label>
        <input type="text" id="fullname" value="John Doe" readonly>

        <label for="username">Username</label>
        <input type="text" id="username" value="johndoe" readonly>

        <label for="email">Email Address</label>
        <input type="email" id="email" value="johndoe@email.com" readonly>

        <label for="phone">Phone Number</label>
        <input type="text" id="phone" value="+63 912 345 6789" readonly>

        <label for="address">Address</label>
        <input type="text" id="address" value="Manila, Philippines" readonly>

        <label for="member">Member Since</label>
        <input type="text" id="member" value="July 2026" readonly>

        <button type="button" id="editBtn">
            <i class="fa-solid fa-pen-to-square"></i>
            Edit Profile
        </button>

    </form>

    <<a href="dashboard.php" class="back-link">
        <i class="fa-solid fa-arrow-left"></i>
        Back to Dashboard
    </a>

</div>

<script>
const editBtn = document.getElementById("editBtn");
const inputs = document.querySelectorAll("#profileForm input");

let editing = false;

editBtn.addEventListener("click", () => {
    editing = !editing;

    inputs.forEach(input => {
        input.readOnly = !editing;
    });

    if(editing){
        editBtn.innerHTML = '<i class="fa-solid fa-floppy-disk"></i> Save Changes';
    }else{
        editBtn.innerHTML = '<i class="fa-solid fa-pen-to-square"></i> Edit Profile';
        // Save functionality can be added here later
    }
});
</script>

<!-- Educational Project Disclaimer -->
    <div style="margin-top: 30px; border-top: 1px solid #eee; padding-top: 15px; text-align: center;">
        <p style="font-size: 0.8rem; opacity: 0.7; margin: 0;">Created By Athena Ysabelle Palomo & Nadine Hyacinth Razalan.</p>
        <p style="font-size: 0.75rem; opacity: 0.6; margin: 5px 0 0 0;">Disclaimer: This website is for educational purposes only and is a requirement for our final project.</p>
    </div>

</body>
</html>
