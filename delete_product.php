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

  $deleteProductstmt = mysqli_prepare($link, "DELETE FROM products WHERE product_id = ?");
  mysqli_stmt_bind_param($deleteProductstmt, "i", $_GET["product_id"]);
  mysqli_execute($deleteProductstmt);

?>

<script>
    history.back();
</script>