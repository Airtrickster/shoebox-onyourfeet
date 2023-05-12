<?php
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
    include "db_conn.php";
?>

<!DOCTYPE html> 
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checkout Page</title>
    <link rel="stylesheet" href="css/checkout.css" />
  </head>
  <body>
    <form action="bank.php" id="checkout-form" method="post" onsubmit='return checkout()'>
      <h2>Checkout</h2>
      <h3>Select Payment Method</h3>
      <input
        type="radio"
        id="bankcard"
        value="Bank"
        name="payment-method"
        onclick='document.getElementById("checkout-form").action = "bank.php";'
        checked
      />
      <label for="bankcard">Bank Card</label>
      <input type="radio" id="other" value="other" name="payment-method" onclick='document.getElementById("checkout-form").action = "other_payment.php";' />
      <label for="other">Other Online Transaction</label>
      <label for="address"> Address </label>
      
      <?php
        $getAddressstmt = mysqli_prepare($link, "SELECT * FROM addresses WHERE user_id = ?");
        mysqli_stmt_bind_param($getAddressstmt, "i", $_SESSION["user_id"]);
        mysqli_execute($getAddressstmt);
        $getAddressResults = mysqli_stmt_get_result($getAddressstmt);
        if (mysqli_num_rows($getAddressResults) == 0) {
          $noAddress = true;
          $disableAddress = "disabled";
        }
        echo '<select name="address_id" id="address" class="details-page-product-size-select"' . $disableAddress . '>';
        while ($addressRow = mysqli_fetch_array($getAddressResults)) {
          echo '<option value="' . $addressRow["address_id"] . '">' . $addressRow["address"] . ', ' .  $addressRow["city"] . ', ' . $addressRow["state"] . ', ' . $addressRow["country"] . ', ' . $addressRow["zip_code"] . '</option>';
        }
        if ($noAddress) {
          echo '<option value="" disabled selected> Please add an address in the profile page </option>';
        }
      ?>
      </select>
      <input type="submit" value="Proceed">
    </form>
    <script src="js/checkout.js"></script>
  </body>
</html>
