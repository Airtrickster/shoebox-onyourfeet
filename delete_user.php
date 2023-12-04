<?php
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
  include "db_conn.php";
  if (! isset($_SESSION["user_id"])) {
    echo '<script> window.location.href="index.php" </script>'; 
  }

  if ($_SESSION["user_type"] != "admin") {
    echo '<script> window.location.href = "index.php" </script>';
  }

  if(is_null($_GET["user_id"])) {
    echo '<script> window.location.href = "index.php"; </script>';
  }

  $checkUserstmt = mysqli_prepare($link, "SELECT user_id FROM accounts WHERE user_id = ?");
  mysqli_stmt_bind_param($checkUserstmt, "i", $_GET["user_id"]);
  mysqli_execute($checkUserstmt);
  $checkUserResults = mysqli_stmt_get_result($checkUserstmt);
  $userInDb = mysqli_fetch_array($checkUserResults);

  if (is_array($userInDb)) {
    $deleteUserstmt = mysqli_prepare($link, "DELETE FROM accounts WHERE user_id = ?");
    mysqli_stmt_bind_param($deleteUserstmt, "i", $_GET["user_id"]);
    mysqli_execute($deleteUserstmt);
  } else {
    echo '<script> window.location.href = "index.php"; </script>';
  }
?>

<script>
    history.back();
</script>