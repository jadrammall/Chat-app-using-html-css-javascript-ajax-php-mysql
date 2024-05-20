<?php
// Start the session
session_start();

// Include the configuration file
include_once "config.php";

// Sanitize and retrieve input data from POST parameters
$name = mysqli_real_escape_string($conn, $_POST['name']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Check if all required fields are not empty
if (!empty($name) && !empty($username) && !empty($password)) {
    // Check if the username already exists in the database
    $sql = mysqli_query($conn, "SELECT * FROM admins WHERE username = '{$username}'");
    if (mysqli_num_rows($sql) > 0) {
        echo "$username - This username already exists!";
    } else {

        $ran_id = rand(time(), 1000000000);
        $status = "Offline now";
        $encrypt_pass = md5($password);

        // Insert user details into the database
        $insert_query = mysqli_query($conn, "INSERT INTO admins (unique_idd, name, username, password, status)
            VALUES ({$ran_id}, '{$name}','{$username}', '{$encrypt_pass}', '{$status}')");

        if ($insert_query) {
            // Retrieve user details after insertion for session creation
            $select_sql2 = mysqli_query($conn, "SELECT * FROM admins WHERE username = '{$username}'");
            if (mysqli_num_rows($select_sql2) > 0) {
                echo "success";
            } else {
                echo "This username does not Exist!";
            }
        } else {
            echo "Something went wrong. Please try again!";
        }
    }
} else {
    echo "All input fields are required!";
}
?>