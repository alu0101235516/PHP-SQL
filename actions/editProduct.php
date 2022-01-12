<?php
include("../db.php");
$nombre = '';
$familia = '';
$ID = '';
$descripcion = '';
$stock = '';
$dimensiones = '';
$peso_pvp = '';
$imagen = '';
$imagenG = '';

if  (isset($_GET['ID'])) {
  $ID = $_GET['ID'];
  $query = "SELECT * FROM PRODUCTOS WHERE ID = '$ID'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $familia = $row['familia'];
    $ID = $row['ID'];
    $descripcion = $row['descripcion'];
    $stock = $row['stock'];
    $dimensiones = $row['dimensiones'];
    $peso_pvp = $row['peso_pvp'];
  }
}

if (isset($_POST['modify'])) {
  $ID = $_GET['ID'];
  $nombre = $_POST['product_name'];
  $familia = $_POST['product_family'];
  $descripcion = $_POST['product_desc'];
  $stock = $_POST['product_stock'];
  $dimensiones = $_POST['product_dim'];
  $peso_pvp = $_POST['product_weight'];
  if (!empty($_FILES['product_img']['tmp_name'])) { 
     $imagen = addslashes(file_get_contents($_FILES['product_img']['tmp_name']));
     $query = "UPDATE PRODUCTOS set nombre = '$nombre', familia = '$familia', descripcion = '$descripcion', stock = $stock, dimensiones = '$dimensiones', peso_pvp = $peso_pvp, imagen = '$imagen' WHERE ID = '$ID'";
   } else {
     $query = "UPDATE PRODUCTOS set nombre = '$nombre', familia = '$familia', descripcion = '$descripcion', stock = $stock, dimensiones = '$dimensiones', peso_pvp = $peso_pvp WHERE ID = '$ID'";
   }
   
  mysqli_query($conn, $query);
  header('Location: http://alu0101235516-abdd.atwebpages.com/pages/GestorProductos.php');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Producto</title>
</head>
<body>
<form action="editProduct.php?ID=<?php echo $_GET['ID'];?>" method="POST" enctype="multipart/form-data">
    <input type="text" name="product_name" placeholder="Nombre" value="<?php echo $nombre; ?>">
    <input type="text" name="product_family" placeholder="Familia" value="<?php echo $familia; ?>">
    <input type="text" name="product_desc" placeholder="Descripcion" value="<?php echo $descripcion; ?>">
    <input type="number" name="product_stock" placeholder="Stock" value="<?php echo $stock; ?>">
    <input type="text" name="product_dim" placeholder="Dimensiones" value="<?php echo $dimensiones; ?>">
    <input type="number" name="product_weight" placeholder="Peso pvp" value="<?php echo $peso_pvp; ?>">
    <input type="file" name="product_img">

    <button type="submit" name="modify" value="Modificar">Modificar</button>
  </form>
</body>
</html>
