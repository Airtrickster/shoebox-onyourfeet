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

?>

<!DOCTYPE html>
<html>
  <head>
    <title> Add User </title>
    <link rel="stylesheet" href="css/add-prod.css" />
    <link rel="icon" href="images/icon.png">
    <script src="js/acnt.js"></script>
  </head>
  <body>

    <div class="container">
      <div class="box">
        <h1>Add User</h1>
        <form action="" id="addUserForm" method="post" enctype="multipart/form-data">
          <div class="text-form">
            <input type="text" name="first_name_new" placeholder="First Name">
            <input type="text" name="last_name_new" placeholder="Last Name">
            <input type="email" name="email_new" placeholder="Email">
            <input type="text" name="phone_new" placeholder="Mobile No.">
            <input type="text" name="username_new" placeholder="Username">
            <input type="password" name="password_new" placeholder="Password">

          </div>
          <div class="drop-down">
            <p> Date of birth: </p>
            <input type="date" name="date_of_birth_new">
            <select name="type_new">
              <option value="" selected disabled> Select a user type </option>
              <?php
                $typeResults = mysqli_query($link, "SELECT DISTINCT type FROM accounts;");
                while ($typeRow = mysqli_fetch_array($typeResults)) {
                  echo '<option value="' . $typeRow["type"] . '"> ' . $typeRow["type"] . ' </option>';
                }
              ?>
            </select>
          </div>
          <div class="mess-img">
            <label for="image_new"> User Image: </label>
            <input type="file"  name="image_new">
          </div>
          <div class="button-add">
            <input type="submit" name="add_user" value="Add User">
          </div>
        </form>
      </div>
    </div>

    <?php
      if (isset($_POST["add_user"])) {
        if ($_FILES["image_new"]["name"]) {
          $randomString = md5(time());
          move_uploaded_file($_FILES["image_new"]["tmp_name"], "images/profile_picture/".$randomString.$_FILES["image_new"]["name"]);
          $dbImagePath = $randomString.$_FILES["image_new"]["name"];

          $userstmt = mysqli_prepare($link, "INSERT INTO accounts(type, first_name, last_name, email, date_of_birth, phone_number, username, password, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
          mysqli_stmt_bind_param($userstmt, "sssssssss",  $_POST["type_new"], $_POST["first_name_new"], $_POST["last_name_new"], $_POST["email_new"], $_POST["date_of_birth_new"], $_POST["phone_new"], $_POST["username_new"], $_POST["password_new"], $dbImagePath);
          mysqli_execute($userstmt);
          
        } else {
          $userstmt = mysqli_prepare($link, "INSERT INTO accounts(type, first_name, last_name, email, date_of_birth, phone_number, username, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
          mysqli_stmt_bind_param($userstmt, "ssssssss", $_POST["type_new"], $_POST["first_name_new"], $_POST["last_name_new"], $_POST["email_new"], $_POST["date_of_birth_new"], $_POST["phone_new"], $_POST["username_new"], $_POST["password_new"]);
          mysqli_execute($userstmt);
        }
        echo '<script> alert("User added successfully"); </script>';
      }
    ?>

  </body>
</html>