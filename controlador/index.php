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
        $tipo_pasajero = $_REQUEST['tipo_pasajero'];

        $pasajero = new Modelo();

        $columnas = "nombres, apellidos, genero, tipo_documento, numero_documento, telefono, nacionalidad, fech_nac, email, contacto_compra";
        $valores = "'$nombres','$apellidos','$genero','$tipo_documento','$numero_documento','$telefono','$nacionalidad','$fech_nac','$email',$contacto_compra";

        $pasajero->insertar("PASAJERO", $columnas, $valores);

        $id_pasajero = $pasajero->getLastId();

        if ($tipo_pasajero == 'corriente') {
            $pasajero->insertar("PASAJERO_CORRIENTE", "id_pasajero", "'$id_pasajero'");
        } elseif ($tipo_pasajero == 'empresa') {
            $ruc = $_REQUEST['ruc'] ?? '';
            $direccion = $_REQUEST['direccion'] ?? '';
            $razon_social = $_REQUEST['razon_social'] ?? '';

            $columnasEmpresa = "id_pasajero, RUC, direccion, razonSocial";
            $valoresEmpresa = "'$id_pasajero', '$ruc', '$direccion', '$razon_social'";
            $pasajero->insertar("PASAJERO_EMPRESA", $columnasEmpresa, $valoresEmpresa);
        }

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

    // -------- CRUD DE PASAJERO SECUNDARIO --------
    static function indexSecundario() {
        $obj = new Modelo();
        $dato = $obj->mostrar("PS_ADULTO", "1");
        require_once("vista/psecundario/index.php");
    }

    static function nuevoPasajeroSecundario() {
        require_once("vista/psecundario/nuevo.php");
    }

    static function guardarPasajeroSecundario() {
        $id_reserva = $_REQUEST['id_reserva'];
        $tipo_secundario = $_REQUEST['tipo_secundario'];

        $modelo = new Modelo();
        $modelo->insertar("PASAJEROS_SECUNDARIOS", "id_reserva", "'$id_reserva'");
        $id_pasajerosec = $modelo->getLastId();

        if ($tipo_secundario == 'adulto') {
            $nombres = $_REQUEST['nombres'];
            $apellidos = $_REQUEST['apellidos'];
            $genero = $_REQUEST['genero'];
            $tipo_documento = $_REQUEST['tipo_documento'];
            $numero_documento = $_REQUEST['numero_documento'];
            $nacionalidad = $_REQUEST['nacionalidad'];
            $fech_nac = $_REQUEST['fech_nac'];
            $contacto_compra = $_REQUEST['contacto_compra'] ?? 0;

            $cols = "id_pasajerosec, nombres, apellidos, genero, tipo_documento, numero_documento, nacionalidad, fech_nac, contacto_compra";
            $vals = "'$id_pasajerosec', '$nombres', '$apellidos', '$genero', '$tipo_documento', '$numero_documento', '$nacionalidad', '$fech_nac', $contacto_compra";

            $modelo->insertar("PS_ADULTO", $cols, $vals);
        } elseif ($tipo_secundario == 'niño') {
            $nombres = $_REQUEST['nombres'];
            $apellidos = $_REQUEST['apellidos'];
            $genero = $_REQUEST['genero'];
            $tipo_documento = $_REQUEST['tipo_documento'];
            $numero_documento = $_REQUEST['numero_documento'];
            $nacionalidad = $_REQUEST['nacionalidad'];
            $fech_nac = $_REQUEST['fech_nac'];

            $cols = "id_pasajerosec, nombres, apellidos, genero, tipo_documento, numero_documento, nacionalidad, fech_nac";
            $vals = "'$id_pasajerosec', '$nombres', '$apellidos', '$genero', '$tipo_documento', '$numero_documento', '$nacionalidad', '$fech_nac'";

            $modelo->insertar("PS_NIÑO", $cols, $vals);
        } elseif ($tipo_secundario == 'infante') {
            $responsable = $_REQUEST['responsable'];

            $cols = "id_pasajerosec, resposable";
            $vals = "'$id_pasajerosec', '$responsable'";

            $modelo->insertar("PS_INFANTE", $cols, $vals);
        }

        header("Location:".urlsite."?m=indexSecundario");
    }


    
    //--------- CRUD DE EMPLEADO -----------
    static function indexEmpleado() {
        $obj = new Modelo();
        $dato = $obj->mostrar("EMPLEADO", "1");
        require_once("vista/empleado/index.php");
    }
}
?>
