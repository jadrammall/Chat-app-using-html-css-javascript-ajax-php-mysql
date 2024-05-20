<?php 
    // Start the session
    session_start();

    // Check if the unique_id is set in the session (user is logged in)
    if(isset($_SESSION['unique_id'])){
        // Include the configuration file and retrieve the outgoing_id from the session
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];

        // Sanitize incoming_id and message obtained from the POST request
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        // Check if the message is not empty
        if(!empty($message)){
            // Insert the message into the 'messages' table in the database
            $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();
        }
    }else{
        // Redirect to the login page if the user is not logged in
        header("location: ../login.php");
    }
?>
