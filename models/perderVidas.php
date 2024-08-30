<?php
require __DIR__ . '/../config/database.php';
header('Content-Type: application/json');

// Obtener la conexión utilizando la clase Conectar
$conexion = Conectar::getConexion();

if ($conexion) {
    // Obtener datos del POST
    $nickname = isset($_POST['nickname']) ? trim($_POST['nickname']) : '';

    if ($nickname) {
        // Consultar las vidas
        $sql = "SELECT Corazones FROM vidas_monedas WHERE nickname = ?";
        $stmt = $conexion->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param("s", $nickname);
            $stmt->execute();
            $result = $stmt->get_result();
            $columnas = $result->fetch_assoc();

            if ($columnas) {
                $vidas = $columnas['Corazones'];
                $nuevaVIDA = $vidas - 1;
                
                // Actualizar las vidas
                $sql = "UPDATE usuarios SET Corazones = ?, UltimaConexion = ? WHERE nickname = ?";
                $stmt = $conexion->prepare($sql);
                
                if ($stmt) {
                    date_default_timezone_set('America/Bogota'); // Configurar la zona horaria
                    $tiempo_actual = new DateTime();
                    $tiempo_formateado = $tiempo_actual->format('Y-m-d H:i:s'); // Formato completo para DATETIME
                    
                    $stmt->bind_param("iss", $nuevaVIDA, $tiempo_formateado, $nickname);
                    $stmt->execute();
                    
                    if ($stmt->affected_rows > 0) {
                        echo json_encode(['existe' => true, 'mensaje' => 'Actualización exitosa.']);
                    } else {
                        echo json_encode(['existe' => false, 'mensaje' => 'No se actualizó ningún registro.']);
                    }
                    $stmt->close();
                } else {
                    echo json_encode(['existe' => false, 'error' => 'Error al preparar la consulta de actualización.']);
                }
            } else {
                echo json_encode(['existe' => false, 'error' => 'No se encontraron registros con el nickname proporcionado.']);
            }
        } else {
            echo json_encode(['existe' => false, 'error' => 'Error al preparar la consulta de selección.']);
        }
    } else {
        echo json_encode(['existe' => false, 'error' => 'Datos insuficientes para la operación.']);
    }
} else {
    echo json_encode(['existe' => false, 'error' => 'No se pudo conectar a la base de datos.']);
}
?>
