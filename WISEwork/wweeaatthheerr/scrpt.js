// Handle form submission for login
document
  .getElementById("login-form")
  .addEventListener("submit", function (event) {
    event.preventDefault();
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    // Send data to backend
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "backend.py", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        if (xhr.responseText === "true") {
          alert("Login successful");
        } else {
          alert("Invalid username or password");
        }
      }
    };
    xhr.send("action=login&username=" + username + "&password=" + password);
  });

// Handle form submission for registration
document
  .getElementById("register-form")
  .addEventListener("submit", function (event) {
    event.preventDefault();
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    // Send data to backend
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "backend.py", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        if (xhr.responseText === "true") {
          alert("Registration successful");
        } else {
          alert("Username already exists");
        }
      }
    };
    xhr.send("action=register&username=" + username + "&password=" + password);
  });
