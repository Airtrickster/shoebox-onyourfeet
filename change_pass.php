<?php
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
  include "db_conn.php";
  if (! isset($_SESSION["user_id"])) {
    echo '<script> window.location.href = "login-signup.php" </script>';
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Change Password</title>
    <link rel="stylesheet" href="css/change.css" />
  </head>
  <body>
    <div class="container">
      <h1>Change Password</h1>
      <form action="" id="changePasswordForm" method="post" enctype="multipart/form-data" onsubmit='return changePassword()'>
        <label for="current-password">Current Password</label>
        <input type="password" id="current-password" name="current-password" />
        <label for="new-password">New Password</label>
        <input type="password" id="new-password" name="new-password" />
        <label for="confirm-password">Confirm New Password</label>
        <input type="password" id="confirm-password" name="confirm-password" />
        <input type="checkbox" id="show-password" />
        <label for="show-password">Show Password</label>
        <input type="submit" name="change-password" value="Change Password" />
      </form>

      <?php
        if (isset($_POST["change-password"])) {
          $checkpasswordstmt = mysqli_prepare($link, "SELECT password FROM accounts WHERE user_id = ?;");
          mysqli_stmt_bind_param($checkpasswordstmt, "i", $_SESSION["user_id"]);
          mysqli_stmt_execute($checkpasswordstmt);
          $changePassResults = mysqli_stmt_get_result($checkpasswordstmt);
          $currentPassword = mysqli_fetch_array($changePassResults);
          if ($currentPassword["password"] != $_POST["current-password"]) {
            echo '<script> alert("Your current password is incorrect"); window.location.href = "' . $_SERVER["PHP_SELF"] . '"; </script>';
            return false;
          } else {
            $changepassstmt = mysqli_prepare($link, "UPDATE accounts SET password = ? WHERE user_id = ?;");
            mysqli_stmt_bind_param($changepassstmt, "si", $_POST["new-password"], $_SESSION["user_id"]);
            mysqli_stmt_execute($changepassstmt);
            echo '<script> alert("Password updated successfully!"); window.location.href = "profile.php"; </script>';
          }
        }

      ?>
    </div>
    <script src="js/pass.js"></script>
  </body>
</html>
