<aside class="flex side-bar">
<nav class="sidebtns">

<?php
  switch ($_SERVER["SCRIPT_NAME"]) {
  case "/product_maintenance.php":
    $productMaintenanceActive = "<b>";
    $productMaintenanceActiveEnd = "</b>";
    break;
  case "/user_maintenance.php":
    $userMaintenanceActive = "<b>";
    $userMaintenanceActiveEnd = "</b>";
    break;
  case "/admin_transactions.php":
    $transactionsActive = "<b>";
    $transactionsActiveEnd = "</b>";
    break;
  }
?>

<ul>
  <li><a href="product_maintenance.php"><?php echo $productMaintenanceActive; ?>Product Maintenance<?php echo $productMaintenanceActiveEnd; ?></a></li>
  <li><a href="admin_transactions.php"><?php echo $transactionsActive; ?>Transactions<?php echo $transactionsActiveEnd; ?></a></li>
  <li><a href="user_maintenance.php"><?php echo $userMaintenanceActive; ?>User Maintenance<?php echo $userMaintenanceActiveEnd; ?></a></li>
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