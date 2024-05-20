<?php
    // Start the session
    session_start();

    // Include the configuration file
    include_once "config.php";

    // Sanitize and retrieve input data from POST parameters
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $major = mysqli_real_escape_string($conn, $_POST['major']);
    $campus = mysqli_real_escape_string($conn, $_POST['campus']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check if all required fields are not empty
    if(!empty($fname) && !empty($lname) && !empty($major) && !empty($campus) && !empty($email) && !empty($password)){

        // Validate the email format
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){

            // Check if the email already exists in the database
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){
                echo "$email - This email already exists!";
            }else{
                // Handle image upload
                if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    
                    // Get the image file extension
                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);
    
                    // Define acceptable image extensions
                    $extensions = ["jpeg", "png", "jpg"];
                    if(in_array($img_ext, $extensions) === true){
                        $types = ["image/jpeg", "image/jpg", "image/png"];
                        if(in_array($img_type, $types) === true){
                            $time = time();
                            $new_img_name = $time.$img_name;
                            
                            // Move the uploaded image to the 'images' directory
                            if(move_uploaded_file($tmp_name,"images/".$new_img_name)){
                                $ran_id = rand(time(), 100000000);
                                $status = "Active now";
                                $encrypt_pass = md5($password);
                                
                                // Insert user details into the database
                                $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, major, campus, email, password, img, status)
                                VALUES ({$ran_id}, '{$fname}','{$lname}', '{$major}', '{$campus}', '{$email}', '{$encrypt_pass}', '{$new_img_name}', '{$status}')");
                                
                                if($insert_query){
                                    // Retrieve user details after insertion for session creation
                                    $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                    if(mysqli_num_rows($select_sql2) > 0){
                                        $result = mysqli_fetch_assoc($select_sql2);
                                        $_SESSION['unique_id'] = $result['unique_id'];
                                        echo "success";
                                    }else{
                                        echo "This email address does not Exist!";
                                    }
                                }else{
                                    echo "Something went wrong. Please try again!";
                                }
                            }
                        }else{
                            echo "Please upload an image file - jpeg, png, jpg";
                        }
                    }else{
                        echo "Please upload an image file - jpeg, png, jpg";
                    }
                }
            }
        }else{
            echo "$email is not a valid email!";
        }
    }else{
        echo "All input fields are required!";
    }
?>
