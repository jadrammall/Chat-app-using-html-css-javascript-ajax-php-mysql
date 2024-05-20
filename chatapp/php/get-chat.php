<?php 
    // Start the session
    session_start();

    // Check if the session unique_id is set (user is logged in)
    if(isset($_SESSION['unique_id'])){
        // Include the configuration file and set outgoing_id from the session
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];

        // Sanitize incoming_id obtained from the POST request
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";

        // Query to fetch messages between two users
        $sql = "SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
        $query = mysqli_query($conn, $sql);

        // Check if messages exist
        if(mysqli_num_rows($query) > 0){
            // Loop through each message fetched
            while($row = mysqli_fetch_assoc($query)){
                // Check if the message is outgoing or incoming and construct the HTML output
                if($row['outgoing_msg_id'] === $outgoing_id){
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">
                                <img src="php/images/'.$row['img'].'" alt="">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }
            }
        }else{
            // If no messages found, display a message indicating the absence of messages
            $output .= '<div class="text">No messages are available. Once you send a message, it will appear here.</div>';
        }
        // Output the constructed HTML
        echo $output;
    }else{
        // Redirect to the login page if the user is not logged in
        header("location: ../login.php");
    }
?>
