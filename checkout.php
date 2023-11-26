<?php
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
    include "db_conn.php";
    if (! isset($_POST["address_id"]) || ! isset($_POST["payment-method"])) {
        echo '<script> window.location.href=\'index.php\' </script>';
    }

    $checkoutstmt = mysqli_prepare($link, "INSERT INTO transactions(user_id, address, product_id, quantity, amount, payment_method) SELECT user_id, (SELECT CONCAT(address, ', ', city, ', ', state, ', ', country, ', ', zip_code) FROM addresses WHERE address_id = ?), product_id, quantity, (SELECT price  FROM products WHERE product_id = cart.product_id), ? FROM cart WHERE user_id = ?;");
    mysqli_stmt_bind_param($checkoutstmt, "isi", $_POST["address_id"], $_POST["payment-method"], $_SESSION["user_id"]);
    mysqli_execute($checkoutstmt);

    $clearCartstmt = mysqli_prepare($link, "DELETE FROM cart WHERE user_id = ?;");
    mysqli_stmt_bind_param($clearCartstmt, "i", $_SESSION["user_id"]);
    mysqli_stmt_execute($clearCartstmt);
?>

<script>
    alert("Checked out successfully");
    window.location.href = "index.php";
</script>