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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="new_profile">
        <input type="submit" name="change_profile" value="Change Profile Picture">
    </form>

    <?php
        if (isset($_POST["change_profile"])) {
            $randomString = md5(time());
            move_uploaded_file($_FILES["new_profile"]["tmp_name"], "images/profile_picture/".$randomString.$_FILES["new_profile"]["name"]);
            $dbImagePath = $randomString.$_FILES["new_profile"]["name"];
            $changeProfilePicturestmt = mysqli_prepare($link, "UPDATE accounts SET image = ? WHERE user_id = ?");
            mysqli_stmt_bind_param($changeProfilePicturestmt, "si", $dbImagePath, $_SESSION["user_id"]);
            mysqli_execute($changeProfilePicturestmt);
            echo '<script> alert("Profile picture changed successfully"); history.back(); </script>';
        } 
       
    ?>
</body>
</html>