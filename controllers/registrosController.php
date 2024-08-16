<?php
ob_start(); // Inicia el buffer de salida
// controllers/registrosController.php
class registrosController{
    protected $registros;

    public function __construct() {
        require_once __DIR__ . '/../models/registrosModel.php';
        $this->registros = new RegistrosModel();
    }
    public function index(){
        $usuario = $_POST["name"];
        $nickname = $_POST["nickname"];
        $email = $_POST["email"];
        $password = md5($_POST["password"]);
        $genero = $_POST["gender"];
        $fechaNac = $_POST["birthdate"];
        $avatar = $_POST["avatar"];
        $data = array(
            "usuario" => $usuario,
            "nickname" => $nickname,
            "email" => $email,
            "password" => $password,
            "genero" => $genero,
            "fechaNac" => $fechaNac,
            "avatar" => $avatar
        );
        $this->registros->save($data);
        header("Location: ../index.php");
        exit(); // Es una buena práctica llamar a exit después de redirigir
    }

}
ob_end_flush(); // Envía el buffer de salida
?>
