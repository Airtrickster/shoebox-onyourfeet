<?php
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
  include "db_conn.php";

  if (! isset($_SESSION["user_id"])) {
    echo '<script> window.location.href = "login-signup.php" </script>';
  }

  if ($_SESSION["user_type"] != "admin") {
    echo '<script> window.location.href = "index.php" </script>';
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title> Product Maintenance </title>
    <!--css--> 
    <link rel="stylesheet" href="css/profile.css" /> 
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">

    <link rel="stylesheet" href="lib/fontawesome-free-6.2.1-web/css/all.min.css"> 
  </head>

  <script src="lib/jquery-3.6.3.js"></script>
  <body>

  <?php include "header.php"; ?>    
    

  <div class="profile-box">
    <div class="container">
      <div class="flexing">

      <?php include "admin_nav.php"; ?>

        <section class="flex address">
            <button onclick='window.location.href = "add_product.php"'>Add Product</button>
            <?php
              $productResults = mysqli_query($link, "SELECT * FROM products");

              while ($productRow = mysqli_fetch_array($productResults)) {
                echo '
                <div class="flex-add-btn">
                <img src="images/products/' . $productRow["image"] . '">
                <p>' . $productRow["name"] . '</p>
                <button onclick=\'window.location.href = "edit_product.php?product_id=' . $productRow["product_id"] . '"\'>Edit</button>
                <button onclick=\'window.location.href = "delete_product.php?product_id=' . $productRow["product_id"] . '"\'>Remove</button>
                </div>';
              }

              if (mysqli_num_rows($productResults) == 0) {
                echo '<div class="flex-add-btn">  
                <p> No products added yet </p>
                </div>';
              }

            ?>
        </section>
      </div>
    </div>
  </div>

    <script src="js/admin_script.js"></script>

  </body>
</html>
