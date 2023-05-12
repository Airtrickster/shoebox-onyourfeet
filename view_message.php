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

  $messagestmt = mysqli_prepare($link, "SELECT * FROM inbox WHERE message_id = ?");
  mysqli_stmt_bind_param($messagestmt, "i", $_GET["message_id"]);
  mysqli_execute($messagestmt);
  $messageResult = mysqli_stmt_get_result($messagestmt);
  $message = mysqli_fetch_array($messageResult);

  $readstmt = mysqli_prepare($link, "UPDATE inbox SET is_read = true WHERE message_id = ?");
  mysqli_stmt_bind_param($readstmt, "i", $_GET["message_id"]);
  mysqli_execute($readstmt);
?>

<!DOCTYPE html>
<html>
<head>
  <title> Message </title>
  <style>
    /* CSS styles for the message viewer */
    body {
      font-family: Arial, sans-serif;
    }

    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
    }

    .message {
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 10px;
      margin-bottom: 20px;
    }

    .message .header {
      font-weight: bold;
      margin-bottom: 10px;
    }

    .message .content {
      white-space: pre-line;
    }
  </style>
</head>
<body>
  <div class="container">

    <div class="message">
      <div class="header" id="messageHeader">
        <p><b> From: </b> <?php echo $message["name"]; ?> </p>
      </div>
      <div class="content" id="messageContent">
        <p> <?php echo $message["message"]; ?>
        <br>
        <b> Date Received: </b> <?php echo $message["date_received"] ?>  
        <?php
            if (! empty($message["email"])) {
                echo '<b> Email: </b>' . $message["email"];
            }
            echo '<br>';
            if (! empty($message["phone_number"])) {
                echo '<b> Contact Number: </b>' . $message["phone_number"];
            }
        
        ?>
        </p>
        
      </div>
    </div>

  </div>
</body>
</html>