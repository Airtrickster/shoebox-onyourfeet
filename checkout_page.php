<?php
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
    include "db_conn.php";

    if (! isset($_SESSION["user_id"])) {
      echo '<script> window.location.href = "index.php" </script>';
    }

    $checkCartstmt = mysqli_prepare($link, "SELECT COUNT(*) as \"cart_count\" FROM cart INNER JOIN accounts on cart.user_id = accounts.user_id WHERE cart.user_id = ?;");
    mysqli_stmt_bind_param($checkCartstmt, "i", $_SESSION["user_id"]);
    mysqli_stmt_execute($checkCartstmt);
    $checkCartResult = mysqli_stmt_get_result($checkCartstmt);
    $cartCount = mysqli_fetch_array($checkCartResult);

    if ($cartCount["cart_count"] < 1) {
      echo '<script> window.location.href = "index.php"; </script>';
    }

    $sumCartstmt = mysqli_prepare($link,"SELECT SUM(price * quantity) as \"sum_cart\" FROM cart INNER JOIN products ON cart.product_id = products.product_id WHERE user_id = ?;");
    mysqli_stmt_bind_param($sumCartstmt, "i", $_SESSION["user_id"],);
    mysqli_stmt_execute($sumCartstmt);
    $sumCartResult = mysqli_stmt_get_result($sumCartstmt);
    $sumCart = mysqli_fetch_array($sumCartResult);
    if (is_null($sumCart["sum_cart"])) {
      $amount = 0;
    } else {
      $amount = $sumCart["sum_cart"];
    }
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
    <form id="checkout-form">
      <h2>Checkout</h2>
      <h3> Select payment method </h3>
      <div id="paypal-button"> </div>
    </form>
    <form id="checkout_details" style="display: none;" action="checkout.php" method="post">
      <input type="hidden" name="payment-method" value="">
      <input type="hidden" name="address" value="">
    </form>
    <script src="js/checkout.js"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=AZruVem2-8j-tCTCdwgsq1TJtBHiiRXSezakfLjXOtcEbN_LsM4yb9MVJjDKxbBaNkeO3cISVtklZ-c_&currency=PHP"></script>
    <script> 
      paypal.Buttons({
    createOrder: function (data, actions) {
        return actions.order.create({
            purchase_units : [{
                amount: {
                    value: '<?php echo $amount;  ?>'
                }
            }]
        });
    },
    onApprove: function (data, actions) {
        return actions.order.capture().then(function (details) {
          console.log(details);
          document.forms["checkout_details"]["address"].value = details.purchase_units[0].shipping.address.address_line_1 + " " + details.purchase_units[0].shipping.address.admin_area_1 + " " + details.purchase_units[0].shipping.address.admin_area_2 + " " + details.purchase_units[0].shipping.address.country_code + " " + details.purchase_units[0].shipping.address.postal_code;
          document.forms["checkout_details"]["payment-method"].value = "paypal";
          document.getElementById("checkout_details").submit();
        })
    }
}).render('#paypal-button');</script>
  </body>
</html>
