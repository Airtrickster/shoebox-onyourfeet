<!DOCTYPE html>
<html lang="en"> 
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Other Transaction Payment</title>
    <link rel="stylesheet" href="css/other_payment.css" />
  </head>
  <body>
    <form action="checkout.php" method="post" id="payment-method-form" onsubmit='return payNow()'>
      <input type="hidden" name="address_id" value="<?php echo $_POST["address_id"]; ?>"/>
      <div class="flex">
        <h1>other transaction payment</h1>

        <label for="payment-method">Select Payment Method</label>
        <select name="payment-method">
          <option value="GCash"> GCash </option>
          <option value="PayMaya"> PayMaya </option>
          <option value="PayPal"> PayPal </option>
        </select>

        <label for="account-id">Account ID</label>
        <input type="text" id="account-id" name="account-id" />

        <input type="submit" value="pay now"/> 

        
      </div>
    </form>

  </body>
</html>

