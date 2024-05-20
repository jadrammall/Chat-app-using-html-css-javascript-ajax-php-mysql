<?php
  // Database configuration details
  $hostname = "localhost"; // The server where your database is hosted (e.g., localhost)
  $username = "root"; // The username to access the database
  $password = ""; // The password to access the database
  $dbname = "chatapp"; // The name of the specific database you want to connect to

  // Creating a database connection using MySQLi
  $conn = mysqli_connect($hostname, $username, $password, $dbname);

  // Checking if the connection was successful
  if (!$conn) {
    echo "Database connection error" . mysqli_connect_error(); // Display an error message if the connection fails
  }
?>
