function checkout() {
    if (document.forms["checkout-form"]["address"].value == "") {
        alert("No address is selected");
        return false;
    }
    return true;
}