<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Ajusta la ruta si es necesario

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../config'); // Ajusta la ruta si es necesario
$dotenv->load();

class Conectar {
    public static function getConexion() {
        $host = $_ENV['DB_HOST'];
        $db = $_ENV['DB_NAME'];
        $user = $_ENV['DB_USER'];
        $pass = $_ENV['DB_PASS'];

        $conexion = new mysqli($host, $user,$pass, $db);
        if($conexion->connect_errno){
            die("Error inesperado en la conexión a base de datos: ". $conexion->connect_errno);
        }else{
            return $conexion; 
        }
    }
}
?>

