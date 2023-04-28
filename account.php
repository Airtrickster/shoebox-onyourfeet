<?php
  session_start();
  include "db_conn.php";
  if (! isset($_SESSION["user_id"])) {
    echo '<script> window.location.href="index.php" </script>'; 
  }

  $refreshDetailsstmt = mysqli_prepare($link, "SELECT * FROM accounts WHERE user_id = ?");
  mysqli_stmt_bind_param($refreshDetailsstmt, "i", $_SESSION["user_id"]);
  mysqli_execute($refreshDetailsstmt);
  $detailResults = mysqli_stmt_get_result($refreshDetailsstmt);
  $accountDetails = mysqli_fetch_array($detailResults);

  $_SESSION["username"] = $accountDetails["username"];
  $_SESSION["password"] = $accountDetails["password"];
  $_SESSION["full_name"] = $accountDetails["first_name"] . " " . $credentials["last_name"];
  $_SESSION["date_of_birth"] = $accountDetails["date_of_birth"];
  $_SESSION["phone_number"] = $accountDetails["phone_number"];
  $_SESSION["email"] = $accountDetails["email"];
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Account & Security</title>
    <link rel="stylesheet" href="css/acnt.css" />
    <script src="js/acnt.js"></script>
  </head>
  <body>

    <div class="container">
      <div class="box">
        <h1>Account Details</h1>
        <form action="" id="accountForm" method="post" enctype="multipart/form-data" onsubmit='return changeDetails()'>
          <input type="text" name="username_new" placeholder="username" value="<?php echo $_SESSION["username"]; ?>">
          <input type="text" name="phone_new" placeholder="contact number" value="<?php echo $_SESSION["phone_number"] ?>">
          <input type="email" name="email_new" placeholder="email" value="<?php echo $_SESSION["email"]; ?>">
          <input type="date" name="bday_new" placeholder="birthday" value="<?php echo $_SESSION["date_of_birth"] ?>">
          <div class="button-add">
            <input type="submit" name="change_details" value="Save Changes">
          </div>
        </form>
      </div>
    </div>

    <?php
      if (isset($_POST["change_details"])) {
        $checkUsernamestmt = mysqli_prepare($link, "SELECT DISTINCT username FROM accounts WHERE username = ?;");
        mysqli_stmt_bind_param($checkUsernamestmt, "s", $_POST["usernameSignUp"]);
        mysqli_execute($checkUsernamestmt);
        $usernameResult = mysqli_stmt_get_result($checkUsernamestmt);

        $checkEmailstmt = mysqli_prepare($link, "SELECT DISTINCT email FROM accounts WHERE email = ?;");
        mysqli_stmt_bind_param($checkEmailstmt, "s", $_POST["emailSignUp"]);
        mysqli_execute($checkEmailstmt);
        $emailResult = mysqli_stmt_get_result($checkEmailstmt);

        if (mysqli_num_rows($usernameResult) > 0) {
          echo '<script> alert("Username already exists"); window.location.href = "' . $_SERVER["PHP_SELF"] . '"; </script>';
        } else if (mysqli_num_rows($emailResult) > 0) {
          echo '<script> alert("Email already exists"); window.location.href = "' . $_SERVER["PHP_SELF"] . '"; </script>';
        } else {
          $updateDetailsstmt = mysqli_prepare($link, "UPDATE accounts SET username = ?, phone_number = ?, email = ?, date_of_birth = ? WHERE user_id = ?;");
          mysqli_stmt_bind_param($updateDetailsstmt, "ssssi", $_POST["username_new"], $_POST["phone_new"], $_POST["email_new"], $_POST["bday_new"], $_SESSION["user_id"]);
          mysqli_execute($updateDetailsstmt);
        }
      }
    ?>

  </body>
</html>
