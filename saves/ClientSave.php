<?php
include ("../db.php");
if (isset($_POST['save_client'])) {
  $user_name = $_POST['user_name'];
  $user_lastName = $_POST['user_lastName'];
  $user_email = $_POST['user_email'];
  $user_phone = $_POST['user_phone'];
  $user_address = $_POST['user_address'];
  $user_postal_code = $_POST['user_postal_code'];
  $user_dni = $_POST['user_dni'];

  $query = "INSERT INTO CLIENTES(nombre, apellidos, email, telefono, direccion, codigo_postal, DNI) 
            VALUES ('$user_name', '$user_lastName', '$user_email', $user_phone, '$user_address', $user_postal_code, '$user_dni')";
  $result = mysqli_query($conn, $query);

  if ($result) {
    header("Location: http://alu0101235516-abdd.atwebpages.com/pages/GestorClientes.php");
  } else {
    echo $query;
    die ("Query Failed");
  }
}
?>