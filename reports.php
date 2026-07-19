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
<title>Reports</title>

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>

<div class="page-container">

    <div class="logo">
        <i class="fa-solid fa-chart-column"></i>
    </div>

    <h1>Reports</h1>
    <h2>Generate & View Reports</h2>

    <div class="customCheckBoxHolder">

        <input class="customCheckBoxInput" id="cCB1" type="radio" name="report" checked>
        <label class="customCheckBoxWrapper" for="cCB1" onclick="showReport('inventory')">
            <div class="customCheckBox">
                <div class="inner">Inventory Report</div>
            </div>
        </label>

        <input class="customCheckBoxInput" id="cCB2" type="radio" name="report">
        <label class="customCheckBoxWrapper" for="cCB2" onclick="showReport('audit')">
            <div class="customCheckBox">
                <div class="inner">Audit Log</div>
            </div>
        </label>

    </div>

    <!-- Report Content -->
    <div id="inventory" class="report-content">
    <h3>Inventory Report</h3>
    <table class="user-table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Remaining Stock</th>
            </tr>
        </thead>
        <tbody>

        <?php while($row = mysqli_fetch_assoc($inventory)) { ?>
            <tr>
                <td><?= $row['name']; ?></td>
                <td><?= $row['stock']; ?></td>
            </tr>
        <?php } ?>

        </tbody>
    </table>
</div>
    <div id="audit" class="report-content">
    <h3>Audit Log</h3>
    <table class="user-table">
        <thead>
            <tr>
                <th>User</th>
                <th>Activity</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row = mysqli_fetch_assoc($audit)) { ?>
            <tr>
                <td><?= $row['username']; ?></td>
                <td><?= $row['activity']; ?></td>
                <td><?= $row['date']; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

    <a href="dashboard.php" class="back-link">
        <i class="fa-solid fa-arrow-left"></i>
        Back to Dashboard
    </a>

</div>

<script>
function showReport(reportId) {
    document.querySelectorAll(".report-content").forEach(section => {
        section.style.display = "none";
    });

    document.getElementById(reportId).style.display = "block";
}

window.onload = function () {
    showReport("inventory");
};
</script>

<!-- Educational Project Disclaimer -->
    <div style="margin-top: 30px; border-top: 1px solid #eee; padding-top: 15px; text-align: center;">
        <p style="font-size: 0.8rem; opacity: 0.7; margin: 0;">Created By Athena Ysabelle Palomo & Nadine Hyacinth Razalan.</p>
        <p style="font-size: 0.75rem; opacity: 0.6; margin: 5px 0 0 0;">Disclaimer: This website is for educational purposes only and is a requirement for our final project.</p>
    </div>

</body>
</html>
