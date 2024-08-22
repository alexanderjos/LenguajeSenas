<?php


require __DIR__ . '/../config/database.php';
$conexion = Conectar::getConexion();

// Leer los datos enviados desde JavaScript
$data = json_decode(file_get_contents('php://input'), true);

$nombre = $data['id'];
$edad = $data['aumento'];




// Consulta SQL para incrementar el valor por el valor ingresado
$stmt = $conexion->prepare("UPDATE usuarios SET Monedas = Monedas + $aumento WHERE UsuarioID = $id");
$stmt->execute();

// Cerrar la conexión
$conn->close();
?>
