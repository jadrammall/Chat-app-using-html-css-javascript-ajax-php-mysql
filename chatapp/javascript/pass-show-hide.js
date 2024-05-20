// Selecting necessary DOM elements
const pswrdField = document.querySelector(".form input[type='password']"), // Selecting the password input field
      toggleIcon = document.querySelector(".form .field i"); // Selecting the toggle icon element

// Event listener for click on the toggle icon to show/hide password
toggleIcon.onclick = () => {
    // Checking if the password field is currently in "password" type
    if (pswrdField.type === "password") {
        // If it's a password field, switch it to a text field to display the password
        pswrdField.type = "text";
        // Add the "active" class to the toggle icon to show it's currently displaying the password
        toggleIcon.classList.add("active");
    } else {
        // If it's a text field (currently displaying the password), switch it back to a password field
        pswrdField.type = "password";
        // Remove the "active" class from the toggle icon to indicate it's hiding the password
        toggleIcon.classList.remove("active");
    }
}
