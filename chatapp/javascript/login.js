// Selecting necessary elements from the DOM
const form = document.querySelector(".login form"),
    continueBtn = form.querySelector(".button input"),
    errorText = form.querySelector(".error-text");

// Prevent the default form submission behavior
form.onsubmit = (e) => {
    e.preventDefault();
}

// Event listener for the continue button click (login action)
continueBtn.onclick = () => {
    // Create a new XMLHttpRequest
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/login.php", true);

    // Once the request loads, handle the response
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    // Redirect to users.php upon successful login
                    location.href = "users.php";
                } else {
                    // Display error message if login fails
                    errorText.style.display = "block";
                    errorText.textContent = data;
                }
            }
        }
    }

    // Create FormData and send it with the request
    let formData = new FormData(form);
    xhr.send(formData);
}
