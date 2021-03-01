<?php

require 'vendor/autoload.php';
require 'ClassCliente.php';

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
        $sqlPrueba = "select * from Clientes;";
        $resultado = $conn->query($sqlPrueba);

        // Cuenta las líneas que hay antes de hacer nada.
        $clientesAntes = $resultado->num_rows;

        // Da de alta un nuevo cliente de prueba.
        $clienteNuevo = new Cliente("prueba","prueba","prueba","prueba","micorreo@gmail.com");
        $clienteNuevo->darAlta($conn);
        $resultado = $conn->query($sqlPrueba);

        // Cuenta las líneas después del alta.
        $clientesDespues = $resultado->num_rows;

        //Comprueba si a lo que antes había, se ha sumado 1.
        $this->assertEquals($clientesAntes+1,$clientesDespues,"El cliente se da de alta correctamente");

        //Segunda tanda. Busca el cliente de prueba que acabamos de dar de alta.
        $sqlPrueba = "select * from Clientes where dni like 'prueba';";
        $resultado = $conn->query($sqlPrueba);

        // Comprueba si se ha dado de alta solamente 1.
        $numeroFilas = $resultado->num_rows;
        $this->assertEquals(1,$numeroFilas,"El cliente se da de alta correctamente, 2a prueba, y no se repiten filas");
        $conn->close();
    }
}
?>