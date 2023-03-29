function resetPassword() {
  var password = document.getElementById("password").value;
  var confirmPassword = document.getElementById("confirm-password").value;

  if (password != confirmPassword) {
    alert("Passwords do not match.");
  } else {
    // Your password reset code goes here
    alert("Password reset successful.");
  }
}
