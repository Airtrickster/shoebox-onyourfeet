<?php
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
  include "db_conn.php";

  if (! isset($_SESSION["user_id"])) {
    echo '<script> window.location.href = "login-signup.php" </script>';
  }

  if ($_SESSION["user_type"] != "admin") {
    echo '<script> window.location.href = "index.php" </script>';
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title> User Maintenance </title>
    <!--css--> 
    <link rel="stylesheet" href="css/profile.css" /> 
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="lib/fontawesome-free-6.2.1-web/css/all.min.css">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  </head>

  <script src="lib/jquery-3.6.3.js"></script>
  <body>

  <?php include "header.php"; ?>    
    

  <div class="profile-box">
    <div class="container">
      <div class="flexing">

      <?php include "admin_nav.php"; ?>

        <section class="flex address">
            <button onclick='window.location.href = "add_address.php"'>New User</button>
            <?php
              $accountsResults = mysqli_query($link, "SELECT image, user_id, username, CONCAT(first_name, CONCAT(' ', last_name))  AS \"full_name\" FROM accounts;");

              while ($accountRow = mysqli_fetch_array($accountsResults)) {
                echo '
                <div class="flex-add-btn">
                <img src="images/profile_picture/' . $accountRow["image"] . '" width="50" height="50">
                <p> (' . $accountRow["user_id"] . ") (" . $accountRow["username"] . ") " . $accountRow["full_name"] . '</p>
                <button onclick=\'window.location.href = "edit_user.php?user_id=' . $accountRow["user_id"] . '"\'>Edit</button>
                <button onclick="deleteAddress(' . $accountRow["user_id"] . ')" \'>Remove</button>
                </div>';
              }

              if (mysqli_num_rows($accountsResults) == 0) {
                echo '<div class="flex-add-btn">  
                <p> They are no users yet </p>
                </div>';
              }

            ?>
        </section>
      </div>
    </div>
  </div>

  <?php include "footer.php"; ?>   

  <script src="js/admin_script.js"></script>
  <script>
    function deleteAddress(user_id) {
      if (confirm("Are you sure you want to delete this user?")) {
        window.location.href = "delete_user.php?user_id=" + user_id;
      }
    }
  </script>

  </body>
</html>
