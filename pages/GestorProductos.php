<?php include("../db.php")?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestor Clientes - Productos</title>
</head>
<body>
  <div class="main">
    <h2>AÑADIR PRODUCTO</h2>
    <form action="../saves/ProductSave.php" method="POST" enctype="multipart/form-data">
      <input type="text" name="product_name" placeholder="Nombre">
      <input type="text" name="product_family" placeholder="Familia">
      <input type="text" name="product_desc" placeholder="Descripción">
      <input type="number" name="product_stock" placeholder="Stock">
      <input type="text" name="product_dim" placeholder="Dimensiones">
      <input type="number" name="product_weight" placeholder="Peso pvp">
      <input type="file" name="product_img">

      <button type="submit" name="save_product" value="Guardar">Guardar</button>
    </form>
  </div>
  
  <h2 class="h2">LISTADO DE PRODUCTOS</h2>
  <table>
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Familia</th>
        <th>ID</th>
        <th>Descripción</th>
        <th>Stock</th>
        <th>Dimensiones</th>
        <th>Peso pvp</th>
        <th>Imagen</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $query = "SELECT * FROM PRODUCTOS";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($result)) { ?>
          <tr>
            <td><?php echo $row['nombre']?></td>
            <td><?php echo $row['familia']?></td>
            <td><?php echo $row['ID']?></td>
            <td><?php echo $row['descripcion']?></td>
            <td><?php echo $row['stock']?></td>
            <td><?php echo $row['dimensiones']?></td>
            <td><?php echo $row['peso_pvp']?></td>
            <td><?php echo '<img src = "data:image/png;base64,' . base64_encode($row['imagen']) . '" width = "50px" height = "50px"/>' ?></td>
            <td>
              <a href="../actions/editProduct.php?ID=<?php echo $row['ID']?>">
                Editar
              </a>
              <a href="../actions/deleteProduct.php?ID=<?php echo $row['ID']?>">
                Borrar
              </a>
            </td>
          </tr>
      <?php } ?>
    </tbody>
  </table>
  <link rel="stylesheet" type="text/css" href="../css/product_style.css" />
</body>
</html>