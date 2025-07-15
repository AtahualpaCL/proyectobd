<?php
require_once("config.php");
require_once("controlador/index.php");

$controlador = new modeloController();

if (isset($_GET['m'])) {
    $metodo = $_GET['m'];
    if (method_exists($controlador, $metodo)) {
        $controlador->{$metodo}();
    } else {
        echo "Método no encontrado";
    }
} else {
    require_once("vista/selector_usuario.php");
}
?>
