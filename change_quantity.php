<?php
    session_start();
    include "db_conn.php";
    include "check_item.php";
    if (! isset($_SESSION["user_id"]) || ! itemExists("cart", "product_id", $_SESSION["user_id"], $_GET["product_id"])) {
        echo '<script> window.location.href="login-signup.php" </script>';
    }
    $changeQuantitystmt = mysqli_prepare($link, "UPDATE cart SET quantity = ? WHERE user_id = ? AND product_id = ?;");
    mysqli_stmt_bind_param($changeQuantitystmt, "iii", $_GET["quantity"], $_SESSION["user_id"], $_GET["product_id"]);
    mysqli_stmt_execute($changeQuantitystmt);


?>

<script>
    history.back();
</script>