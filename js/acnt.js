function changeDetails() {
  if (! document.forms["accountForm"]["username_new"].value) {
    alert("Username is empty");
    return false;
  }

  if (! document.forms["accountForm"]["phone_new"].value) {
    alert("Phone number must be filled out");
    return false;
  }

  if (document.forms["accountForm"]["phone_new"].value.match(/[^0-9+-]+/g)) {
    alert("Must be a valid phone number");
    return false;
  }

  var dob = new Date(document.forms["accountForm"]["bday_new"].value);
  //calculate month difference from current date in time
  var month_diff = Date.now() - dob.getTime();
  
  //convert the calculated difference in date format
  var age_dt = new Date(month_diff); 
  
  //extract year from date    
  var year = age_dt.getUTCFullYear();
  
  //now calculate the age of the user
  var age = Math.abs(year - 1970);

  if (! document.forms["accountForm"]["bday_new"].value) {
    alert("You must specify your date of birth");
    return false;
  }

  if (age < 18) {
    alert("You must be at least 18 years old to create an account");
    return false;
  }

  return true;
}