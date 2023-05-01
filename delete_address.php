<?php
  session_start();
  include "db_conn.php";
  if (! isset($_SESSION["user_id"])) {
    echo '<script> window.location.href="index.php" </script>'; 
  }
  $checkUserstmt = mysqli_prepare($link, "SELECT user_id FROM addresses WHERE address_id = ?");
  mysqli_stmt_bind_param($checkUserstmt, "i", $_GET["address_id"]);
  mysqli_execute($checkUserstmt);
  $checkUserResults = mysqli_stmt_get_result($checkUserstmt);
  $addressOwner = mysqli_fetch_array($checkUserResults);

  if ($addressOwner["user_id"] == $_SESSION["user_id"]) {
    $deleteAddressstmt = mysqli_prepare($link, "DELETE FROM addresses WHERE address_id = ?");
    mysqli_stmt_bind_param($deleteAddressstmt, "i", $_GET["address_id"]);
    mysqli_execute($deleteAddressstmt);
  }
?>

<script>
    history.back();
</script>