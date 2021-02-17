<?php


require './ClassProducto.php';

$servername = "192.168.31.53";

$username = "equipoa";
$password = "politecnico";
$dbname = "productos";

$cod = $_POST["cod"];
$descripcion = $_POST["descripcion"];
$precio = $_POST["precio"];
$stock = $_POST["stock"];


// Establecer conexión con la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

//Creamos un objeto cliente y le pedimos el alta.

$productoNuevo = new Producto($cod,$descripcion,$precio,$stock);

$productoNuevo->darAlta($conn);



// Cerrar la conexion a la base de datos
$conn->close();

<p align="center"><a href="insertar.html">Insertar Productos</a></p>
<p align="center"><a  href="buscar.html">Buscar Productos</a></p>
<p align="center"><a  href="index.html">Volver al Indice</a></p>



?>