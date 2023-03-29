const showPasswordCheckbox = document.getElementById("show-password");
const currentPasswordInput = document.getElementById("current-password");
const newPasswordInput = document.getElementById("new-password");
const confirmPasswordInput = document.getElementById("confirm-password");

showPasswordCheckbox.addEventListener("click", () => {
  if (showPasswordCheckbox.checked) {
    currentPasswordInput.type = "text";
    newPasswordInput.type = "text";
    confirmPasswordInput.type = "text";
  } else {
    currentPasswordInput.type = "password";
    newPasswordInput.type = "password";
    confirmPasswordInput.type = "password";
  }
});
