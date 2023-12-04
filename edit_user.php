<?php
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
  include "db_conn.php";
  if (! isset($_SESSION["user_id"])) {
    echo '<script> window.location.href="index.php" </script>'; 
  }

  if ($_SESSION["user_type"] != "admin") {
    echo '<script> window.location.href = "index.php" </script>';
  }

  if (is_null($_GET["user_id"])) {
    echo '<script> window.location.href = "index.php" </script>';
  }

  $accountInfostmt = mysqli_prepare($link, "SELECT * FROM accounts WHERE user_id = ?");
  mysqli_stmt_bind_param($accountInfostmt, "i", $_GET["user_id"]);
  mysqli_execute($accountInfostmt);
  $accountInfoResults = mysqli_stmt_get_result($accountInfostmt);
  $accountInfo = mysqli_fetch_array($accountInfoResults);

?>

<!DOCTYPE html>
<html>
  <head>
    <title> Edit User </title>
    <link rel="stylesheet" href="css/add-prod.css" />
    <link rel="icon" href="images/icon.png">
    <script src="js/acnt.js"></script>
  </head>
  <body>

    <div class="container">
      <div class="box">
        <h1>Edit User</h1>
        <form action="" id="editUserForm" method="post" enctype="multipart/form-data">
          <div class="text-form">
            <input type="text" name="first_name_new" placeholder="First Name" value="<?php echo $accountInfo["first_name"] ?>">
            <input type="text" name="last_name_new" placeholder="Last Name" value="<?php echo $accountInfo["last_name"] ?>">
            <input type="email" name="email_new" placeholder="Email" value="<?php echo $accountInfo["email"] ?>">
            <input type="text" name="phone_new" placeholder="Mobile No." value="<?php echo $accountInfo["phone_number"] ?>">
            <input type="text" name="username_new" placeholder="Username" value="<?php echo $accountInfo["username"] ?>">
            <input type="password" name="password_new" placeholder="Password" value="<?php echo $accountInfo["password"] ?>">

          </div>
          <div class="drop-down">
            <p> Date of birth: </p>
            <input type="date" name="date_of_birth_new" value="<?php echo $accountInfo["date_of_birth"] ?>">
            <p> User Type: </p>
            <select name="type_new">
              <option value="" selected disabled> Select a user type </option>
              <?php
                $typeResults = mysqli_query($link, "SELECT DISTINCT type FROM accounts;");
                while ($typeRow = mysqli_fetch_array($typeResults)) {
                  if ($accountInfo["type"] == $typeRow["type"]) {
                    $selectedType = "selected";
                  } else {
                    $selectedType = "";
                  }
                  echo '<option value="' . $typeRow["type"] . '" ' . $selectedType . '> ' . $typeRow["type"] . ' </option>';
                }
              ?>
            </select>
          </div>
          <div class="mess-img">
            <label for="image_new"> User Image: </label>
            <input type="file"  name="image_new">
            <img width="100" height="100" src="images/profile_picture/<?php echo $accountInfo["image"];?>">
          </div>
          <div class="button-add">
            <input type="submit" name="edit_user" value="Edit User">
          </div>
        </form>
      </div>
    </div>

    <?php
      if (isset($_POST["edit_user"])) {
        if ($_FILES["image_new"]["name"]) {
          $randomString = md5(time());
          move_uploaded_file($_FILES["image_new"]["tmp_name"], "images/profile_picture/".$randomString.$_FILES["image_new"]["name"]);
          $dbImagePath = $randomString.$_FILES["image_new"]["name"];

          $userstmt = mysqli_prepare($link, "UPDATE accounts SET type = ?, first_name = ?, last_name = ?, email = ?, date_of_birth = ?, phone_number = ?, username = ?, password = ?, image = ?");
          mysqli_stmt_bind_param($userstmt, "sssssssss",  $_POST["type_new"], $_POST["first_name_new"], $_POST["last_name_new"], $_POST["email_new"], $_POST["date_of_birth_new"], $_POST["phone_new"], $_POST["username_new"], $_POST["password_new"], $dbImagePath);
          mysqli_execute($userstmt);
          
        } else {
          $userstmt = mysqli_prepare($link, "UPDATE accounts SET type = ?, first_name = ?, last_name = ?, email = ?, date_of_birth = ?, phone_number = ?, username = ?, password = ?");
          mysqli_stmt_bind_param($userstmt, "ssssssss", $_POST["type_new"], $_POST["first_name_new"], $_POST["last_name_new"], $_POST["email_new"], $_POST["date_of_birth_new"], $_POST["phone_new"], $_POST["username_new"], $_POST["password_new"]);
          mysqli_execute($userstmt);
        }
        echo '<script> alert("User added successfully"); </script>';
      }
    ?>

  </body>
</html>