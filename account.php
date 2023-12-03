<?php
  if (session_status() === PHP_SESSION_NONE) {
      session_start();
  }
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
  $_SESSION["first_name"] = $accountDetails["first_name"];
  $_SESSION["last_name"] = $accountDetails["last_name"];
  $_SESSION["date_of_birth"] = $accountDetails["date_of_birth"];
  $_SESSION["phone_number"] = $accountDetails["phone_number"];
  $_SESSION["email"] = $accountDetails["email"];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Account & Security</title>
    <link rel="stylesheet" href="acntstyle.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;1,500&display=swap" rel="stylesheet">
<link rel="icon" href="images/icon.png">
</head>
  
<body>

<div class="maincontainer">
<div class="account">
		<img src="https://cdn.glitch.global/c8513165-1e64-49ea-8c73-5b1d9812e542/shoebox?v=1697958778893" alt="Shoebox" width="100" height="100" >
        <h2>Edit Account Details</h2>
	<div class="formcon">
	
	<form action="" id="accountForm" method="post" enctype="multipart/form-data" onsubmit='return changeDetails()'>
		<input type="text" id="username" name="username_new" class="tb" placeholder="Username" value="<?php echo $_SESSION["username"]; ?>">
		<br/> <br/>
		<input type="text" id="firstname" name="first_name_new" class="tb" placeholder="First Name" value="<?php echo $_SESSION["first_name"]; ?>">
		<br/> <br/>
		<input type="text" id="lastname" name="last_name_new" class="tb" placeholder="Last Name" value="<?php echo $_SESSION["last_name"]; ?>">
		<br/> <br/>
		<input type="text" id="contactNumber" name="phone_new" class="tb" placeholder="Contact Number" value="<?php echo $_SESSION["phone_number"] ?>">
		<br/> <br/>
		<input type="text" id="email" name="email_new" class="tb" placeholder="Email Address" value="<?php echo $_SESSION["email"]; ?>">
		<br/> <br/>
		<input type="date" id="birthday" name="bday_new" class="tb" placeholder="Birthday" value="<?php echo $_SESSION["date_of_birth"] ?>">
		<br/>
		<br/>
		<input type="submit" name="change_details" class="sbutton" value="Save Changes" />
	</form>
	</div>
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
          $updateDetailsstmt = mysqli_prepare($link, "UPDATE accounts SET username = ?, first_name = ?, last_name = ?, phone_number = ?, email = ?, date_of_birth = ? WHERE user_id = ?;");
          mysqli_stmt_bind_param($updateDetailsstmt, "ssssssi", $_POST["username_new"], $_POST["first_name_new"], $_POST["last_name_new"], $_POST["phone_new"], $_POST["email_new"], $_POST["bday_new"], $_SESSION["user_id"]);
          mysqli_execute($updateDetailsstmt);

          echo '<script> alert("Details updated successfully!"); window.location.href = "' . $_SERVER["PHP_SELF"] . '"; </script>';
        }
      }
    ?>
	
</body>
</html>