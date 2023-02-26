<?php
    function itemExists($table, $userId, $productId) {
        session_start();
        include "db_conn.php";
        $checkItemstmt = mysqli_prepare($link, "SELECT DISTINCT product_id FROM $table WHERE user_id = ? AND product_id = ?;");
        mysqli_stmt_bind_param($checkItemstmt, "ii" , $userId, $productId);
        mysqli_stmt_execute($checkItemstmt);
        $checkItemResults = mysqli_stmt_get_result($checkItemstmt);
        if (is_array(mysqli_fetch_array($checkItemResults))) {
            return true;
        } else {
            return false;
        }
    }

?>