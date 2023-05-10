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
    <title> Addresses </title>
    <!--css--> 
    <link rel="stylesheet" href="css/profile.css" /> 
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="lib/fontawesome-free-6.2.1-web/css/all.min.css">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  </head>

  <script src="lib/jquery-3.6.3.js"></script>
  <body>

  <?php include "header.php"; ?>    
    

  <div class="profile-box">
    <div class="container">
      <div class="flexing">

        <aside class="flex side-bar">

        <div class="boxprofile">
          <div class="img">
            <img src="images/blank-profile-picture.webp" alt="Calvin">
          </div>

          <div class="names">
            <h1><?php echo $_SESSION["full_name"]; ?></h1>
            <h2><?php echo $_SESSION["username"]; ?></h2>
            <a href="logout.php">Logout</a>
          </div>

        </div>

        <?php include "profile_nav.php"; ?>

        </aside>

        <section class="flex address">
            <?php
              $purchasesstmt = mysqli_prepare($link, "SELECT user_id, products.product_id AS \"products_product_id\", quantity, amount, order_datetime, payment_method,products.name AS \"products_name\", products.image AS \"products_image\" FROM transactions LEFT JOIN products ON transactions.product_id = products.product_id WHERE user_id = ?;");
              mysqli_stmt_bind_param($purchasesstmt, "i", $_SESSION["user_id"]);
              mysqli_execute($purchasesstmt);
              $purchasesResults = mysqli_stmt_get_result($purchasesstmt);

              while ($purchasesRow = mysqli_fetch_array($purchasesResults)) {
                echo '
                <div class="flex-add-btn">
                  <img src="images/products/' . $purchasesRow["products_image"] . '">
                  <p>
                    <a href="product_details.php?product_id=' . $purchasesRow["products_product_id"] . '">' . $purchasesRow["products_name"] . '</a>
                    Date Ordered: ' . $purchasesRow["order_datetime"] . '
                    Quantity: ' . $purchasesRow["quantity"] . '
                    Amount Paid: ' . $purchasesRow["amount"] . '
                    Payment Method Used: ' . $purchasesRow["payment_method"] . '
                  </p>
                </div>';
              }

              if (mysqli_num_rows($purchasesResults) == 0) {
                echo '<div class="flex-add-btn">  
                <p> You have no purchases yet </p>
                </div>';
              }
            ?>
        </section>
      </div>
    </div>
  </div>

  <?php include "footer.php"; ?>   

    <script src="js/script.js"></script>

  </body>
</html>
