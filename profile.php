<?php
  session_start();
  include "db_conn.php";
  if (! isset($_SESSION["user_id"])) {
    echo '<script> window.location.href = "login-signup.php" </script>';
  }

  $refreshDetailsstmt = mysqli_prepare($link, "SELECT * FROM accounts WHERE user_id = ?");
  mysqli_stmt_bind_param($refreshDetailsstmt, "i", $_SESSION["user_id"]);
  mysqli_execute($refreshDetailsstmt);
  $detailResults = mysqli_stmt_get_result($refreshDetailsstmt);
  $accountDetails = mysqli_fetch_array($detailResults);

  $_SESSION["username"] = $accountDetails["username"];
  $_SESSION["password"] = $accountDetails["password"];
  $_SESSION["full_name"] = $accountDetails["first_name"] . " " . $credentials["last_name"];
  $_SESSION["date_of_birth"] = $accountDetails["date_of_birth"];
  $_SESSION["phone_number"] = $accountDetails["phone_number"];
  $_SESSION["email"] = $accountDetails["email"];
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Profile Page</title>
    <!--css--> 
    <link rel="stylesheet" href="css/profile.css" /> 
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="lib/fontawesome-free-6.2.1-web/css/all.min.css"> 
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

            <nav class="sidebtns">

              <ul>
                <li><a href="account.php">My Account</a></li>
                <li><a href="#">My Purchase</a></li>
                <li><a id="drop" href="#">Settings</a>
                  <ul class="down">
                    <li><a href="change_pass.php">Change Password</a></li>
                    <li><a href="addresses.php">Addresses</a></li>
                  </ul>
                </li>
              </ul>

            </nav>

        </aside>

        <section class="flex profile">
          <div class="details">
            <div class="box1">
            <i class="fa-solid fa-xl fa-calendar"></i>
              <p><?php echo $_SESSION["date_of_birth"]; ?></p>
            </div>
            <div class="box1">
            <i class="fa-solid fa-xl fa-envelope"></i>
            <p><?php echo $_SESSION["email"]; ?></p>
            </div>
            <div class="box1">
            <i class="fa-solid fa-xl fa-phone"></i>
            <p><?php echo $_SESSION["phone_number"]; ?></p>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

  <?php include "footer.php"; ?>   

    <script src="js/app.js"></script>
    <script src="js/script.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
    $('#drop').click(function () {
       if ($('.down').is(':hidden')) {
           $('.down').show();
       } else {
           $('.down').hide();
       }
     }); 
   });
    </script>
  </body>
</html>
