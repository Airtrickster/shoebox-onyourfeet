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

  var dob = new Date(document.forms["signupForm"]["dateOfBirthSignUp"].value);
  //calculate month difference from current date in time
  var month_diff = Date.now() - dob.getTime();
  
  //convert the calculated difference in date format
  var age_dt = new Date(month_diff); 
  
  //extract year from date    
  var year = age_dt.getUTCFullYear();
  
  //now calculate the age of the user
  var age = Math.abs(year - 1970);
  
  if (age < 18) {
    alert("You must be at least 18 years old to create an account");
    return false;
  }

  if (! document.forms["signupForm"]["phoneNumberSignUp"].value) {
    alert("Phone number must be filled out");
    return false;
  }

  if (document.forms["signupForm"]["phoneNumberSignUp"].value.match(/[^0-9+-]+/g)) {
    alert("Must be a valid phone number");
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

  if (document.forms["signupForm"]["passwordSignUp"].value.length < 8) {
    alert("Password length must be at least 8 characters");
    return false;
  }

  if (document.forms["signupForm"]["passwordSignUp"].value !== document.forms["signupForm"]["confirmPasswordSignUp"].value) {
    alert("Passwords do not match");
    return false;
  }

  if (! document.forms["signupForm"]["agreeSignUp"].checked) {
    alert("You must agree to the Terms of Service");
    return false;
  }
}