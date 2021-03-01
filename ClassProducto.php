<?php
require 'vendor/autoload.php';

class Producto {
    private $cod;
    private $descripcion;
    private $precio;
    private $stock;

    function __construct($cod, $descripcion, $precio, $stock) {
        $this->cod = $cod;
        $this->descripcion = $precio;
        $this->precio = $precio;
        $this->stock = $stock;
    }

    //darse de alta
    function darAlta($conn) {
        // Consulta para realizar inserción a la base de datos

        $sql = "INSERT INTO productos (cod,descripcion,precio,stock) VALUES ('".$this->cod."','".$this->descripcion."','".$this->precio."','".$this->stock."');";
    }

    //Función de búsqueda de productos.
    function buscar($busqueda,$categoria,$conn) {

        // Consulta para realizar la búsqueda en la base de datos
        $sql = "SELECT * FROM productos WHERE ";
        switch ($categoria){
            case "cod":
                $sql = $sql."cod like '%$busqueda%';";
                break;
            case "descripcion":
                $sql = $sql."descripcion like '%$busqueda%';";
                break;
            case "precio":
                $sql = $sql."precio like '%$busqueda%';";
                break;
            case "stock":
                $sql = $sql."stock like '%$busqueda%';";
                break;
            default:
                echo "Se ha producido un error durante la búsqueda.";
        }

        $resultado = $conn->query($sql);

        // Consulta para realizar la busqueda en la base de datos
        if ($resultado->num_rows > 0) {
            // Salida de datos para cada fila
            while($row = $resultado->fetch_assoc()) {
                echo "- COD: ".$row["cod"].", Descripción: ".$row["descripcion"].", Precio: ".$row["precio"].", Stock: ".$row["stock"]."<br>";
            }
        }else{
            echo "No se han encontrado resultados.";
        }
    }
}
?>
