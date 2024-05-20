<?php
    // Start the session
    session_start();

    // Check if the user session exists (logged in)
    if(isset($_SESSION['unique_idd'])){
        // Include the configuration file
        include_once "config.php";

        // Sanitize the 'logout_id' obtained from GET parameters
        $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);

        // Check if 'logout_id' is set
        if(isset($logout_id)){
            // Set user status to "Offline now" in the database
            $status = "Offline now";
            $sql = mysqli_query($conn, "UPDATE admins SET status = '{$status}' WHERE unique_idd={$_GET['logout_id']}");

            // If the status update is successful
            if($sql){
                // Unset all of the session variables
                session_unset();

                // Destroy the session
                session_destroy();

                // Redirect the user to the login page after logging out
                header("location: ../adminlogin.php");
            }
        } else {
            // If 'logout_id' is not set, redirect to the users' page
            header("location: ../admin.php");
        }
    } else {
        // If the user session doesn't exist, redirect to the login page
        header("location: ../adminlogin.php");
    }
?>
