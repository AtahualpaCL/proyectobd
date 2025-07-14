<?php
require_once("modelo/index.php");

class modeloController {
    // -------- CRUD de PASAJERO --------
    static function indexPasajero() {
        $obj = new Modelo();
        $dato = $obj->mostrar("PASAJERO", "1");
        require_once("vista/pasajero/index.php");
    }

    static function nuevoPasajero() {
        require_once("vista/pasajero/nuevo.php");
    }

    static function guardarPasajero() {
        $nombres = $_REQUEST['nombres'];
        $apellidos = $_REQUEST['apellidos'];
        $telefono = $_REQUEST['telefono'];
        $email = $_REQUEST['email'];
        $genero = $_REQUEST['genero'];
        $tipo_documento = $_REQUEST['tipo_documento'];
        $numero_documento = $_REQUEST['numero_documento'];
        $nacionalidad = $_REQUEST['nacionalidad'];
        $fech_nac = $_REQUEST['fech_nac'];
        $contacto_compra = $_REQUEST['contacto_compra'];

        $data = "'$nombres','$apellidos','$genero','$tipo_documento','$numero_documento','$telefono','$nacionalidad','$fech_nac','$email',$contacto_compra";

        $pasajero = new Modelo();
        $pasajero->insertar("PASAJERO", $data);
        header("location:".urlsite."?m=indexPasajero");
    }

    static function editarPasajero() {
        $id = $_REQUEST['id'];
        $pasajero = new Modelo();
        $dato = $pasajero->mostrar("PASAJERO", "id_pasajero=".$id);
        require_once("vista/pasajero/editar.php");
    }

    static function actualizarPasajero() {
        $id = $_REQUEST['id'];
        $nombres = $_REQUEST['nombres'];
        $apellidos = $_REQUEST['apellidos'];
        $telefono = $_REQUEST['telefono'];
        $email = $_REQUEST['email'];

        $data = "nombres='$nombres', apellidos='$apellidos', telefono='$telefono', email='$email'";

        $pasajero = new Modelo();
        $pasajero->actualizar("PASAJERO", $data, "id_pasajero=".$id);
        header("location:".urlsite."?m=indexPasajero");
    }

    static function eliminarPasajero() {
        $id = $_REQUEST['id'];
        $pasajero = new Modelo();
        $pasajero->eliminar("PASAJERO", "id_pasajero=".$id);
        header("location:".urlsite."?m=indexPasajero");
    }

    // -------- LISTADOS --------
    static function indexSecundario() {
        $obj = new Modelo();
        $dato = $obj->mostrar("PS_ADULTO", "1");
        require_once("vista/secundario/index.php");
    }

    static function indexEmpleado() {
        $obj = new Modelo();
        $dato = $obj->mostrar("EMPLEADO", "1");
        require_once("vista/empleado/index.php");
    }
}
?>
