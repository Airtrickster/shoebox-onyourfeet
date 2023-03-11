const form = document.querySelector("form");
const bankcardRadio = document.getElementById("bankcard");
const otherRadio = document.getElementById("other");

form.addEventListener("submit", (event) => {
  event.preventDefault();

  if (bankcardRadio.checked) {
    // Redirect to bank card payment page
    window.location.href = "https://bankcardpayment.com";
  } else if (otherRadio.checked) {
    // Redirect to other online transaction payment page
    window.location.href = "https://otherpayment.com";
  }
});
