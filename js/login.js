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
  let x = document.forms["signupForm"]["usernameSignUp"].value;
  if (x == "") {
    alert("Name must be filled out");
    return false;
  }

  let u = document.forms["signupForm"]["emailSignUp"].value;
  if (u == "") {
    alert("Email must be filled out properly");
    return false;
  }

  let y = document.forms["signupForm"]["passwordSignUp"].value;
  if (y == "") {
    alert("Password must be filled out");
    return false;
  }
}