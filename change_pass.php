<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "db_conn.php";
if (!isset($_SESSION["user_id"])) {
    echo '<script> window.location.href = "login-signup.php" </script>';
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Change Password</title>
    <link rel="stylesheet" href="acntstyle.css">
    <link rel="icon" href="images/icon.png">
</head>

<body>
    <div class="maincontainer">
        <div class="account">
            <img src="https://cdn.glitch.global/c8513165-1e64-49ea-8c73-5b1d9812e542/shoebox?v=1697958778893" alt="Shoebox" width="100" height="100">
            <h2>Change Password</h2>
            <div class="formcon">
                <form action="" id="changePasswordForm" method="post" enctype="multipart/form-data" onsubmit='return changePassword()'>

                    <input type="password" placeholder="Currrent Password" id="current-password" name="current-password" /> <br /> <br />

                    <input type="password" placeholder="New Password" id="new-password" name="new-password" /> <br /> <br />

                    <input type="password" placeholder="Confirm New Password" id="confirm-password" name="confirm-password" /> <br /> <br />

                    <input type="checkbox" class="cb" id="show-password" />   <br /> <br />
                    <label for="show-password">Show Password</label> <br /> <br />

                    <input type="submit" class="sbutton" name="change-password" value="Change Password" />
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
        </div>
    </div>
    <script src="js/pass.js"></script>
</body>

</html>
