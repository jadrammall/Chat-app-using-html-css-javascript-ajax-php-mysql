<?php
    // Start the session
    session_start();

    // Include the configuration file
    include_once "config.php";

    // Get the unique ID of the current user from the session
    $outgoing_id = $_SESSION['unique_id'];

    // SQL query to retrieve users excluding the current user, ordered by user_id in descending order
    $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} ORDER BY user_id DESC";

    // Execute the SQL query
    $query = mysqli_query($conn, $sql);

    // Initialize output variable
    $output = "";

    // Check if there are no users available
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat"; // Update output if no users are available
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php"; // Include data processing script if users are available
    }

    // Output the result
    echo $output;
?>
