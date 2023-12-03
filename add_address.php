<?php
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  include "db_conn.php";
  if (!isset($_SESSION["user_id"])) {
    echo '<script>window.location.href = "login-signup.php"</script>';
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Address</title>
    <link rel="stylesheet" href="acntstyle.css">
    <link rel="icon" href="images/icon.png">
  </head> 
  <body>

    <ddiv class="maincontainer">
        <div class="account">
            <img src="https://cdn.glitch.global/c8513165-1e64-49ea-8c73-5b1d9812e542/shoebox?v=1697958778893" alt="Shoebox" width="100" height="100">
            <h2>Add New Address</h2>
            <div class="formcon">
        <form action="" id="addAddressForm" method="post" enctype="multipart/form-data" onsubmit="return validateAddress();">

          <input type="text" id="address" name="address" placeholder="Enter your address" /> <br /> <br />

          <input type="text" id="city" name="city" placeholder="Enter your city" /> <br /> <br />

          <input type="text" id="state" name="state" placeholder="Enter your state" /> <br /> <br />

          <input type="text" id="country" name="country" placeholder="Enter your country" /> <br /> <br />

          <input type="text" id="zip" name="zip" placeholder="Enter your zip code" /> <br /> <br />

          <input type="submit" value="Save" class="sbutton" name="saveAddress">
        </form>
      </div>
    </div>
</div>

    <?php 
      if (isset($_POST["saveAddress"])) {
        $addAddressstmt = mysqli_prepare($link, "INSERT INTO addresses(user_id, address, city, state, country, zip_code) VALUES (?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($addAddressstmt, "isssss", $_SESSION["user_id"], $_POST["address"], $_POST["city"], $_POST["state"], $_POST["country"], $_POST["zip"]);
        mysqli_execute($addAddressstmt);

        echo '<script>alert("Address added successfully!");</script>';
      }
    ?>

    <script src="js/address.js"></script>
  </body>
</html>
