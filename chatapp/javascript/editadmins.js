// Selecting necessary DOM elements
const form = document.querySelector(".addadmin form"), // Selecting the addadmin form element
      addBtn = form.querySelector(".button input"), // Selecting the submit button inside the form
      errorText = form.querySelector(".error-text"); // Selecting the error text element

// Preventing the default form submission behavior
form.onsubmit = (e) => {
    e.preventDefault();
}

// Event listener for the click on the submit button
addBtn.onclick = () => {
    // Creating a new XMLHttpRequest object
    let xhr = new XMLHttpRequest();

    // Configuring the XMLHttpRequest object
    xhr.open("POST", "php/editadmins.php", true);

    // Handling the response from the server when the request is complete
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Getting the response data from the server
                let data = xhr.response;

                // Checking if the signup was successful
                if (data === "success") {
                    // Redirecting the user to the users.php page upon successful signup
                    alert("Admin added successfully!");
                    // Emptying the input fields after successful submission
                    document.querySelector('input[name="name"]').value = "";
                    document.querySelector('input[name="username"]').value = "";
                    document.querySelector('input[name="password"]').value = "";
                } else {
                    // Displaying an error message if signup failed
                    errorText.style.display = "block";
                    errorText.textContent = data;
                }
            }
        }
    }

    // Creating a FormData object from the form data
    let formData = new FormData(form);

    // Sending the form data to the server using XMLHttpRequest
    xhr.send(formData);

}

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
