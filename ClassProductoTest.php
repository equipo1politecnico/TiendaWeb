<?php

require 'vendor/autoload.php';
require 'ClassProducto.php';

class ClienteTest extends \PHPUnit\Framework\TestCase{

    public function testDarAlta(){
        $servername = "192.168.31.53";
        $username = "equipoa";
        $password = "politecnico";
        $dbname = "pruebas";

        // Establecer conexión con la base de datos
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        //Primera tanda
        //Se calculan las líneas que hay en la tabla y se mete en $resultado.
        $sqlPrueba = "select * from productos;";
        $resultado = $conn->query($sqlPrueba);

        // Cuenta las líneas que hay antes de hacer nada.
        $productosAntes = $resultado->num_rows;

        // Se añade un nuevo producto.
        $ProductoNuevo = new Producto("250","prueba","50.0","100");
        $ProductoNuevo->darAlta($conn);
        $resultado = $conn->query($sqlPrueba);

        // Cuenta las líneas después del alta.
        $productosDespues = $resultado->num_rows;

        //Comprueba si a lo que antes había, se ha sumado 1.
        $this->assertEquals($productosAntes+1,$productosDespues,"El producto se ha añadido correctamente");

        //Segunda tanda. Busca el producto de prueba que acabamos de añadir.
        $sqlPrueba = "select * from productos where cod like '250';";
        $resultado = $conn->query($sqlPrueba);

        // Comprueba si se ha dado de alta solamente 1.
        $numeroFilas = $resultado->num_rows;
        $this->assertEquals(1,$numeroFilas,"Se ha añadido el producto correctamente, 2a prueba, y no se repiten filas");
        $conn->close();
    }
}
?>