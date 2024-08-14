<?php
require 'vendor/autoload.php';

use Dotenv\Dotenv;

class Conectar {
    public static function getConexion() {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/config');
        $dotenv->load();

        try {
            $conexion = new mysqli(
                $_ENV['DB_HOST'],
                $_ENV['DB_USER'],
                $_ENV['DB_PASSWORD'],
                $_ENV['DB_NAME']
            );

            if ($conexion->connect_errno) {
                throw new Exception("Error inesperado en la conexión a base de datos: " . $conexion->connect_error);
            }

            return $conexion;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>
