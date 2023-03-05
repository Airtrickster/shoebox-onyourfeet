<?php
    session_start();
    include "db_conn.php";
    include "check_item.php";
    if (! isset($_SESSION["user_id"])) { echo '<script> window.location.href="login-signup.php" </script>'; }

    if (itemExists("favorites", "product_id" , $_SESSION["user_id"], $_GET["product_id"])) {
        $removeFavsstmt = mysqli_prepare($link, "DELETE FROM favorites WHERE user_id = ? AND product_id = ?;");
        mysqli_stmt_bind_param($removeFavsstmt, "ii", $_SESSION["user_id"], $_GET["product_id"]);
        mysqli_stmt_execute($removeFavsstmt);
        echo '<script> history.back(); </script>';
        exit;
    }

    $addToFavstmt = mysqli_prepare($link, "INSERT INTO favorites (user_id, product_id) VALUES (?, ?);");
    mysqli_stmt_bind_param($addToFavstmt, "ii", $_SESSION["user_id"], $_GET["product_id"]);
    mysqli_stmt_execute($addToFavstmt);
?>

<script>
    history.back();
</script>