/*
var geocoder;
var map;

function initMap() {
  geocoder = new google.maps.Geocoder();
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -34.397, lng: 150.644 },
    zoom: 8,
  });
}

function codeAddress() {
  var address = document.getElementById("address").value;
  var city = document.getElementById("city").value;
  var state = document.getElementById("state").value;
  var country = document.getElementById("country").value;
  var zip = document.getElementById("zip").value;
  var fullAddress =
    address + ", " + city + ", " + state + ", " + country + ", " + zip;

  geocoder.geocode({ address: fullAddress }, function (results, status) {
    if (status == "OK") {
      map.setCenter(results[0].geometry.location);
      var marker = new google.maps.Marker({
        map: map,
        position: results[0].geometry.location,
      });
    } else {
      alert("Geocode was not successful for the following reason: " + status);
    }
  });
}

*/

function validateAddress() {
  if (! document.forms["addAddressForm"]["address"].value) {
    alert("Address must be filled");
    return false;
  }

  if (! document.forms["addAddressForm"]["city"].value) {
    alert("City must be filled");
    return false;
  }

  if (! document.forms["addAddressForm"]["state"].value) {
    alert("State must be filled");
    return false;
  }

  if (! document.forms["addAddressForm"]["country"].value) {
    alert("Country must be filled");
    return false;
  }

  if (! document.forms["addAddressForm"]["zip"].value) {
    alert("Zip code must be filled");
    return false;
  }

  return true;
}