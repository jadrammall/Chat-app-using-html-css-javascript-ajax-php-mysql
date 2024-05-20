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
    <title>View users</title>
    <link rel="stylesheet" href="viewadmins.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body>
    <header>
        <a href="admin.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <h1>Users of LIU Chat App</h1>
    </header>
    <h2>View users</h2>
    <table class="container">
        <thead>
            <tr>
                <th>ID</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Major</th>
                <th>Campus</th>
                <th>Email</th>
                <th>Image</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = " SELECT * FROM users ";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['user_id'] . "</td>";
                        echo "<td>" . $row['fname'] . "</td>";
                        echo "<td>" . $row['lname'] . "</td>";
                        echo "<td>" . $row['major'] . "</td>";
                        echo "<td>" . $row['campus'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td><img src='php/images/" . $row['img'] . "' alt='' height = '50px' width = '50px'></td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo "</tr>";
                    }
                }
            }
            ?>
        </tbody>
    </table>
</body>