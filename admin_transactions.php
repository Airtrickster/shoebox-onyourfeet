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
    <title> Transactions </title>
    <!--css--> 
    <link rel="stylesheet" href="css/profile.css" /> 
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="lib/fontawesome-free-6.2.1-web/css/all.min.css">
    <link rel="icon" href="images/icon.png">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

    <style>
      .neumorph-card{
        border:1px solid #000;
        background:rgb(197, 220, 251);
        margin-top:20px;
        border-radius:20px;
        display: flex;
        justify-content:space-around;
        align-items:center;
        padding:20px;
      }
      .neumorph-card img{
        width: 30%;
        aspect-ratio:1/1;
        border-radius:20px;
      }

      .button-box{
        display: flex;
        justify-content: center;
        align-items:center
      }

      .detail{
        height:20vh;
        display: flex;
        flex-direction: column;
      }

      .detail a{
        font-size:2rem;
        margin-bottom: 30px;
        color:black;
      }

      .detail a:hover{
        text-decoration: underline;
      }

      .detail p{
        margin: 4px 0px;
      }


      .center h2{
        font-size:1.5rem;
        text-align: center;
      }

      .button-box button{
       margin:0px 5px;
      }

      .button-box button:hover{
        cursor: pointer;
        background: #d2a671;
        color:black;
      }

      .scroll::-webkit-scrollbar{
        width:10px;
      }

      .scroll::-webkit-scrollbar-thumb{
        background: gray;
        border-radius:50px;
      }

      .flex button:hover{
        cursor: pointer;
        background: #d2a671;
        color:black;
      }
    </style>
  </head>

  <script src="lib/jquery-3.6.3.js"></script>
  <body>

  <?php include "header.php"; ?>    
    

  <div class="profile-box">
    <div class="container">
      <div class="flexing">

      <?php include "admin_nav.php"; ?>

        <section class="flex address">
            <?php
              $purchasesstmt = mysqli_prepare($link, "SELECT transaction_id, transactions.user_id, CONCAT(accounts.last_name, ', ', accounts.first_name)  AS \"full_name\", address, products.product_id AS \"products_product_id\", quantity, amount, order_datetime, payment_method,products.name AS \"products_name\", products.image AS \"products_image\" FROM transactions LEFT JOIN products ON transactions.product_id = products.product_id INNER JOIN accounts ON transactions.user_id = accounts.user_id ORDER BY transaction_id DESC;");
              mysqli_execute($purchasesstmt);
              $purchasesResults = mysqli_stmt_get_result($purchasesstmt);

              while ($purchasesRow = mysqli_fetch_array($purchasesResults)) {
                echo '
                <div class="neumorph-card">
                  <img src="images/products/' . $purchasesRow["products_image"] . '">
                  <div class="detail">
                  <a href="product_details.php?product_id=' . $purchasesRow["products_product_id"] . '">' . $purchasesRow["products_name"] . '</a>
                      <p><strong>Ordered by: </strong>' . $purchasesRow["full_name"] . '</p>
                      <p><strong>Date Ordered: </strong>' . $purchasesRow["order_datetime"] . '</p>
                      <p><strong>Quantity:</strong> ' . $purchasesRow["quantity"] . '</p>
                      <p><strong>Amount Paid:</strong> ' . $purchasesRow["amount"] . '</p>
                      <p><strong>Payment Method Used:</strong> ' . $purchasesRow["payment_method"] . '</p>
                      <p><strong>Delivered to:</strong> ' . $purchasesRow["address"] . '</p>
                  </div>
                </div>';
              }

              if (mysqli_num_rows($purchasesResults) == 0) {
                echo '<div class="flex-add-btn">  
                <p> No transactions </p>
                </div>';
              }
            ?>
        </section>
      </div>
    </div>
  </div>

  <?php include "footer.php"; ?>   

    <script src="js/admin_script.js"></script>

  </body>
</html>
