<?php 
    // Start the session
    session_start();

    // Include the configuration file
    include_once "config.php";

    // Sanitize email and password obtained from the POST request
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check if email and password are not empty
    if(!empty($email) && !empty($password)){

        // Query to select user with the provided email
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");

        // Check if a user with the provided email exists
        if(mysqli_num_rows($sql) > 0){
            // Fetch user data
            $row = mysqli_fetch_assoc($sql);

            // Encrypt the provided password using md5 (not recommended for secure encryption)
            $user_pass = md5($password);
            $enc_pass = $row['password'];

            // Compare the provided password with the stored (encrypted) password
            if($user_pass === $enc_pass){
                // If passwords match, set user status to "Active now" in the database
                $status = "Active now";
                $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
                if($sql2){
                    // If the status update is successful, set the unique_id in the session
                    $_SESSION['unique_id'] = $row['unique_id'];
                    echo "success";
                }else{
                    echo "Something went wrong. Please try again!";
                }
            }else{
                echo "Email or Password is Incorrect!";
            }
        }else{
            echo "$email - This email does not exist!";
        }
    }else{
        echo "All input fields are required!";
    }
?>
