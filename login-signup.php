<?php
  session_start();
  include "db_conn.php";
  if (isset($_SESSION["user_id"])) {
    echo '<script> window.location.href="index.php" </script>';
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="css/login.css" />
    <link rel="icon" href="images/icon.png">
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="" id="loginForm" class="sign-in-form" method="post" enctype="multipart/form-data">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="usernameLogin" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="passwordLogin" placeholder="Password" />
            </div>
            <input type="submit" name="login" class="btn solid" value="log in" />
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
      
          <form action="#" id="signupForm" class="sign-up-form" method="post" enctype="multipart/form-data"
          onsubmit='return signUpValidation()'>
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user "></i>
              <input type="text" name="usernameLogin" placeholder="Fullname" />
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="usernameSignUp" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="emailSignUp" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-calendar"></i>
              <input type="date" name="emailSignUp" placeholder="Birthday" />
            </div>
            <div class="input-field">
              <i class="fas fa-phone  "></i>
              <input type="number" name="usernameLogin" placeholder="Mobile No." />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="passwordSignUp" placeholder="Password" />
            </div>
            <input type="submit" class="btn" name="signup" value="sign up"/>
            <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New Here?</h3>
            <p>
              Hi there! If you're new here, you might want to check out our
              registration page. It has all the information you need to join us
              and get started. Thanks for visiting!
            </p>
            <button class="btn transparent" id="sign-up-btn">Sign up</button>
          </div>
          <img
            src="images/converse-clipart-sneaker-nike-7.png"
            class="image"
            alt=""
          />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Hi! We're excited to offer you a way to stay up-to-date with our
              latest arrivals and sales. Just enter your email address below and
              we'll send you a weekly update direct to your inbox.
            </p>
            <button class="btn transparent" id="sign-in-btn">Sign in</button>
          </div>
          <img src="images/sports.png" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="js/login.js"></script>
    <?php

      if (isset($_POST["signup"])) {
        $signupsmt = mysqli_prepare($link, "INSERT INTO accounts (username, email, password) VALUES (?, ?, ?);");
        mysqli_stmt_bind_param($signupsmt, "sss", $_POST["usernameSignUp"], $_POST["emailSignUp"], $_POST["passwordSignUp"]);
        mysqli_stmt_execute($signupsmt);
      }

      if (isset($_POST["login"])) {
        $loginstmt = mysqli_prepare($link, "SELECT user_id, username, password FROM accounts WHERE username = ? AND password = ?");
        mysqli_stmt_bind_param($loginstmt, "ss", $_POST["usernameLogin"], $_POST["passwordLogin"]);
        mysqli_stmt_execute($loginstmt);
        $loginResults = mysqli_stmt_get_result($loginstmt);
        $credentials = mysqli_fetch_array($loginResults);

          if (is_array($credentials)) {
            $_SESSION["user_id"] = $credentials["user_id"];
            $_SESSION["username"] = $credentials["username"];
            $_SESSION["password"] = $credentials["password"];
            echo '<script> window.location.href="index.php" </script>';
          } else {
            echo '<script> alert("Wrong Credentials please try again"); </script>';

          }
      }
    ?>
    
  </body>
</html>
