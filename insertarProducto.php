<!DOCTYPE html>
<html>
<meta charset='utf-8' >
<body>

<?php
$servername = "192.168.31.53";
$username = "equipoa";
$password = "politecnico";
$dbname = "pruebas";
$codprod = $_POST["codprod"];
$descripcionget = $_POST["descripcionget"];
$precioget = $_POST["precioget"];
$stockget = $_POST["stockget"];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Se ha conectado correctamente";
echo "<br>";
echo "<br>";

$sql = "INSERT INTO productos (CodProducto, Descripcion, Precio, Stock) VALUES ($codprod, '$descripcionget', $precioget, $stockget)";
if (mysqli_query($conn, $sql)) {
      echo "<p>Nueva entrada guardada</p>";

} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?></center>

<p align="center"><a href="insertar.html">Insertar Productos</a></p>
<p align="center"><a  href="buscar.html">Buscar Productos</a></p>
<p align="center"><a  href="index.html">Volver al Indice</a></p>


</body>
</html>
