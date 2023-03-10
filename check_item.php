<?php
    function itemExists($table, $column, $productId) {
        session_start();
        include "db_conn.php";
        $checkItemstmt = mysqli_prepare($link, "SELECT DISTINCT $column FROM $table WHERE user_id = ? AND product_id = ?;");
        mysqli_stmt_bind_param($checkItemstmt, "ii" , $_SESSION["user_id"], $productId);
        mysqli_stmt_execute($checkItemstmt);
        $checkItemResults = mysqli_stmt_get_result($checkItemstmt);
        if (is_array(mysqli_fetch_array($checkItemResults))) {
            return true;
        } else {
            return false;
        }
    }

?>