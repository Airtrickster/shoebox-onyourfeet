<?php
    session_start();
    include "db_conn.php";
    $removestmt = mysqli_prepare($link, "DELETE FROM cart WHERE user_id = ? AND item_id = ?;");
    mysqli_stmt_bind_param($removestmt, "ii", $_SESSION["user_id"], $_GET["item_id"]);
    mysqli_stmt_execute($removestmt);
?>

<script>
    history.back();
</script>