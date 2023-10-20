const profilePictureUpload = document.getElementById("profile-picture-upload");
const profilePicture = document.querySelector(".profile-picture img");

profilePictureUpload.addEventListener("change", function () {
  const file = this.files[0];
  if (file) {
    const reader = new FileReader();
    reader.addEventListener("load", function () {
      profilePicture.setAttribute("src", this.result);
    });
    reader.readAsDataURL(file);
  }
});

const accountButton = document.getElementById("account-button");
const logoutButton = document.getElementById("logout-button");
const switchAccountButton = document.getElementById("switch-account-button");

accountButton.addEventListener("click", function () {
  // Code to display account and security details
});

logoutButton.addEventListener("click", function () {
  // Code to logout user
});

switchAccountButton.addEventListener("click", function () {
  // Code to switch user account
});
