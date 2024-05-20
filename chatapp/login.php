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
    <section class="form login">
      <header>LIU Chat App</header>
      <!-- Login Form -->
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        
        <!-- Email Input Field -->
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        
        <!-- Password Input Field -->
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter your password" required>
          <i class="fas fa-eye"></i> <!-- Possibly an icon to show/hide the password -->
        </div>
        
        <!-- Submit Button -->
        <div class="field button">
          <input type="submit" name="submit" value="Continue to Chat">
        </div>
      </form>
      
      <!-- Link to Signup Page -->
      <div class="link">Not yet signed up? <a href="index.php">Signup now</a><br><a href="adminlogin.php">Admin login</a></div>
    </section>
  </div>
  
  <!-- JavaScript files -->
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>

</body>
</html>
