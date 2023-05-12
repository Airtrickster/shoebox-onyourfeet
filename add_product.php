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
    <title> Add Product </title>
    <link rel="stylesheet" href="css/acnt.css" />
    <script src="js/acnt.js"></script>
  </head>
  <body>

    <div class="container">
      <div class="box">
        <h1>Add Product</h1>
        <form action="" id="addProductForm" method="post" enctype="multipart/form-data">
          <input type="text" name="name_new" placeholder="Product Name">
          <input type="number" name="price_new" placeholder="Price">
          <select name="category_new">
            <option value="" selected disabled> Select a category </option>
            <?php
              $categoryResults = mysqli_query($link, "SELECT DISTINCT category FROM products;");
              while ($categoryRow = mysqli_fetch_array($categoryResults)) {
                echo '<option value="' . $categoryRow["category"] . '"> ' . $categoryRow["category"] . ' </option>';
              }
            ?>
          </select>
          <select name="gender_new">
            <option value="" selected disabled> Select a gender </option>
            <?php
              $genderResults = mysqli_query($link, "SELECT DISTINCT gender FROM products;");
              while ($genderRow = mysqli_fetch_array($genderResults)) {
                echo '<option value="' . $genderRow["gender"] . '"> ' . $genderRow["gender"] . ' </option>';
              }
            ?>
          </select>
          <textarea name="description_new"><?php echo $productDetails["description"]; ?></textarea>
          <label for="image_new"> Product Image: </label>
          <input name="image_new" type="file" />
          <div class="button-add">
            <input type="submit" name="add_product" value="Add Product">
          </div>
        </form>
      </div>
    </div>

    <?php
      if (isset($_POST["edit_product"])) {
        $addProductstmt = mysqli_prepare($link, "INSERT INTO products(name, price, description, category, gender) VALUES (name = ?, price = ?, description = ?, category = ?, gender = ?) WHERE product_id = ?");
        mysqli_stmt_bind_param($addProductstmt, "sdsssi", $_POST["name_new"], $_POST["price_new"], $_POST["description_new"], $_POST["category_new"], $_POST["gender_new"], $productDetails["product_id"]);
        mysqli_execute($addProductstmt);
        echo '<script> alert("Product added successfully"); </script>';
      }
    ?>

  </body>
</html>