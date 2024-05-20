<?php
    // Start the session
    session_start();

    // Include the configuration file
    include_once "config.php";

    // Get the unique ID of the current user from the session
    $outgoing_id = $_SESSION['unique_id'];

    // Sanitize the search term obtained from POST parameters
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

    // Construct the SQL query to search for users based on the search term
    $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND (fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%') ";

    // Initialize an empty string to store output
    $output = "";

    // Perform the database query
    $query = mysqli_query($conn, $sql);

    // Check if any matching users are found
    if(mysqli_num_rows($query) > 0){
        // Include data.php to handle displaying the search results
        include_once "data.php";
    }else{
        // If no users match the search term, update the output string
        $output .= 'No user found related to your search term';
    }

    // Output the search result message
    echo $output;
?>
