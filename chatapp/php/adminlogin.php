<?php 
    // Start the session
    session_start();

    // Include the configuration file
    include_once "config.php";

    // Sanitize username and password obtained from the POST request
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check if username and password are not empty
    if(!empty($username) && !empty($password)){

        // Query to select user with the provided username
        $sql = mysqli_query($conn, "SELECT * FROM admins WHERE username = '{$username}'");

        // Check if a user with the provided username exists
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
                $sql2 = mysqli_query($conn, "UPDATE admins SET status = '{$status}' WHERE unique_idd = {$row['unique_idd']}");
                if($sql2){
                    // If the status update is successful, set the unique_idd in the session
                    $_SESSION['unique_idd'] = $row['unique_idd'];
                    echo "success";
                }else{
                    echo "Something went wrong. Please try again!";
                }
            }else{
                echo "username or Password is Incorrect!";
            }
        }else{
            echo "$username - This username does not exist!";
        }
    }else{
        echo "All input fields are required!";
    }
?>
