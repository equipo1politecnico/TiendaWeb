<?php
$servername = "localhost";
$username = "php";
$password = "1234";
$dbname = "pruebas";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);
// Comprobar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

echo "Se ha conectado correctamente";
echo "<br>";
echo "<br>";

// Datos que insertar del formulario

$codigo = $_POST['codigo'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];

$sql = "INSERT INTO productos (cod, descripcion, precio)
VALUES ('$codigo', '$descripcion', '$precio')";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo registro creado con éxito";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
