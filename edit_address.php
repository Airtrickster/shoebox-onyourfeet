<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "db_conn.php";
if (!isset($_SESSION["user_id"])) {
    echo '<script> window.location.href = "login-signup.php" </script>';
}

$getAddressstmt = mysqli_prepare($link, "SELECT * FROM addresses WHERE address_id = ? AND user_id = ?;");
mysqli_stmt_bind_param($getAddressstmt, "ii", $_GET["address_id"], $_SESSION["user_id"]);
mysqli_execute($getAddressstmt);
$getAddressResults = mysqli_stmt_get_result($getAddressstmt);

if (mysqli_num_rows($getAddressResults) == 0) {
    echo '<script> window.location.href = "index.php"; </script>';
}

while ($addressRow = mysqli_fetch_array($getAddressResults)) {
    $address = $addressRow["address"];
    $city = $addressRow["city"];
    $state = $addressRow["state"];
    $country = $addressRow["country"];
    $zipCode = $addressRow["zip_code"];
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Address</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="acntstyle.css">
    <link rel="icon" href="images/icon.png">
</head>

<body>

    <div class="maincontainer">
        <div class="account">
            <img src="https://cdn.glitch.global/c8513165-1e64-49ea-8c73-5b1d9812e542/shoebox?v=1697958778893" alt="Shoebox" width="100" height="100">
            <h2>Edit Address</h2>
            <div class="formcon">
                <form action="" id="addAddressForm" method="post" enctype="multipart/form-data" onsubmit='return validateAddress();'>
                    <input type="text" id="address" name="address" placeholder="Enter your address" value="<?php echo $address; ?>" /> <br /> <br />

                    <input type="text" id="city" name="city" placeholder="Enter your city" value="<?php echo $city; ?>" /> <br /> <br />

                    <input type="text" id="state" name="state" placeholder="Enter your state" value="<?php echo $state; ?>" /> <br /> <br />

                    <input type="text" id="country" name="country" placeholder="Enter your country" value="<?php echo $country; ?>" /> <br /> <br />

                    <input type="text" id="zip" name="zip" placeholder="Enter your zip code" value="<?php echo $zipCode; ?>" /> <br /> <br />
                    
                    <input type="submit" value="Save" class="sbutton" name="saveAddress">
                </form>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST["saveAddress"])) {
        $editAddressstmt = mysqli_prepare($link, "UPDATE addresses SET address = ?, city = ?, state = ?, country = ?, zip_code = ? WHERE address_id = ? AND user_id = ?;");
        mysqli_stmt_bind_param($editAddressstmt, "sssssii", $_POST["address"], $_POST["city"], $_POST["state"], $_POST["country"], $_POST["zip"], $_GET["address_id"], $_SESSION["user_id"]);
        mysqli_execute($editAddressstmt);

        echo '<script> alert("Address edited successfully!"); </script>';
    }
    ?>

    <script src="js/address.js"></script>
</body>

</html>
