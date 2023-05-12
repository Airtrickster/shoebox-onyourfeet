<?php
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
    include "db_conn.php";
    include "check_item.php";
    if (! isset($_SESSION["user_id"])) { echo '<script> window.location.href="login-signup.php" </script>'; }
    if (isset($_GET["quantity"]) && is_numeric($_GET["quantity"]) && $_GET["quantity"] >= 1) {
        $quantity = $_GET["quantity"];
    } else {
        $quantity = 1;
    }

    if (itemExists("cart", "product_id" , $_GET["product_id"])) { echo '<script> history.back(); </script>'; exit; }
    $addToCartstmt = mysqli_prepare($link, "INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?);");
    mysqli_stmt_bind_param($addToCartstmt, "iii", $_SESSION["user_id"], $_GET["product_id"], $quantity);
    mysqli_stmt_execute($addToCartstmt);
?>

<script>
    history.back();
</script>