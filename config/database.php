<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Asegúrate de ajustar la ruta si es necesario

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../config'); // Ajusta la ruta si es necesario
$dotenv->load();

class Conectar {
    public static function getConexion() {
        // Verificar que las variables de entorno estén disponibles
        if (!isset($_ENV['DB_HOST'], $_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASS'])) {
            throw new Exception("Variables de entorno para la base de datos no están configuradas correctamente.");
        }

        $host = $_ENV['DB_HOST'];
        $db = $_ENV['DB_NAME'];
        $user = $_ENV['DB_USER'];
        $pass = $_ENV['DB_PASS'];

        $conexion = new mysqli($host, $user, $pass, $db);
        if ($conexion->connect_errno) {
            // Lanzar una excepción en lugar de usar die()
            throw new Exception("Error inesperado en la conexión a la base de datos: " . $conexion->connect_error);
        } else {
            return $conexion;
        }
    }
}
?>
