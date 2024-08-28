<?php
session_start();
ob_start(); // Inicia el buffer de salida
require __DIR__ . '/../config/database.php';

header('Content-Type: application/json');

// Obtener la conexión utilizando la clase Conectar
$conexion = Conectar::getConexion();
$Nickname = $_SESSION["nickname"];

if ($conexion) {
    $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE nickname = ?");
    $stmt->bind_param("s", $Nickname); 
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $jugador = $resultado->fetch_assoc();
        $vidas = $jugador['Corazones'];
        $ultimaConexion = $jugador['UltimaConexion'];
        $tiempo_actual = time();
        $tiempo_regeneracion = 15 * 60; // 15 minutos en segundos
        
        // Calcular el tiempo transcurrido desde la última recarga
        $tiempo_transcurrido = $tiempo_actual - $ultimaConexion;
        
        // Calcular cuántas vidas deben regenerarse
        $vidas_a_regenerar = floor($tiempo_transcurrido / $tiempo_regeneracion);
        
        if ($vidas < 4 && $vidas_a_regenerar > 0) {
            $vidas = min(4, $vidas + $vidas_a_regenerar);
            
            // Actualizar la base de datos con las nuevas vidas y la hora de la última recarga
            $stmt = $conexion->prepare("UPDATE usuarios SET Corazones = ?, UltimaConexion = ? WHERE nickname = ?");
            $stmt->bind_param("iis", $vidas, $tiempo_actual, $Nickname);
            $stmt->execute();
            
            header("Location: ../Vista/juego.php");
            exit();
        }
    }
}

ob_end_flush(); // Envía el buffer de salida
?>
