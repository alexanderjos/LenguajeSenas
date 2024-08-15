<?php
require __DIR__ . '/../config/database.php';

header('Content-Type: application/json'); // Asegúrate de que la respuesta sea JSON

if (isset($_POST['nickname'])) {
    $nombre = $_POST['nickname'];

    // Obtener la conexión utilizando la clase Conectar
    $conexion = Conectar::getConexion();

    if ($conexion) {
        // Preparar la consulta
        $sql = "SELECT * FROM vista_nicknames WHERE nickname = ?";
        $stmt = $conexion->prepare($sql);

        if ($stmt) {
            // Vincular parámetros y ejecutar la consulta
            $stmt->bind_param("s", $nombre);
            $stmt->execute();
            $result = $stmt->get_result();

            // Verificar si el nombre ya existe
            if ($result->num_rows > 0) {
                echo json_encode(['existe' => true]);
            } else {
                echo json_encode(['existe' => false]);
            }

            // Cerrar la declaración y la conexión
            $stmt->close();
            $conexion->close();
        } else {
            echo json_encode(['existe' => false, 'error' => 'Error en la consulta.']);
        }
    } else {
        echo json_encode(['existe' => false, 'error' => 'No se pudo conectar a la base de datos.']);
    }
} else {
    echo json_encode(['existe' => false, 'error' => 'Parámetro no encontrado.']);
}
?>
