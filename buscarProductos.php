<?php

require './ClassProducto.php';

// Variables 
$servername = "localhost";
$username = "equipoa";
$password = "politecnico";
$dbname = "productos";

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