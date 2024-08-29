<?php
// Conectar a la base de datos
$conexion = new mysqli("database-1.c14u4804opxq.us-east-2.rds.amazonaws.com", "admin", "Soluciona2024", "LenguajeSenas");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Verificar que el formulario haya sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener la imagen y convertirla en binario
    $imagen = $_FILES['imagen']['tmp_name'];
    $imagen_binaria = addslashes(file_get_contents($imagen));

    // Obtener otros datos del formulario
    $significado = $conexion->real_escape_string($_POST['significado']);
    $id_categoria = (int) $_POST['categoria'];

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO signo (imagen, significado, id_categoria) VALUES ('$imagen_binaria', '$significado', $id_categoria)";

    if ($conexion->query($sql) === TRUE) {
        echo "Imagen subida y datos insertados correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
}

// Cerrar la conexión
$conexion->close();
?>
