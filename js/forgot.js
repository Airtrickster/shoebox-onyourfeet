const form = document.querySelector("#forgot-password-form");
const message = document.querySelector("#message");

form.addEventListener("submit", (e) => {
  e.preventDefault();
  const email = form.email.value.trim();

  if (!isValidEmail(email)) {
    showMessage("Please enter a valid email address.", "error");
  } else {
    // Send request to reset password
    showMessage("Email sent. Please check your inbox.", "success");
    form.reset();
  }
});

function isValidEmail(email) {
  // Use regex to validate email address
  const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return regex.test(email);
}

function showMessage(msg, type) {
  message.textContent = msg;
  message.className = type;
}
