<?php include("../db.php")?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestor Clientes - Compras</title>
</head>
<body>
  <div class="main">
    <h2>AÑADIR COMPRA</h2>
    <form action="../saves/PurchaseSave.php" method="POST" enctype="multipart/form-data">
      <input type="text" name="DNI" placeholder="DNI CLIENTE"><br>
      <div class="main2">
        <label for="name">PRODUCTOS</label><br>
        <label>---------------------</label><br>
        <?php
              $query = "SELECT * FROM PRODUCTOS";
              $result = mysqli_query($conn, $query);
              $count = 0;

              while($row = mysqli_fetch_array($result)) { ?>
              <div id="producto-<?php echo $count ?>" class="inline_block">
                <label class="label-product-purchase"><input id="check-<?php echo $count ?>"class="checkbox-purchase" type="checkbox" id=<?php echo $row['nombre'] ?> name="products[]" value="<?php echo $row['ID'] ?>" value="yes"> <?php echo $row['nombre'] ?></label>
              </div><br>

              <?php
             $count = $count + 1;
           } ?>
      </div>
      <button type="submit" name="save_purchase">Registrar compra</button>
    </form>
  </div>
  
  <h2 class="h2">Listado de las Compras</h2>
  <table>
    <thead>
      <tr>
        <th>ID Compra</th>
        <th>DNI Cliente</th>
        <th>Cesta</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $query = "SELECT * FROM COMPRAS";
        $result = mysqli_query($conn, $query);
        

        while ($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td><?php echo $row['ID_COMPRA']?></td>
            <td><?php echo $row['DNI_CLIENTE']?></td>
            <td>
               <?php 
                $json = json_decode($row['CESTA'], true);
                $json_prod = $json['productos'];
                $i = 0;
            
                foreach ($json_prod['id'] as $product) {
                  $quantity = $json_prod['cantidad'];
                  $nombre_prod = 'SELECT * FROM PRODUCTOS WHERE ID =' . $product;
                  $resultado = mysqli_query($conn, $nombre_prod);
                  echo "[" . $quantity[$i] . "x " . mysqli_fetch_assoc($resultado)['nombre'] . "] ";
                  ++$i;
                }
               ?>
            </td>
            <td>
              <a href="../actions/deletePurchase.php?ID_COMPRA=<?php echo $row['ID_COMPRA']?>">
                Borrar
              </a>
            </td>
          </tr>
      <?php } ?>
    </tbody>
  </table>
  <script type="text/javascript" src="../js/script.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/purchase_styles.css" />
</body>
</html>