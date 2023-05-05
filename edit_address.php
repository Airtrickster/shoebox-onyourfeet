<?php
  session_start();
  include "db_conn.php";
  if (! isset($_SESSION["user_id"])) {
    echo '<script> window.location.href = "login-signup.php" </script>';
  }

  $getAddressstmt = mysqli_prepare($link, "SELECT * FROM addresses WHERE address_id = ? AND user_id = ?;");
  mysqli_stmt_bind_param($getAddressstmt, "ii", $_GET["address_id"], $_SESSION["user_id"]);
  mysqli_execute($getAddressstmt);
  $getAddressResults = mysqli_stmt_get_result($getAddressstmt);

  if (mysqli_num_rows($getAddressResults) == 0) {
    echo '<script> window.location.href = "index.php"; </script>';
  }

  while ($addressRow = mysqli_fetch_array($getAddressResults)) {
    $address = $addressRow["address"];
    $city = $addressRow["city"];
    $state = $addressRow["state"];
    $country = $addressRow["country"];
    $zipCode = $addressRow["zip_code"];
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
            value="<?php echo $address; ?>"
          />
          <label for="city">City:</label>
          <input type="text" id="city" name="city" placeholder="Enter your city" value="<?php echo $city; ?>" />
          <label for="state">State:</label>
          <input
            type="text"
            id="state"
            name="state"
            placeholder="Enter your state"
            value="<?php echo $state; ?>"
          />
          <label for="country">Country:</label>
          <input
            type="text"
            id="country"
            name="country"
            placeholder="Enter your country"
            value="<?php echo $country; ?>"
          />
          <label for="zip">Zip Code:</label>
          <input
            type="text"
            id="zip"
            name="zip"
            placeholder="Enter your zip code"
            value="<?php echo $zipCode; ?>"
          />
          <input type="submit" value="Save" name="saveAddress">
        </form>
    </div>
    </div>

    <?php 
      if (isset($_POST["saveAddress"])) {
        $editAddressstmt = mysqli_prepare($link, "UPDATE addresses SET address = ?, city = ?, state = ?, country = ?, zip_code = ? WHERE address_id = ? AND user_id = ?;");
        mysqli_stmt_bind_param($editAddressstmt, "sssssii", $_POST["address"], $_POST["city"], $_POST["state"], $_POST["country"], $_POST["zip"], $_GET["address_id"], $_SESSION["user_id"]);
        mysqli_execute($editAddressstmt);

        echo '<script> alert("Address editted successfully!"); </script>';
      }
    ?>

    <script src="js/address.js"></script>
  </body>
</html>
