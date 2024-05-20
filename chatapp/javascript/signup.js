// Selecting necessary DOM elements
const form = document.querySelector(".signup form"), // Selecting the signup form element
      continueBtn = form.querySelector(".button input"), // Selecting the submit button inside the form
      errorText = form.querySelector(".error-text"); // Selecting the error text element

// Preventing the default form submission behavior
form.onsubmit = (e) => {
    e.preventDefault();
}

// Event listener for the click on the submit button
continueBtn.onclick = () => {
    // Creating a new XMLHttpRequest object
    let xhr = new XMLHttpRequest();

    // Configuring the XMLHttpRequest object
    xhr.open("POST", "php/signup.php", true);

    // Handling the response from the server when the request is complete
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Getting the response data from the server
                let data = xhr.response;

                // Checking if the signup was successful
                if (data === "success") {
                    // Redirecting the user to the users.php page upon successful signup
                    location.href = "users.php";
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
