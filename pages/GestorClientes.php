<?php include("../db.php")?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestor Clientes - Clientes</title>
</head>
<body>
  <div class="main">
    <h2>AÑADIR CLIENTE</h2>
    <form action="../saves/ClientSave.php" method="POST">
      <input type="text" name="user_name" placeholder="Nombre">
      <input type="text" name="user_lastName" placeholder="Apellidos">
      <input type="text" name="user_dni" placeholder="DNI"><br>
      <input type="email" name="user_email" placeholder="Email">
      <input type="text" name="user_address" placeholder="Dirección">
      <input type="number" name="user_postal_code" placeholder="Código Postal">
      <input type="number" name="user_phone" placeholder="Teléfono"><br>

      <button type="submit" name="save_client" value="Guardar">Añadir</button>
    </form>
  </div>
  
  <h2 class="h2">LISTADO DE CLIENTES</h2>
  <table>
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Email</th>
        <th>Telefono</th>
        <th>Direccion</th>
        <th>Codigo Postal</th>
        <th>DNI</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $query = "SELECT * FROM CLIENTES";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($result)) { ?>
          <tr>
            <td><?php echo $row['nombre']?></td>
            <td><?php echo $row['apellidos']?></td>
            <td><?php echo $row['email']?></td>
            <td><?php echo $row['telefono']?></td>
            <td><?php echo $row['direccion']?></td>
            <td><?php echo $row['codigo_postal']?></td>
            <td><?php echo $row['DNI']?></td>
            <td>
              <a href="../actions/edit.php?dni=<?php echo $row['DNI']?>">
                Editar
              </a>
              <a href="../actions/delete.php?dni=<?php echo $row['DNI']?>">
                Borrar
              </a>
            </td>
          </tr>
      <?php } ?>
    </tbody>
  </table>
  <link rel="stylesheet" type="text/css" href="../css/client_styles.css" />
</body>
</html>