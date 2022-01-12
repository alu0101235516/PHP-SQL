<?php
include("../db.php");
$nombre = '';
$apellidos = '';
$email = '';
$telefono = '';
$direccion = '';
$codigo_postal = '';
$dni = '';

if  (isset($_GET['dni'])) {
  $dni = $_GET['dni'];
  $query = "SELECT * FROM CLIENTES WHERE DNI = '$dni'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $apellidos = $row['apellidos'];
    $email = $row['email'];
    $telefono = $row['telefono'];
    $direccion = $row['direccion'];
    $codigo_postal = $row['codigo_postal'];
    $dni = $row['DNI'];
  }
}

if (isset($_POST['modify'])) {
  $dni = $_GET['dni'];
  $nombre = $_POST['user_name'];
  $apellidos = $_POST['user_lastName'];
  $email = $_POST['user_email'];
  $telefono = $_POST['user_phone'];
  $direccion = $_POST['user_address'];
  $codigo_postal = $_POST['user_postal_code'];

  $query = "UPDATE CLIENTES set nombre = '$nombre', apellidos = '$apellidos', email = '$email', telefono = $telefono, direccion = '$direccion', codigo_postal = $codigo_postal WHERE DNI = '$dni'";
  mysqli_query($conn, $query);
  header('Location: http://alu0101235516-abdd.atwebpages.com/pages/GestorClientes.php');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Cliente</title>
</head>
<body>
<form action="edit.php?dni=<?php echo $_GET['dni'];?>" method="POST">
    <input type="text" name="user_name" placeholder="Nombre" value="<?php echo $nombre; ?>">
    <input type="text" name="user_lastName" placeholder="Apellidos" value="<?php echo $apellidos; ?>">
    <input type="text" name="user_dni" placeholder="DNI" value="<?php echo $dni; ?>">
    <input type="email" name="user_email" placeholder="Email" value="<?php echo $email; ?>">
    <input type="text" name="user_address" placeholder="Dirección" value="<?php echo $direccion; ?>">
    <input type="number" name="user_postal_code" placeholder="Código Postal" value="<?php echo $codigo_postal; ?>">
    <input type="number" name="user_phone" placeholder="Teléfono" value="<?php echo $telefono; ?>">

    <button type="submit" name="modify" value="Modificar">Modificar</button>
  </form>
</body>
</html>
