<?php
include ("../db.php");
if (isset($_POST['save_purchase'])) {
 if (isset($_POST['products'])) {
  $dni_cliente = $_POST['DNI'];
  $id_producto = $_POST['products'];
  $cantidad = $_POST['quantities'];
  
  $array = [
     "productos" => [
        "id" => $id_producto,
        "cantidad" => $cantidad,
     ],
  ];
  
  $encoder = json_encode($array);
  $query = "INSERT INTO COMPRAS(ID_COMPRA, DNI_CLIENTE, CESTA) 
            VALUES (null, '$dni_cliente', '$encoder')";
  $result = mysqli_query($conn, $query);
  
  if ($result) {
    header("Location: http://alu0101235516-abdd.atwebpages.com/pages/GestorCompras.php");
  } else {
    echo $query;
    die ("Query Failed");
  }
 }
}
?>