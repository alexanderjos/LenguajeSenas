<?php
// Configuración de la conexión a la base de datos
$servername = "localhost"; // Cambia esto si es necesario
$username = "usuario_db"; // Usuario de la base de datos
$password = "contraseña_db"; // Contraseña de la base de datos
$dbname = "nombre_db"; // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Leer los datos enviados desde JavaScript
$data = json_decode(file_get_contents('php://input'), true);

$nombre = $data['id'];
$edad = $data['aumento'];


// Consulta SQL para incrementar el valor por el valor ingresado
$sql = "UPDATE usuarios SET Monedas = Monedas + $aumento WHERE UsuarioID = $id";

if ($conn->query($sql) === TRUE) {
    echo "Valor incrementado exitosamente en $incremento";
} else {
    echo "Error al incrementar el valor: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
