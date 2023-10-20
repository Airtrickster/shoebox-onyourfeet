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

function changePassword() {
  if (document.forms["changePasswordForm"]["new-password"].value.length < 8) {
    alert("Your new password length must be at least 8 characters");
    return false;
  }

  if (document.forms["changePasswordForm"]["new-password"].value != document.forms["changePasswordForm"]["confirm-password"].value) {
    alert("Passwords aren't matched");
    return false;
  }
}