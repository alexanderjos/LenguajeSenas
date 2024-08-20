<?php
require __DIR__ . '/../config/database.php';

header('Content-Type: application/json');

// Obtener la conexión utilizando la clase Conectar
$conexion = Conectar::getConexion();

if ($conexion) {
    // Obtener los datos del POST
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $nickname = isset($_POST['nickname']) ? $_POST['nickname'] : '';
    $vidas = isset($_POST['vida']) ? $_POST['vida'] : '';

    if ($id) {
        // Operación SELECT: Obtener datos de la base de datos
        $sql = "SELECT * FROM vidas_monedas WHERE nickname = ?";
        $stmt = $conexion->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("s", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            $datos = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $datos = $row;
                }
            }
            echo json_encode($datos);

            $stmt->close();
        } else {
            echo json_encode(['existe' => false, 'error' => 'Error en la consulta.']);
        }
    } elseif ($vidas && $nickname) {
        // Operación UPDATE: Actualizar datos en la base de datos
        $sql = "UPDATE usuarios SET Corazones = ? WHERE nickname = ?";
        $stmt = $conexion->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("is", $vidas, $nickname);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo json_encode(['existe' => true, 'mensaje' => 'Actualización exitosa.']);
            } else {
                echo json_encode(['existe' => false, 'mensaje' => 'No se actualizó ningún registro.']);
            }

            $stmt->close();
        } else {
            echo json_encode(['existe' => false, 'error' => 'Error en la consulta.']);
        }
    } else {
        echo json_encode(['existe' => false, 'error' => 'Datos insuficientes para la operación.']);
    }

    $conexion->close();
} else {
    echo json_encode(['existe' => false, 'error' => 'No se pudo conectar a la base de datos.']);
}
?>
