<?php include("db.php")?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestor Clientes - Inicio</title>
</head>
<body>
  <main>
    <header>
      <h1>GESTIÓN DE CLIENTES</h1>
    </header>
    <div class="buttons">
      <button onclick="window.location = './pages/GestorClientes.php'">GESTIONAR CLIENTES</button>
      <button onclick="window.location = './pages/GestorProductos.php'">GESTIONAR PRODUCTOS</button>
      <button onclick="window.location = './pages/GestorCompras.php'">GESTIONAR COMPRAS</button>
    </div>
  </main>
  
  <link rel="stylesheet" type="text/css" href="./css/style.css" />
</body>
</html>