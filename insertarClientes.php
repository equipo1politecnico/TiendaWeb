<!DOCTYPE html>
<html>
 <meta charset='utf-8' >
<body>

<center><?php
$servername = "127.0.0.1";
$database = "pruebas";
$username = "php";
$password = "1234";
$nombrecliente = $_POST["nombrecliente"];
$apellidoscliente = $_POST["apellidoscliente"];
$dni = $_POST["dni"];
$emailcliente = $_POST["emailcliente"];
$fecha_de_nacimiento = $_POST["fecha_de_nacimiento"];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("La conexion tiene el error: " . mysqli_connect_error());
} 
echo "Conexion correcta";
$sql = "INSERT INTO clientes (nombre, apellidos, dni, email, fecha_de_nacimiento) VALUES ('$nombrecliente', '$apellidoscliente', '$dni', '$emailcliente', '$fecha_de_nacimiento')";
if (mysqli_query($conn, $sql)) {
      echo "<p>Nueva entrada guardada</p>";
			
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
/*Sergio Bazaga Granado*/
?></center>

<p align="center"><a href="insertarClientes.html">Insertar Clientes</a></p>
<p align="center"><a  href="buscarClientes.html">Buscar Clientes</a></p>
<p align="center"><a  href="indice.html">Volver al Indice</a></p>
 

</body>
</html>