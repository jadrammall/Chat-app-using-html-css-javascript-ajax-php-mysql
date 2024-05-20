// Selecting necessary DOM elements
const searchBar = document.querySelector(".search input"), // Selecting the search input element
      searchIcon = document.querySelector(".search button"), // Selecting the search button element
      usersList = document.querySelector(".users-list"); // Selecting the users list element

// Event listener for the click on the search icon
searchIcon.onclick = () => {
  // Toggling the visibility of the search bar and icon
  searchBar.classList.toggle("show");
  searchIcon.classList.toggle("active");
  
  // Setting focus to the search bar and clearing the value if the search bar is active
  searchBar.focus();
  if (searchBar.classList.contains("active")) {
    searchBar.value = "";
    searchBar.classList.remove("active");
  }
}

// Event listener for the keyup event in the search bar
searchBar.onkeyup = () => {
  let searchTerm = searchBar.value;

  // Adding or removing 'active' class based on search bar content
  if (searchTerm != "") {
    searchBar.classList.add("active");
  } else {
    searchBar.classList.remove("active");
  }

  // Creating an XMLHttpRequest to send search term to the server
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/search.php", true);

  // Handling the response from the server when the request is complete
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // Updating the users list with the received data from the server
        let data = xhr.response;
        usersList.innerHTML = data;
      }
    }
  }

  // Setting request header and sending the search term to the server
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm);
}

// Periodically fetching user list data from the server
setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "php/users.php", true);

  // Handling the response from the server when the request is complete
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // Updating the users list only if the search bar is not active
        let data = xhr.response;
        if (!searchBar.classList.contains("active")) {
          usersList.innerHTML = data;
        }
      }
    }
  }

  // Sending a GET request to fetch the user data
  xhr.send();
}, 500);
