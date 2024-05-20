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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <title>Edit users</title>
</head>

<body>
    <header>
        <a href="admin.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <h1>Users of LIU Chat App</h1>
    </header>
    <h2>Edit user</h2><br>
    <section class="form editusers">
        <form action="editusers" method="post">
            <div class="error-text"></div>

            <div class="field input">
                <label for="email">User Email</label>
                <input type="email" id="email" name="email" required>
            </div><br><br>

            <div class="field input">
            <label for="fname">First Name</label>
            <input type="text" id="fname" name="fname">
            </div><br><br>

            <div class="field input">
                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lname">
            </div><br><br>

            <div class="field input">
                <label for="major">Major</label>
                <select id="major" name="major">
                    <option value="" selected disabled hidden>Select Your Major</option>
                    <option value="computer science">Computer Science</option>
                    <option value="mathematics">Mathematics</option>
                    <option value="economics">Economics</option>
                    <option value="biology">Biology</option>
                    <option value="environmental studies">Environmental Studies</option>
                </select>
            </div><br><br>

            <div class="field input">
                <label for="campus">Campus</label>
                <select id="campus" name="campus">
                    <option value="" selected disabled hidden>Select Your Campus</option>
                    <option value="beirut">Beirut</option>
                    <option value="saida">Saida</option>
                    <option value="tyre">Tyre</option>
                    <option value="mount lebanon">Mount Lebanon</option>
                    <option value="bekaa">Bekaa</option>
                </select>
            </div><br><br>

            <div class="field input">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                <i class="fas fa-eye"></i>
            </div><br><br>

            <div class="field button">
            <input type="submit" name="submit" value="Edit User">
            </div>
        </form>
    </section>
    <script src="javascript/editusers.js"></script>
</body>