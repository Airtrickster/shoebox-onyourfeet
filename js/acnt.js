// Get elements
const usernameInput = document.getElementById("username");
const numberInput = document.getElementById("number");
const emailInput = document.getElementById("email");
const currentPasswordInput = document.getElementById("current-password");
const newPasswordInput = document.getElementById("new-password");
const confirmPasswordInput = document.getElementById("confirm-password");
const currentAddressInput = document.getElementById("current-address");
const newAddressInput = document.getElementById("new-address");
const passwordForm = document.getElementById("password");
const addressForm = document.getElementById("address");

// Add event listeners

usernameInput.addEventListener("input", () => {
  // Handle username input
});

numberInput.addEventListener("input", () => {
  // Handle number input
});

emailInput.addEventListener("input", () => {
  // Handle email input
});

passwordForm.addEventListener("submit", (event) => {
  event.preventDefault();
  const currentPassword = currentPasswordInput.value;
  const newPassword = newPasswordInput.value;
  const confirmPassword = confirmPasswordInput.value;
  // Handle password change form submission
});

addressForm.addEventListener("submit", (event) => {
  event.preventDefault();
  const currentAddress = currentAddressInput.value;
  const newAddress = newAddressInput.value;
  // Handle address change form submission
});

function showPassword() {
  passwordForm.style.display =
    passwordForm.style.display === "none" ? "block" : "none";
}

function showAddress() {
  addressForm.style.display =
    addressForm.style.display === "none" ? "block" : "none";
}
