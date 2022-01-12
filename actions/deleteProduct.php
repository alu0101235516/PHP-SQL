<?php
  include("../db.php");

  if(isset($_GET['ID'])) {
    $id = $_GET['ID'];
    $query = "DELETE FROM PRODUCTOS WHERE ID = '$id'";
    
    $result = mysqli_query($conn, $query);
    if (!$result) die("Delete query failed");
  }
  header("Location: http://alu0101235516-abdd.atwebpages.com/pages/GestorProductos.php");
?>