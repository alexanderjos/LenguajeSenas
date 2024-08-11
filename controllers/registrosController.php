<?php
// controllers/registrosController.php
class registrosController {
    protected $registros;

    public function __construct() {
        require_once __DIR__ . '/../models/registrosModel.php';
        $this->registros = new RegistrosModel();
    }

    public function index() {
        require_once LOGIN;
    }
    public function registrar(){
        $usuario = $_POST["userName"];
        $email = $_POST["userEmail"];
        $password = md5($_POST["userPassword"]);
        if(isset($_POST["btnEnviar"])){
            $data = array(
                "User" => $usuario,
                "Email" => $email,
                "Pass" => $password
            );
            $this->registros->save($data);
            require_once LOGIN;
        }else{
            echo "error";
        }
    }
    // Puedes agregar más métodos aquí, como para registrar usuarios, etc.
}
?>
