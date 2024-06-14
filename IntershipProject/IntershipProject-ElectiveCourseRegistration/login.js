// let student = document.getElementById("student");
// let admin = document.getElementById("admin");
// let unameElement=document.getElementById("uname");
// let loginButton=document.getElementById("loginButton");

// student.onclick = function () {
//   admin.classList.add("disable");
//   student.classList.remove("disable");
//   unameElement.placeholder="Enter USN";
//   loginButton.textContent="Login as Student";

// };

// admin.onclick = function () {
//   student.classList.add("disable");
//   admin.classList.remove("disable");
//   unameElement.placeholder="Enter Username";
//   loginButton.textContent="Login as Admin";
// };

let student = document.getElementById("student");
let admin = document.getElementById("admin");
let unameElement = document.getElementById("uname");
let loginButton = document.getElementById("loginButton");
let form = document.querySelector("form");
let selectedRoleInput = document.getElementById("selectedRole");
let errorMessage = document.getElementById("error-message");

student.onclick = function () {
  admin.classList.add("disable");
  student.classList.remove("disable");
  unameElement.placeholder = "Enter USN";
  loginButton.textContent = "Login as Student";

  // Update the selected role input
  selectedRoleInput.value = "student";
  errorMessage.style.display = "none";
};

admin.onclick = function () {
  student.classList.add("disable");
  admin.classList.remove("disable");
  unameElement.placeholder = "Enter Username";
  loginButton.textContent = "Login as Admin";

  // Update the selected role input to "admin" when the Admin option is selected
  selectedRoleInput.value = "admin";
  errorMessage.style.display = "none";
};

form.addEventListener("submit", function (event) {
  const selectedRole = selectedRoleInput.value;
  const usernameValue = unameElement.value;

  if (selectedRole === "student" && !isValidUSN(usernameValue)) {
    alert("Invalid USN!");
    event.preventDefault(); // Prevent form submission
  }
  if (selectedRole === "admin" && !isValidAdminUsername(usernameValue)) {
    alert("Invalid Username!");
    event.preventDefault(); // Prevent form submission
  }
});


function isValidUSN(usn) {
  const usnPattern = /^4SU20(CS|IS|EC|EE|CV)\d{3}$/;
  return usnPattern.test(usn);
}

function isValidAdminUsername(username) {
  const adminUsernamePattern = /^[A-Za-z]+$/; 
  return adminUsernamePattern.test(username);
}



