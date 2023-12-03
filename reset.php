<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Reset Password</title> 
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="icon" href="images/icon.png">
  </head>
  <body>
    <form>
      <h2>Reset Password</h2>
      <div>
        <label for="password">New Password:</label>
        <input type="password" id="password" name="password" required />
      </div>
      <div>
        <label for="confirm-password">Confirm Password:</label>
        <input
          type="password"
          id="confirm-password"
          name="confirm-password"
          required
        />
      </div>
      <div>
        <button type="submit" onclick="resetPassword()">Reset Password</button>
      </div>
    </form>
    <script src="reset.js"></script>
  </body>
</html>
