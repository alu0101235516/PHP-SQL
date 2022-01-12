<?php
  include("../db.php");

  if(isset($_GET['ID_COMPRA'])) {
    $id = $_GET['ID_COMPRA'];
    $query = "DELETE FROM COMPRAS WHERE ID_COMPRA = '$id'";
    
    $result = mysqli_query($conn, $query);
    if (!$result) die("Delete query failed");
  }
  header("Location: http://alu0101235516-abdd.atwebpages.com/pages/GestorCompras.php");
?>