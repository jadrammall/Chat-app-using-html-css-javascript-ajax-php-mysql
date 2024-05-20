<?php 
  // Start a PHP session
  session_start();

  // Check if a unique_id exists in the session, if so, redirect to 'users.php'
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <!-- Login Section -->
    <section class="form adminlogin">
      <header>LIU Chat App</header>
      <!-- Login Form -->
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        
        <!-- username Input Field -->
        <div class="field input">
          <label>Username</label>
          <input type="text" name="username" placeholder="Enter your username" required>
        </div>
        
        <!-- Password Input Field -->
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter your password" required>
          <i class="fas fa-eye"></i> <!-- Possibly an icon to show/hide the password -->
        </div>
        
        <!-- Submit Button -->
        <div class="field button">
          <input type="submit" name="submit" value="Login as Admin">
        </div>
      </form>
    </section>
  </div>
  
  <!-- JavaScript files -->
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/adminlogin.js"></script>

</body>
</html>
