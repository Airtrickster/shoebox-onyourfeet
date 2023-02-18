<?php
    session_start();
    include "db_conn.php";
    if (! isset($_SESSION["user_id"])) { echo '<script> window.location.href="login-signup.php" </script>'; }
    $addToCartstmt = mysqli_prepare($link, "INSERT INTO cart (user_id, product_id) VALUES (?, ?);");
    mysqli_stmt_bind_param($addToCartstmt, "ii", $_SESSION["user_id"], $_GET["product_id"]);
    mysqli_stmt_execute($addToCartstmt);
?>

<script>
    history.back();
</script>