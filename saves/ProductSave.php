<?php
include ("../db.php");
if (isset($_POST['save_product'])) {
  $product_name = $_POST['product_name'];
  $product_family = $_POST['product_family'];
  $product_desc = $_POST['product_desc'];
  $product_stock = $_POST['product_stock'];
  $product_dim = $_POST['product_dim'];
  $product_weight = $_POST['product_weight'];
  $product_img = addslashes(file_get_contents($_FILES['product_img']['tmp_name']));

  $query = "INSERT INTO PRODUCTOS(nombre, familia, descripcion, stock, dimensiones, peso_pvp, imagen) 
            VALUES ('$product_name', '$product_family', '$product_desc', $product_stock, '$product_dim', $product_weight, '$product_img')";
  $result = mysqli_query($conn, $query);

  if ($result) {
    header("Location: http://alu0101235516-abdd.atwebpages.com/pages/GestorProductos.php");
  } else {
    die ("Query Failed");
  }
}
?>