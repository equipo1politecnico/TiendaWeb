<!DOCTYPE html>
<html>
 <meta charset='utf-8' >
<body>

<?php
$servername = "127.0.0.1";
$database = "pruebas";
$username = "php";
$password = "1234";
$codprod = $_POST["codprod"];
$descripcionget = $_POST["descripcionget"];
$precioget = $_POST["precioget"];
/*
if ($codprod > "0") { mayor que cero
if ($codprod ="") { esta vacio
if ($codprod varchar) { no es un numero
*/

/*function consulta($codprod, $descripcionget, $precioget) {*/
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("La conexion tiene el error: " . mysqli_connect_error());
} 
echo "Conexion correcta";
$sql = "INSERT INTO productos (CodProducto, Descripcion, Precio) VALUES ($codprod, '$descripcionget', $precioget)";
if (mysqli_query($conn, $sql)) {
      echo "Nueva entrada guardada";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

 

?>
</body>
</html>