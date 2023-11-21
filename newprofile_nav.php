<style>
.names {
	margin: 5px;
	line-height: 15pt;
}
.names h1 {
font-size: 20px;
}

.names h2 {
	font-size: 15px;
font-style: italic;
}

</style>


<aside class="flex side-bar">

<div class="boxprofile">
          <div class="img">
            <img src="images/profile_picture/<?php echo $_SESSION["image"];?>" alt="Calvin">
            <button class="change-dp" onclick='window.location.href = "change_profile_pic.php"'>
              <i class="fa-solid fa-camera"></i>
            </button>
          </div>

          <div class="names">
            <h1><?php echo $_SESSION["full_name"]; ?></h1>
            <h2><?php echo $_SESSION["username"]; ?></h2>
            <a href="logout.php" style="color: black;"><b>Logout</b></a>
          </div>

        </div>

<nav class="sidebtns">

<ul>
  <li><a href="account.php">My Account</a></li>
  <li><a href="purchases.php"><b>My Purchase</b></a></li>
  <li><a id="drop">Settings</a>
    <ul class="down">
      <li><a href="change_pass.php">Change Password</a></li>
      <li><a href="addresses.php">Addresses</a></li>
    </ul>
  </li>
</ul>

</nav>

</aside>

<script src="js/app.js"></script>
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