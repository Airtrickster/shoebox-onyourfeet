<?php
    session_start();
    include "db_conn.php";
    $clearCartstmt = mysqli_prepare($link, "DELETE FROM cart WHERE user_id = ?;");
    mysqli_stmt_bind_param($clearCartstmt, "i", $_SESSION["user_id"]);
    mysqli_stmt_execute($clearCartstmt);
?>

<script>
    alert("Checked out successfully");
    history.back();
</script>