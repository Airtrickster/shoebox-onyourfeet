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
    <link rel="stylesheet" href="css/acnt.css" />
    <script src="js/acnt.js"></script>
  </head>
  <body>

    <div class="container">
      <div class="box">
        <h1>Edit Product</h1>
        <form action="" id="editProductForm" method="post" enctype="multipart/form-data">
          <input type="text" name="name_new" value="<?php echo $productDetails["name"]; ?>">
          <input type="number" name="price_new" value="<?php echo $productDetails["price"]; ?>">
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
          <textarea name="description_new"><?php echo $productDetails["description"]; ?></textarea>
          <label for="image_new">
            <img width="100" height="100" src="images/products/<?php echo $productDetails["image"];?>">
            </label>
          <input name="image_new" type="file" />
          <div class="button-add">
            <input type="submit" name="edit_product" value="Save Changes">
          </div>
        </form>
      </div>
    </div>

    <?php
      if (isset($_POST["edit_product"])) {
        $editProductstmt = mysqli_prepare($link, "UPDATE products SET name = ?, price = ?, description = ?, category = ?, gender = ? WHERE product_id = ?");
        mysqli_stmt_bind_param($editProductstmt, "sdsssi", $_POST["name_new"], $_POST["price_new"], $_POST["description_new"], $_POST["category_new"], $_POST["gender_new"], $productDetails["product_id"]);
        mysqli_execute($editProductstmt);
        echo '<script> alert("Product edited successfully"); </script>';
      }
    ?>

  </body>
</html>