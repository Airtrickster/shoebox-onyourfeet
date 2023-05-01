<?php
  session_start();
  include "db_conn.php";
  if (! isset($_SESSION["user_id"])) {
    echo '<script> window.location.href = "login-signup.php" </script>';
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Edit Address</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="css/address.css" />
  </head> 
  <body>
   

    <div class="container">
    <div class="box">
      <h1>Address Settings</h1>
        <form  action="" id="addAddressForm" method="post" enctype="multipart/form-data" onsubmit='return validateAddress();'>
          <label for="address">Address:</label>
          <input
            type="text"
            id="address"
            name="address"
            placeholder="Enter your address"
          />
          <label for="city">City:</label>
          <input type="text" id="city" name="city" placeholder="Enter your city" />
          <label for="state">State:</label>
          <input
            type="text"
            id="state"
            name="state"
            placeholder="Enter your state"
          />
          <label for="country">Country:</label>
          <input
            type="text"
            id="country"
            name="country"
            placeholder="Enter your country"
          />
          <label for="zip">Zip Code:</label>
          <input
            type="text"
            id="zip"
            name="zip"
            placeholder="Enter your zip code"
          />
          <input type="submit" value="Save" name="saveAddress">
        </form>
    </div>
    </div>

    <?php 
      if (isset($_POST["saveAddress"])) {
        $addAddressstmt = mysqli_prepare($link, "INSERT INTO addresses(user_id, address, city, state, country, zip_code) VALUES (?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($addAddressstmt, "isssss", $_SESSION["user_id"], $_POST["address"], $_POST["city"], $_POST["state"], $_POST["country"], $_POST["zip"]);
        mysqli_execute($addAddressstmt);
        
        echo '<script> alert("Address added successfully!"); </script>';
      }
    ?>

    <script src="js/address.js"></script>
  </body>
</html>
