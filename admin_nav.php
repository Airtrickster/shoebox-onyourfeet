<aside class="flex side-bar">
<nav class="sidebtns">

<ul>
  <li><a href="product_maintenance.php">Product Maintenance</a></li>
  <li><a id="drop">Settings</a>
    <ul class="down">
      <li><a href="account.php">My Account</a></li>
      <li><a href="change_pass.php">Change Password</a></li>
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