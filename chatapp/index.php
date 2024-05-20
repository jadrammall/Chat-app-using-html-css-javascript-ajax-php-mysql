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
    <section class="form signup">
      <!-- Title for the form -->
      <header>LIU Chat App</header>
      
      <!-- Signup form -->
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        
        <!-- First and last name fields -->
        <div class="name-details">
          <div class="field input">
            <label>First Name</label>
            <input type="text" name="fname" placeholder="First name" required>
          </div>
          <div class="field input">
            <label>Last Name</label>
            <input type="text" name="lname" placeholder="Last name" required>
          </div>
        </div>

        <!-- Major field -->
        <div class="field input">
          <label for = "major">Major</label>
          <select name="major" id="major" required>
            <option value="" selected disabled hidden>Select Your Major</option>
            <option value="computer science">Computer Science</option>
            <option value="mathematics">Mathematics</option>
            <option value="economics">Economics</option>
            <option value="biology">Biology</option>
            <option value="environmental studies">Environmental Studies</option>
          </select>
        </div>

        <!-- Campus field -->
        <div class="field input">
          <label for = "campus">Campus</label>
          <select name="campus" id="campus" required>
            <option value="" selected disabled hidden>Select Your Campus</option>
            <option value="beirut">Beirut</option>
            <option value="saida">Saida</option>
            <option value="tyre">Tyre</option>
            <option value="mount lebanon">Mount Lebanon</option>
            <option value="bekaa">Bekaa</option>
          </select>
        </div>
        
        <!-- Email field -->
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        
        <!-- Password field -->
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter new password" required>
          <i class="fas fa-eye"></i> <!-- This might be an icon for showing/hiding the password -->
        </div>
        
        <!-- Image upload field -->
        <div class="field image">
          <label>Select Image</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        
        <!-- Submit button -->
        <div class="field button">
          <input type="submit" name="submit" value="Continue to Chat">
        </div>
      </form>
      
      <!-- Link to the login page -->
      <div class="link">Already signed up? <a href="login.php">Login now</a>
      </div>
    </section>
  </div>

  <!-- JavaScript files -->
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>

</body>
</html>
