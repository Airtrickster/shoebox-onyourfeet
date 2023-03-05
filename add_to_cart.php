<?php
    session_start();
    include "db_conn.php";
    include "check_item.php";
    if (! isset($_SESSION["user_id"])) { echo '<script> window.location.href="login-signup.php" </script>'; }
    
    if (itemExists("cart", "product_id", $_SESSION["user_id"], $_GET["product_id"])) { echo '<script> history.back(); </script>'; exit; }
    $addToCartstmt = mysqli_prepare($link, "INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, 1);");
    mysqli_stmt_bind_param($addToCartstmt, "ii", $_SESSION["user_id"], $_GET["product_id"]);
    mysqli_stmt_execute($addToCartstmt);
?>

<script>
    history.back();
</script>