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
        width: 60%;
        aspect-ratio:1/1;
        border-radius:20px;
      }

      .button-box{
        display: flex;
        justify-content: center;
        align-items:center
      }

      .center h2{
        font-size:1.5rem;
        text-align: center;
      }
      
      .center{
        display:flex;
        width: 33.3%;
        justify-content:center;
        align-items:center;
        height:100%;
      }

      .left{
        display:flex;
        width: 33.3%;
        justify-content:center;
        height:100%;
      }

      .right{
        display: flex;
        justify-content:flex-end;
        width: 33.3%;
        height:100%;
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

        <section class="flex address scroll">
            <button onclick='window.location.href = "add_product.php"'>Add Product</button>
            <?php
              $productResults = mysqli_query($link, "SELECT * FROM products");

                while($productRow = mysqli_fetch_array($productResults)){
                echo '
                <div class="neumorph-card">
                <div class="left"><img src="images/products/' . $productRow["image"] . '"></div>
                <div class="center">
                  <h2>' . $productRow["name"] . '</h2>
                </div>
                <div class="right button-box">
                  <button onclick=\'window.location.href = "edit_product.php?product_id=' . $productRow["product_id"] . '"\'>Edit</button>
                  <button onclick=\'window.location.href = ""\'>Remove</button>
                </div>
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
