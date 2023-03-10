<?php
    session_start();
    include "db_conn.php"; 
    if (! isset($_SESSION["user_id"])) { echo '<script> window.location.href="login-signup.php" </script>'; }
    if (! isset($_POST["product_id"])) { echo '<script> window.location.href = "index.php" ; </script>'; }
    
    include "check_item.php";
    if (itemExists("cart", "product_id", $_POST["product_id"])) { echo '<script> window.location.href = "' . $_POST["prev_page"]  . '" ; </script>'; exit ; }
    $addToCartstmt = mysqli_prepare($link, "INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, 1);");
    mysqli_stmt_bind_param($addToCartstmt, "ii", $_SESSION["user_id"], $_POST["product_id"]);
    mysqli_stmt_execute($addToCartstmt);
    echo '<script> window.location.href = "' . $_POST["prev_page"]  . '" ; </script>';
?>