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

        if ($vidas < 4) {
            date_default_timezone_set('America/Bogota');
            $tiempo_actual = new DateTime();
            $ultimaConexion = new DateTime($ultimaConexion);

            // Calcular la diferencia de tiempo entre la última conexión y la hora actual
            $intervalo = $ultimaConexion->diff($tiempo_actual);

            // Convertir la diferencia de tiempo a minutos
            $minutos_transcurridos = ($intervalo->days * 24 * 60) + ($intervalo->h * 60) + $intervalo->i;

            $tiempo_regeneracion = 15; // 15 minutos en minutos

            // Calcular cuántas vidas se deben regenerar basándose en el tiempo transcurrido
            $vidas_a_regenerar = floor($minutos_transcurridos / $tiempo_regeneracion);

            if ($vidas_a_regenerar > 0) {
                // Asegurarse de no exceder el máximo de vidas
                $vidas = min(4, $vidas + $vidas_a_regenerar);

                // Crear un nuevo DateTime con la última conexión
                $fecha = new DateTime($ultimaConexion->format('Y-m-d H:i:s'));

                // Crear un intervalo con los minutos calculados
                $intervalo = new DateInterval('PT' . ($vidas_a_regenerar * $tiempo_regeneracion) . 'M');
                // Sumar el intervalo a la fecha
                $fecha->add($intervalo);

                // Actualizar la base de datos con las nuevas vidas y la hora de la última recarga
                $stmt = $conexion->prepare("UPDATE usuarios SET Corazones = ?, UltimaConexion = ? WHERE nickname = ?");
                $stmt->bind_param("iss", $vidas, $fecha->format('Y-m-d H:i:s'), $Nickname);
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
