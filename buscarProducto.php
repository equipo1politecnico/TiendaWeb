<?php
$servername = "localhost";
$username = "php";
$password = "1234";
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

$busqueda = $_POST["busqueda"];
$categoria = $_POST["categoria"];

$sql = "SELECT * FROM productos WHERE  $categoria LIKE '%$busqueda%'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Código: " . $row["cod"]. " - Descripción: " . $row["descripcion"]. " - Precio: " . $row["precio"]. "<br>";
    }
} else {
    echo "No se ha encontrado ningún resultado.";
}

mysqli_close($conn);

?>
