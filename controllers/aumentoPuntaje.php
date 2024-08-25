
<?php
// // Conectar a la base de datos
// $servername = "database-1.c14u4804opxq.us-east-2.rds.amazonaws.com";
// $username = "admin";
// $password = "Soluciona2024";
// $dbname = "LenguajeSenas";

// $conn = new mysqli($servername, $username, $password, $dbname);


require __DIR__ . '/../config/database.php';

$nombre = $_POST['nickname'];

$id = $_POST['id'];
$aumento = $_POST['aumento'];

// Obtener la conexión utilizando la clase Conectar
$conn = Conectar::getConexion();



// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Leer los datos enviados desde JavaScript
$data = json_decode(file_get_contents('php://input'), true);


$id = $data['id'];
$aumento = $data['aumento'];


// Consulta SQL para incrementar el valor por el valor ingresado
$stmt = $conn->prepare("UPDATE usuarios SET Monedas = Monedas + $aumento WHERE UsuarioID = $id");
$stmt->execute();

// Cerrar la conexión
$conn->close();
?>


<?php
require __DIR__ . '/../config/database.php';

$nombre = $_POST['nickname'];

$id = $_POST['id'];
$aumento = $_POST['aumento'];

// Obtener la conexión utilizando la clase Conectar
$conexion = Conectar::getConexion();

if ($conexion) {
    // Preparar la consulta
    $sql = "UPDATE usuarios SET Monedas = Monedas + $aumento WHERE UsuarioID = $id";
    $stmt = $conexion->prepare($sql);

} else {
    echo json_encode(['existe' => false, 'error' => 'No se pudo conectar a la base de datos.']);
}



?>

