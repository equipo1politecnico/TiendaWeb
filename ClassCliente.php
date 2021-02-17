<?php
require './ClassEnvioMail.php';
require 'vendor/autoload.php';

class Cliente {
    private $nombre;
    private $apellidos;
    private $dni;
    private $email;
    private $fecha_de_nacimiento;

    function __construct($nombre, $apellidos, $dni, $email, $fecha_de_nacimiento) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->dni = $dni;
        $this->email = $email;
        $this->fecha_de_nacimiento = $fecha_de_nacimiento;
    }

    //darse de alta
    function darAlta($conn) {
        // Consulta para realizar inserción a la base de datos

        $sql = "INSERT INTO clientes (dni,nombre,apellidos,email,fecha_de_nacimiento) VALUES ('".$this->dni."','".$this->nombre."','".$this->apellidos."','".$this->email."','".$this->fecha_de_nacimiento."');";

        if ($conn->query($sql) === TRUE) {
            echo "Nuevo registro creado con éxito.";
            //Se construye un email y se manda.
            $miEmail = new envioEmail($this->email);
            $miEmail->sendMail();

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }

    function asignarEmail($nuevoEmail) {
        $this->email = $nuevoEmail;
    }

    //Función de búsqueda de clientes.
    function buscar($busqueda,$categoria,$conn) {

        // Consulta para realizar la búsqueda en la base de datos
        $sql = "SELECT * FROM clientes WHERE ";
        switch ($categoria){
            case "nombre":
                $sql = $sql."nombre like '%$busqueda%';";
                break;
            case "apellidos":
                $sql = $sql."apellidos like '%$busqueda%';";
                break;
            case "dni":
                $sql = $sql."dni like '%$busqueda%';";
                break;
            case "email":
                $sql = $sql."email like '%$busqueda%';";
                break;
            case "fecha de nacimiento":
                $sql = $sql."fecha_de_nacimiento like '%$busqueda%';";
                break;
            default:
                echo "Se ha producido un error durante la búsqueda.";
        }

        $resultado = $conn->query($sql);

        // Consulta para realizar la busqueda en la base de datos
        if ($resultado->num_rows > 0) {
            // Salida de datos para cada fila
            while($row = $resultado->fetch_assoc()) {
                echo "- Nombre: ".$row["nombre"].", Apellidos: ".$row["apellidos"].", DNI: ".$row["dni"].", EMail: ".$row["email"].", Fecha de nacimiento: ".$row["fecha_de_nacimiento"]."<br>";
            }
        }else{
            echo "No se han encontrado resultados.";
        }
    }
}
?>
