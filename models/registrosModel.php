<?php
// models/RegistrosModel.php
class RegistrosModel {
    protected $db;
    protected $usuario;

    public function __construct() {
        $this->db = Conectar::Conectar();  // Asegúrate de que este método exista en la clase Conectar
        $this->usuario = array();
    }
    public function save($data)
    {
        $sql = "INSERT INTO usuarios (name, email, password) 
            VALUES ('" . $data["User"] . "','" . $data["Email"] . "' , '" . $data["Pass"] . "')";
        $this->db->query($sql);
    }

    // Aquí puedes agregar métodos para interactuar con la base de datos, como registrar usuarios, etc.
}
?>
