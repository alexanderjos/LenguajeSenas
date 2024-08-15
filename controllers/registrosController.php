<?php
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
        $ventana['success']= "block";
        header("location:../Vista/registro.php");
    }

}
?>
