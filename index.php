<?php
require_once("config.php");
require_once("controlador/index.php");

if (isset($_GET['m'])) {
    $metodo = $_GET['m'];
    if (method_exists("modeloController", $metodo)) {
        modeloController::{$metodo}();
    } else {
        echo "Método no encontrado";
    }
} else {
    // Mostrar el selector de tipo de usuario
    require_once("vista/selector_usuario.php");
}
?>
