<?php 
  session_start(); // Starting the session
  include_once "php/config.php"; // Including configuration file

  // Redirect to login page if unique_id session variable is not set
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?> <!-- Including header file -->

<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']); // Getting user_id from the URL
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}"); // Querying the database for user details

          // Checking if the user exists
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql); // Fetching user details if user exists
          }else{
            header("location: users.php"); // Redirecting to users.php if user does not exist
          }
        ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="php/images/<?php echo $row['img']; ?>" alt=""> <!-- Displaying user's image -->
        <div class="details">
          <span><?php echo $row['fname']. " " . $row['lname'] ?></span> <!-- Displaying user's name -->
          <p style="color: white;"><?php echo $row['status']; ?></p> <!-- Displaying user's status -->
        </div>
      </header>
      <div class="chat-box">
        <!-- Chat messages will be displayed here -->
      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden> <!-- Hidden input field for incoming user_id -->
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off"> <!-- Input field to type messages -->
        <button><i class="fab fa-telegram-plane"></i></button> <!-- Button to send messages -->
      </form>
    </section>
  </div>

  <script src="javascript/chat.js"></script> <!-- Including JavaScript file for chat functionality -->
</body>
</html>
