<!DOCTYPE html>
<html>
 <meta charset='utf-8' >
<body>

<?php
$servername = "192.168.31.3";
$database = "pruebas";
$username = "root";
$password = "yllaw";
$buscarpor = $_POST["buscarpor"];
$buscarget = $_POST["busquedaget"];
/*echo $buscarpor;*/
//Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("La conexion tiene el error: " . mysqli_connect_error());
} 
echo "Conexion correcta<br>";
$sql = "SELECT CodProducto, Descripcion, Precio FROM productos WHERE ";
if ($buscarpor == "Descripcion") 
	{ $clausula_where = "Descripcion LIKE '%$buscarget%';";
	}
elseif ($buscarpor == "CodProducto")
	{ $clausula_where = "CodProducto=$buscarget;";}
elseif ($buscarget == "Precio")
	{ $clausula_where = "Precio<=$buscarget;";}
else echo "Hemos tenido un problema con el formulario, algo no ha ido bien: Revise los datos introducidos<br>" /*$buscarpor, $buscarget"*/;

$sql=$sql.$clausula_where;
/*Zona de pruebas */ 
/*echo "Vamos a buscar: <br>";
echo $sql;
echo "<br>";*/




/*Fin zona de pruebas */




$consulta = mysqli_query($conn, $sql);
/*echo "La consulta: ";
echo $consulta;
echo "<br>";
*/ 



if (!$consulta) {
       echo "Error: Los datos introducidos no corresponden, seleccione CodProducto, Descripcion o Precio<br>" /*. $sql ."<br>" . mysqli_error($conn)*/;
	   } 
	   
	   
if (mysqli_num_rows($consulta) > "0") 
	   {
  // output data of each row
  echo "<br>Estos son los resultados de su busqueda:<br><br>";
			  while ($fila = mysqli_fetch_assoc($consulta)) 
					{
						
						echo $fila["CodProducto"]."-";
						echo $fila["Descripcion"]."-";
						echo $fila["Precio"]."<br>";
					}
		} 
		else echo "No hemos encontrado resultados";
	

mysql_free_result($consulta);


?>
</body>
</html>