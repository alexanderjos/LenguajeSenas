<?php
// models/RegistrosModel.php
class RegistrosModel {
    protected $db;
    protected $usuario;

    public function __construct() {
        $this->db = Conectar::getConexion();  // Asegúrate de que este método exista en la clase Conectar
        $this->usuario = array();
    }
    public function save($data)
    {
        $sql = "INSERT INTO usuarios (name,nickname, email, password,genero,fechaNac,URLFotoPerfil) 
            VALUES ('" . $data["usuario"] . "','" . $data["nickname"] . "' ,'" . $data["email"] . "'
            , '" . $data["password"] . "' ,'" . $data["genero"] . "' ,'" . $data["fechaNac"] . "' ,'" . $data["avatar"] . "')";
        $this->db->query($sql);
    }

    // Aquí puedes agregar métodos para interactuar con la base de datos, como registrar usuarios, etc.
}
?>
