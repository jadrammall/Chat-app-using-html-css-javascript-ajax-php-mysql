<?php
    // Loop through each row fetched from the query result
    while($row = mysqli_fetch_assoc($query)){
        
        // Query to fetch the latest message exchanged with each user
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        
        // Determine if messages are available, or indicate their absence
        (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
        
        // Trim the message text to a specific length
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
        
        // Determine if the message was sent by the user or the recipient
        if(isset($row2['outgoing_msg_id'])){
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
        }else{
            $you = "";
        }
        
        // Set the user's online/offline status
        ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
        
        // Hide the user's own status in the chat list
        ($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";

        // Construct the HTML output for each user in the chat list
        $output .= '<a href="chat.php?user_id='. $row['unique_id'] .'">
                    <div class="content">
                    <img src="php/images/'. $row['img'] .'" alt="">
                    <div class="details">
                        <span>'. $row['fname']. " " . $row['lname'] . " | " . $row['major'] . " | " . $row['campus'] .'</span>
                        <p>'. $you . $msg .'</p>
                    </div>
                    </div>
                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                </a>';
    }
?>

