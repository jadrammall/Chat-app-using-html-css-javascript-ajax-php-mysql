<?php
// Start the session
session_start();

// Include the configuration file
include_once "config.php";

// Sanitize and retrieve input data from POST parameters
$email = mysqli_real_escape_string($conn, $_POST['email']);
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$major = mysqli_real_escape_string($conn, $_POST['major']);
$campus = mysqli_real_escape_string($conn, $_POST['campus']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Check if all required fields are not empty
if (!empty($fname) && !empty($lname) && !empty($major) && !empty($campus) && !empty($password)) {
    // Check if the email already exists in the database
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
    if (mysqli_num_rows($sql) <= 0) {
        echo "$email - This email does not exist!";
    } else {

        $encrypt_pass = md5($password);

        // Insert user details into the database
        $insert_query = mysqli_query($conn, "UPDATE `users` SET `fname`='{$fname}',`lname`='{$lname}',`major`='{$major}',`campus`='{$campus}',`password`='{$password}' WHERE 'email' = '{$email}'");

        if ($insert_query) {
            // Retrieve user details after insertion for session creation
            $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
            if (mysqli_num_rows($select_sql2) > 0) {
                echo "success";
            } else {
                echo "This email does not Exist!";
            }
        } else {
            echo "Something went wrong. Please try again!";
        }
    }
} else {
    echo "All input fields are required!";
}
?>