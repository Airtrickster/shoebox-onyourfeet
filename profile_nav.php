<nav class="sidebtns">

<ul>
  <li><a href="account.php">My Account</a></li>
  <li><a href="purchases.php">My Purchase</a></li>
  <li><a id="drop">Settings</a>
    <ul class="down">
      <li><a href="change_pass.php">Change Password</a></li>
      <li><a href="addresses.php">Addresses</a></li>
    </ul>
  </li>
</ul>

</nav>

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