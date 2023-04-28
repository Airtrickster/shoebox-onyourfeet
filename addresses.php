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
    <title>Profile Page</title>
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

            <nav class="sidebtns">

              <ul>
                <li><a href="#">My Account</a></li>
                <li><a href="#">My Purchase</a></li>
                <li><a id="drop" href="#">Settings</a>
                  <ul class="down">
                    <li><a href="change_pass.php">Change Password</a></li>
                    <li><a href="#">Addresses</a></li>
                  </ul>
                </li>
              </ul>

            </nav>

        </aside>

        <section class="flex address">
            <button>New Address</button>
            <div class="flex-add-btn">  
              <p>Robert Robertson, 1234 NW Bobcat Lane, St. Robert, MO 65584-5678</p>
              <button>Edit</button>
              <button>Remove</button>
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
