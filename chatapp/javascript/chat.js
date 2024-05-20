// Selecting necessary elements from the DOM
const form = document.querySelector(".typing-area"),
      incoming_id = form.querySelector(".incoming_id").value,
      inputField = form.querySelector(".input-field"),
      sendBtn = form.querySelector("button"),
      chatBox = document.querySelector(".chat-box");

// Prevent the default form submission behavior
form.onsubmit = (e) => {
    e.preventDefault();
}

// Set focus on the input field when the page loads
inputField.focus();

// Event listener for keyup in the input field to toggle 'active' class on the send button
inputField.onkeyup = () => {
    if (inputField.value != "") {
        sendBtn.classList.add("active");
    } else {
        sendBtn.classList.remove("active");
    }
}

// Event listener for sending a message when the send button is clicked
sendBtn.onclick = () => {
    // Create a new XMLHttpRequest
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert-chat.php", true);

    // Once the request loads, handle the response
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Clear the input field and scroll to the bottom of the chat box
                inputField.value = "";
                scrollToBottom();
            }
        }
    }

    // Create FormData and send it with the request
    let formData = new FormData(form);
    xhr.send(formData);
}

// Event listeners for mouse enter and leave on the chat box to add/remove 'active' class
chatBox.onmouseenter = () => {
    chatBox.classList.add("active");
}

chatBox.onmouseleave = () => {
    chatBox.classList.remove("active");
}

// Periodically fetch chat data using XMLHttpRequest
setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get-chat.php", true);

    // Once the request loads, handle the response
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                chatBox.innerHTML = data;

                // If the chat box is not active, scroll to the bottom
                if (!chatBox.classList.contains("active")) {
                    scrollToBottom();
                }
            }
        }
    }

    // Set request header and send incoming_id with the request
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("incoming_id=" + incoming_id);
}, 500);

// Function to scroll chat box to the bottom
function scrollToBottom() {
    chatBox.scrollTop = chatBox.scrollHeight;
}
