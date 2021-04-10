let passwordInput = document.getElementById("app-password");
let check = document.getElementById("app-check");

check.addEventListener("click", () => {
  if (check.checked) {
    passwordInput.type = "text";
  } else {
    passwordInput.type = "password";
  }
});
