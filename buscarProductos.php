<?php
require './ClassProducto.php';
 // Variables
$servername = "192.168.31.53";
$username = "equipoa";
$password = "politecnico";
$dbname = "pruebas";



// Variables 


$busqueda = $_POST["busquedaget"];
$categoria = $_POST["buscarpor"];


// Establecer conexión con la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

//Pedimos que se nos realize la búsqueda del cliente

$buscarProducto->buscar($busqueda,$categoria,$conn);


// Cerrar la conexion a la base de datos
$conn->close();



?>
=======
<p align="center"><a href="index.html">Insertar Productos</a></p>
<p align="center"><a  href="buscar.html">Buscar Productos</a></p>
<p align="center"><a  href="index.html">Volver al Indice</a></p>

</body>
</html>
