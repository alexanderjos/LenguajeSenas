<?php 
class Conectar{
    public static function Conectar(){
        $conexion = new mysqli("b1hatqzetyib0yxinmxa-mysql.services.clever-cloud.com", "uhknump3kjjmv2nh","KiD9F7loevq6joZrqOQE", "b1hatqzetyib0yxinmxa");
        if($conexion->connect_errno){
            die("Error inesperado en la conexión a base de datos: ". $conexion->connect_errno);
        }else{
            return $conexion; 
        }
    }
}
?>
