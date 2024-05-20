<?php 
  // Start a PHP session
  session_start();

  // Include the configuration file (config.php)
  include_once "php/config.php";

  // If the 'unique_id' session variable is not set, redirect the user to the login page
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            // Query the database to get user details based on 'unique_id' from the session
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            
            // Check if the query returned results
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql); // Fetch user details as an associative array
            }
          ?>
          <!-- Display user profile image and details -->
          <img src="php/images/<?php echo $row['img']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
            <p style="color: white;"><?php echo $row['status']; ?></p>
          </div>
        </div>
        
        <!-- Logout link that includes the user's unique_id in the logout URL -->
        <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a>
      </header>
      
      <!-- Search bar for finding users -->
      <div class="search">
        <span class="text">Select a user to start a chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search" style="color: white;"></i></button>
      </div>
      
      <div class="users-list">
        <!-- Placeholder for the list of users, presumably to be populated dynamically -->
      </div>
    </section>
  </div>

  <!-- JavaScript file for handling user-related functionalities -->
  <script src="javascript/users.js"></script>

</body>
</html>
