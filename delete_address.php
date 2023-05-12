<?php
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
  include "db_conn.php";
  if (! isset($_SESSION["user_id"])) {
    echo '<script> window.location.href="index.php" </script>'; 
  }
  $checkUserstmt = mysqli_prepare($link, "SELECT address_id, user_id FROM addresses WHERE address_id = ? AND user_id = ?");
  mysqli_stmt_bind_param($checkUserstmt, "ii", $_GET["address_id"], $_SESSION["user_id"]);
  mysqli_execute($checkUserstmt);
  $checkUserResults = mysqli_stmt_get_result($checkUserstmt);
  $addressOwner = mysqli_fetch_array($checkUserResults);

  if (is_array($addressOwner)) {
    $deleteAddressstmt = mysqli_prepare($link, "DELETE FROM addresses WHERE address_id = ?");
    mysqli_stmt_bind_param($deleteAddressstmt, "i", $_GET["address_id"]);
    mysqli_execute($deleteAddressstmt);
  } else {
    echo '<script> window.location.href = "index.php"; </script>';
  }
?>

<script>
    history.back();
</script>