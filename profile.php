<!DOCTYPE html>
<html>
  <head>
    <title>Profile Page</title>
    <!--css--> 
    <link rel="stylesheet" href="css/profile.css" /> 
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">

    <link rel="stylesheet" href="lib/fontawesome-free-6.2.1-web/css/all.min.css"> 
  </head>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <body>

  <?php include "header.php"; ?>    
    

  <div class="profile-box">
    <div class="container">
      <div class="flexing">

        <aside class="flex side-bar">

        <div class="boxprofile">
          <div class="img">
            <img src="images/cal.jpg" alt="Calvin">
          </div>

          <div class="names">
            <h1>Calvin James Mendoza</h1>
            <h2>Airtrickster</h2>
            <a href="#">Logout</a>
          </div>

        </div>

            <nav class="sidebtns">

              <ul>
                <li><a href="#">My Account</a></li>
                <li><a href="#">My Purchase</a></li>
                <li><a id="drop" href="#">Settings</a>
                  <ul class="down">
                    <li><a href="#">Reset Password</a></li>
                    <li><a href="#">Change Password</a></li>
                    <li><a href="#">Addresses</a></li>
                    <li><a href="#">Payment Methods</a></li>
                  </ul>
                </li>
              </ul>

            </nav>

        </aside>

        <section class="flex profile">
          <div class="details">
            <div class="box1">
            <i class="fa-solid fa-xl fa-calendar"></i>
              <p>Febuary 14, 2002</p>
            </div>
            <div class="box1">
            <i class="fa-solid fa-xl fa-envelope"></i>
            <p>Calvin@gmail.com</p>
            </div>
            <div class="box1">
            <i class="fa-solid fa-xl fa-phone"></i>
            <p>09123456789  </p>
            </div>
            <div class="box1">
            <i class="fa-solid fa-xl fa-location-dot"></i>
            <p>TIP-QC</p>
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
