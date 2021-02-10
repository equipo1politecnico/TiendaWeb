<!DOCTYPE html>
<html>
<meta charset='utf-8' >
<body>

<?php
$servername = "192.168.31.53";
$username = "equipoa";
$password = "politecnico";
$dbname = "pruebas";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Se ha conectado correctamente";
echo "<br>";
echo "<br>";

$busqueda = $_POST["busquedaget"];
$categoria = $_POST["buscarpor"];

$funcion_sql = "SELECT * FROM productos WHERE $categoria LIKE '%$busqueda%'";
$resultado = mysqli_query($conn, $funcion_sql);

if (mysqli_num_rows($resultado) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($resultado)) {
        echo "Código: " . $row["CodProducto"]. " - Descripción: " . $row["Descripcion"]. " - Precio: " . $row["Precio"]. " - Stock: " . $row["Stock"]. "<br>";
    }
} else {
    echo "No se ha encontrado ningún resultado.";
}

mysqli_close($conn);

?>

<p align="center"><a href="index.html">Insertar Productos</a></p>
<p align="center"><a  href="buscar.html">Buscar Productos</a></p>
<p align="center"><a  href="indice.html">Volver al Indice</a></p>

</body>
</html>
