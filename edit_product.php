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

  $productstmt = mysqli_prepare($link, "SELECT * FROM products WHERE product_id = ?");
  mysqli_stmt_bind_param($productstmt, "i", $_GET["product_id"]);
  mysqli_execute($productstmt);
  $productResult = mysqli_stmt_get_result($productstmt);
  $productDetails = mysqli_fetch_array($productResult);
?>

<!DOCTYPE html>
<html>
  <head>
    <title> Edit Product </title>
    <link rel="stylesheet" href="css/add-prod.css" />
    <script src="js/acnt.js"></script>

    <style>
      .container{
          width:380px;
          height:585px;
          padding: 15px;  
          background: rgb(197, 220, 251);
          border-radius: 10px;
      }

      .mess-img img{
        display:flex;
        margin:5px auto;

      }
    </style>
  </head>
  <body>

    <div class="container">
      <div class="box">
        <h1>Edit Product</h1>
        <form action="" id="editProductForm" method="post" enctype="multipart/form-data">
          <div class="text-form">
            <input type="text" name="name_new" value="<?php echo $productDetails["name"]; ?>">
            <input type="number" name="price_new" step="any" value="<?php echo $productDetails["price"]; ?>">
          </div>
          <div class="drop-down">
            <select name="category_new">
              <?php
                $categoryResults = mysqli_query($link, "SELECT DISTINCT category FROM products;");
                while ($categoryRow = mysqli_fetch_array($categoryResults)) {
                  if ($categoryRow["category"] == $productDetails["category"]) {
                    $selectedCategory = "selected";
                  } else {
                    $selectedCategory = "";
                  }
                  echo '<option value="' . $categoryRow["category"] . '" ' . $selectedCategory . '> ' . $categoryRow["category"] . ' </option>';
                }
              ?>
            </select>
            <select name="gender_new">
              <?php
                $genderResults = mysqli_query($link, "SELECT DISTINCT gender FROM products;");
                while ($genderRow = mysqli_fetch_array($genderResults)) {
                  if ($genderRow["gender"] == $productDetails["gender"]) {
                    $selectedGender = "selected";
                  } else {
                    $selectedGender = "";
                  }
                  echo '<option value="' . $genderRow["gender"] . '" ' . $selectedGender . '> ' . $genderRow["gender"] . ' </option>';
                }
              ?>
            </select>
          </div>
          <div class="mess-img">
            <textarea name="description_new"><?php echo $productDetails["description"]; ?></textarea>
            <label for="image_new">
              <img width="100" height="100" src="images/products/<?php echo $productDetails["image"];?>">
              </label>
            <input name="image_new" type="file" />
          </div>
          <div class="button-add">
            <input type="submit" name="edit_product" value="Save Changes">
          </div>
        </form>
      </div>
    </div>

    <?php
      if (isset($_POST["edit_product"])) {
        if ($_FILES["image_new"]["name"]) {
          $randomString = md5(time());
          move_uploaded_file($_FILES["image_new"]["tmp_name"], "images/products/".$productDetails["category"]."_shoes/".$productDetails["gender"]."/".$randomString.$_FILES["image_new"]["name"]);
          $dbImagePath = $productDetails["category"]."_shoes/".$productDetails["gender"]."/".$randomString.$_FILES["image_new"]["name"];

          $editProductstmt = mysqli_prepare($link, "UPDATE products SET name = ?, price = ?, description = ?, category = ?, gender = ?, image = ? WHERE product_id = ?");
          mysqli_stmt_bind_param($editProductstmt, "sdssssi", $_POST["name_new"], $_POST["price_new"], $_POST["description_new"], $_POST["category_new"], $_POST["gender_new"], $dbImagePath, $productDetails["product_id"]);
          mysqli_execute($editProductstmt);
        } else {
          $editProductstmt = mysqli_prepare($link, "UPDATE products SET name = ?, price = ?, description = ?, category = ?, gender = ? WHERE product_id = ?");
          mysqli_stmt_bind_param($editProductstmt, "sdsssi", $_POST["name_new"], $_POST["price_new"], $_POST["description_new"], $_POST["category_new"], $_POST["gender_new"], $productDetails["product_id"]);
          mysqli_execute($editProductstmt);
        }       
        echo '<script> alert("Product edited successfully"); </script>';
      }
    ?>

  </body>
</html>
