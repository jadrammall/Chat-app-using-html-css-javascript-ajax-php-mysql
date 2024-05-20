<?php
session_start(); // Starting the session
include_once "php/config.php"; // Including configuration file

// Redirect to login page if unique_idd session variable is not set
if (!isset($_SESSION['unique_idd'])) {
    header("location: adminlogin.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="editadmins.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <title>Edit admins</title>
</head>

<body>
    <header>
        <a href="admin.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <h1>Admins of LIU Chat App</h1>
    </header>
    <h2>Add admin</h2><br>
    <section class="form addadmin">
        <form action="addadmin" method="post">
            <div class="error-text"></div>
            <div class="field input">
                <label>Name</label>
                <input type="text" name="name" placeholder="Name" required>
            </div>
            <br><br>
            <div class="field input">
                <label>Username</label>
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <br><br>
            <div class="field input">
                <label>Password</label>
                <input type="password" name="password" placeholder="Password" required>
                <i class="fas fa-eye"></i>
            </div>
            <br><br>
            <div class="field button">
                <input type="submit" name="submit" value="Add Admin">
            </div>
        </form>
    </section>
    <script src="javascript/editadmins.js"></script>

</body>