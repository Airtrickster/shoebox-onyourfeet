<!DOCTYPE html> 
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bank Card Payment</title>
    <link rel="stylesheet" href="css/bank.css" />
  </head>
  <body>
    
    <form action="checkout.php" method="post">
      <input type="hidden" name="address_id" value="<?php echo $_POST["address_id"]; ?>">
      <input type="hidden" name="payment-method" value="<?php echo "Bank"; ?>">
      <div class="flex">
        <h1>bank card payment</h1>

        <label for="cardnum">card number</label> 
        <input type="number" name="cardnum" id="cardnum">

        <label for="cardhold">card holder</label>
        <input type="text" name="cardhold" id="cardhold">

        <label for="exdate">expiration date</label>
        <input type="date" name="exdate" id="exdate">

        <label for="cvv">card verification value</label>
        <input type="password" name="cvv" id="cvv">

        <input type="submit" value="pay now">
      </div>
    </form>
   
  </body>
</html>
