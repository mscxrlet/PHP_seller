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
<title>Users Management</title>

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>

<body>

<div class="page-container">

    <div class="logo">
        <i class="fa-solid fa-users"></i>
    </div>

    <h1>Users</h1>
    <h2>User Management</h2>

    <form id="userForm">

        <div class="form-row">

            <div>
                <label>Full Name</label>
                <input type="text" id="fullname" placeholder="Enter full name" required>
            </div>

            <div>
                <label>Username</label>
                <input type="text" id="username" placeholder="Enter username" required>
            </div>

            <div>
                <label>Password</label>
                <input type="password" id="password" placeholder="Enter password" required>
            </div>

            <div>
                <label>Role</label>
                <select id="role" required>
                    <option value="">Select Role</option>
                    <option>Admin</option>
                    <option>User</option>
                </select>
            </div>

        </div>

        <button type="submit" class="add-btn" id="submitBtn">
            <i class="fa-solid fa-user-plus"></i>
            Add User
        </button>

    </form>

   <div class="table-container">

    <table class="user-table">

        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody id="userTable">
                <?php

                $result = mysqli_query($conn, "SELECT * FROM users");

                while($row = mysqli_fetch_assoc($result))
                {
                ?>=
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['fullname']; ?></td>
                    <td><?= $row['email']; ?></td>
                    <td><?= $row['role']; ?></td>
                    <td>
                        Edit  Delete
                    </td>
                </tr>

                <?php
                }
                ?>
        </tbody>

    </table>

</div>
    <a href="dashboard.php" class="back-link">
        <i class="fa-solid fa-arrow-left"></i>
        Back to Dashboard
    </a>

</div>


 
<script>

let editingRow = null;

const form = document.getElementById("userForm");
const fullname = document.getElementById("fullname");
const username = document.getElementById("username");
const password = document.getElementById("password");
const role = document.getElementById("role");
const submitBtn = document.getElementById("submitBtn");
const table = document.getElementById("userTable");

// Create role badge
function getRoleBadge(role){

    if(role === "Admin"){
        return `
            <span class="role-badge admin">
                <i class="fa-solid fa-user-shield"></i>
                Admin
            </span>
        `;
    }

    return `
        <span class="role-badge user">
            <i class="fa-solid fa-user"></i>
            User
        </span>
    `;
}

form.addEventListener("submit", function(e){

    e.preventDefault();

    if(editingRow == null){

        const id = table.rows.length + 1;

        table.innerHTML += `
        <tr>
            <td>${id}</td>
            <td>${fullname.value}</td>
            <td>${username.value}</td>
            <td>${getRoleBadge(role.value)}</td>
            <td>

                <div class="actions">

                    <button type="button"
                            class="action-btn edit-btn"
                            onclick="editUser(this)">
                        <i class="fa-solid fa-pen"></i>
                        Edit
                    </button>

                    <button type="button"
                            class="action-btn delete-btn"
                            onclick="deleteUser(this)">
                        <i class="fa-solid fa-trash"></i>
                        Delete
                    </button>

                </div>

            </td>
        </tr>`;

    }else{

        editingRow.cells[1].innerHTML = fullname.value;
        editingRow.cells[2].innerHTML = username.value;
        editingRow.cells[3].innerHTML = getRoleBadge(role.value);

        editingRow = null;

        submitBtn.innerHTML = `
            <i class="fa-solid fa-user-plus"></i>
            Add User`;
    }

    form.reset();

});

function editUser(button){

    editingRow = button.closest("tr");

    fullname.value = editingRow.cells[1].innerText;
    username.value = editingRow.cells[2].innerText;

    role.value = editingRow.cells[3].innerText.trim();

    password.value = "";

    submitBtn.innerHTML = `
        <i class="fa-solid fa-floppy-disk"></i>
        Update User`;

    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });

}

function deleteUser(button){

    if(confirm("Delete this user?")){

        button.closest("tr").remove();

        // Renumber IDs
        for(let i = 0; i < table.rows.length; i++){
            table.rows[i].cells[0].innerHTML = i + 1;
        }

        if(editingRow){

            form.reset();
            editingRow = null;

            submitBtn.innerHTML = `
                <i class="fa-solid fa-user-plus"></i>
                Add User`;

        }

    }

}

</script>

<!-- Educational Project Disclaimer -->
    <div style="margin-top: 30px; border-top: 1px solid #eee; padding-top: 15px; text-align: center;">
        <p style="font-size: 0.8rem; opacity: 0.7; margin: 0;">Created By Athena Ysabelle Palomo & Nadine Hyacinth Razalan.</p>
        <p style="font-size: 0.75rem; opacity: 0.6; margin: 5px 0 0 0;">Disclaimer: This website is for educational purposes only and is a requirement for our final project.</p>
    </div>

</body>
</html>
