const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});

function signUpValidation() {
  if (! document.forms["signupForm"]["firstNameSignUp"].value) {
    alert("First Name must be filled out");
    return false;
  }

  if (! document.forms["signupForm"]["lastNameSignUp"].value) {
    alert("Last Name must be filled out");
    return false;
  }

  if (! document.forms["signupForm"]["emailSignUp"].value) {
    alert("Email must be filled out properly");
    return false;
  }

  if (! document.forms["signupForm"]["dateOfBirthSignUp"].value) {
    alert("You must specify your date of birth");
    return false;
  }

  if (! document.forms["signupForm"]["phoneNumberSignUp"].value) {
    alert("Phone number must be filled out");
    return false;
  }
  
  if (! document.forms["signupForm"]["usernameSignUp"].value) {
    alert("Username must be filled out");
    return false;
  }

  if (! document.forms["signupForm"]["passwordSignUp"].value) {
    alert("Password must be filled out");
    return false;
  }

  if (! document.forms["signupForm"]["agreeSignUp"].checked) {
    alert("You must agree to the Terms of Service");
    return false;
  }
}