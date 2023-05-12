<?php
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
    include "db_conn.php";
    include "check_item.php";
    if (! isset($_SESSION["user_id"]) || ! itemExists("cart", "item_id", $_GET["item_id"])) {
        echo '<script> window.location.href="login-signup.php" </script>';
    }
    $checkAccountstmt = mysqli_prepare($link, "SELECT item_id, user_id  FROM cart WHERE item_id = ? AND user_id = ?");
    mysqli_stmt_bind_param($checkAccountstmt, "ii", $_GET["item_id"], $_SESSION["user_id"]);
    mysqli_execute($checkAccountstmt);
    if (mysqli_num_rows(mysqli_stmt_get_result($checkAccountstmt)) == 0) {
        echo '<script> window.location.href="index.php" </script>';
    }


    $changeQuantitystmt = mysqli_prepare($link, "UPDATE cart SET quantity = ? WHERE user_id = ? AND item_id = ?;");
    mysqli_stmt_bind_param($changeQuantitystmt, "iii", $_GET["quantity"], $_SESSION["user_id"], $_GET["item_id"]);
    mysqli_stmt_execute($changeQuantitystmt);


?>

<script>
    history.back();
</script>