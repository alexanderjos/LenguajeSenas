<?php
// index.php
date_default_timezone_set("America/Lima");
require_once "../config/database.php";
require_once "../config/config.php";
require_once "../routes/routes.php";

if (isset($_GET["c"])) {
    $controlador = validarControlador($_GET["c"]);

    if (isset($_GET["a"])) { // variable a= acción enviada por GET
        if (isset($_GET["id"])) {  // variable id= id de registro para eliminar o actualizar enviada por GET
            validarAccion($controlador, $_GET['a'], $_GET['id']);
        } else {
            validarAccion($controlador, $_GET['a']);
        }
    } else {
        validarAccion($controlador, ACCION_DEFAULT);
    }
} else {
    $control = validarControlador(CONTROLADOR_DEFAULT);
    $accionTMP = ACCION_DEFAULT;

    if ($control == null) {
        echo "Error: El controlador de inicio de sesión no se ha cargado correctamente.";  // Mensaje de error si el controlador no se carga
    } else {
        $control->$accionTMP();
    }
}
?>
