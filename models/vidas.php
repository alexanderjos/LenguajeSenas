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

        if ($vidas < 4) {
            $ultimaConexion = $jugador['UltimaConexion'];
            date_default_timezone_set('America/Bogota');    
            $tiempo_actual = new DateTime();
            $ultimaConexion = new DateTime($ultimaConexion);

            // Calcular la diferencia de tiempo entre la última conexión y la hora actual
            $intervalo = $ultimaConexion->diff($tiempo_actual);

            // Convertir la diferencia de tiempo a segundos
            $segundos_transcurridos = ($intervalo->h * 3600) + ($intervalo->i * 60) + $intervalo->s;

            $tiempo_regeneracion = 15 * 60; // 15 minutos en segundos (el tiempo necesario para regenerar una vida)

            // Calcular cuántas vidas se deben regenerar basándose en el tiempo transcurrido
            $vidas_a_regenerar = floor($segundos_transcurridos / $tiempo_regeneracion);

            $minutos_totales = $vidas_a_regenerar * 15;
            
            // Crear un nuevo DateTime con la hora actual
            $fecha = new DateTime($ultimaConexion->format('H:i:s'));

            // Crear un intervalo con los minutos calculados
            $intervalo = new DateInterval('PT' . $minutos_totales . 'M');
            // Sumar el intervalo a la fecha
            $fecha->add($intervalo);

            if ($vidas_a_regenerar > 0) {
                $vidas = min(4, $vidas + $vidas_a_regenerar);

                // Actualizar la base de datos con las nuevas vidas y la hora de la última recarga
                $stmt = $conexion->prepare("UPDATE usuarios SET Corazones = ?, UltimaConexion = ? WHERE nickname = ?");
                $stmt->bind_param("iss", $vidas, $fecha->format('H:i:s'), $Nickname);
                $stmt->execute();
           }
            header("Location: ../Vista/juego.php");
            exit();
        } else {
            header("Location: ../Vista/juego.php");
            exit();
        }
    }
}

ob_end_flush(); // Envía el buffer de salida
?>
