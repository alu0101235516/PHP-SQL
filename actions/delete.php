<?php
  include("../db.php");

  if(isset($_GET['dni'])) {
    $dni = $_GET['dni'];
    $query = "DELETE FROM CLIENTES WHERE DNI = '$dni'";
    
    $result = mysqli_query($conn, $query);
    if (!$result) die("Delete query failed");
  }
  header("Location: http://alu0101235516-abdd.atwebpages.com/pages/GestorClientes.php");
?>