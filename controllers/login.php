<?php
ob_start(); // Inicia el buffer de salida

require __DIR__ . '/../config/database.php';
$conexion = Conectar::getConexion();

if (!empty($_POST["btningresar"])) {
    if (empty($_POST["Nickname"]) || empty($_POST["password"])) {
        echo '<div>Campos Vacios</div>';
    } else {
        $Nickname = $_POST["Nickname"];
        $contraseña = md5($_POST["password"]);

        $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE nickname = ? AND password = ?");
        $stmt->bind_param("ss", $Nickname, $contraseña);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            header("Location: Vista/juego.php");
            exit();
        } else {
            echo '<div>Usuario o Contraseña incorrecta</div>';
        }
    }
}

ob_end_flush(); // Envía el buffer de salida
?>
