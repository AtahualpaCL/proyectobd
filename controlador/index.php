<?php
require_once("modelo/index.php");

class modeloController {
    static function menuAdmin() {
        require_once("vista/menu.php");
    }

    static function menuCliente() {
        require_once("vista/cliente/landing.php");
    }

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
    /*static function indexSecundario() {
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
    }*/


    
    //--------- CRUD DE EMPLEADO -----------
    static function indexEmpleado() {
        $obj = new Modelo();
        $dato = $obj->mostrar("EMPLEADO", "1");
        require_once("vista/empleado/index.php");
    }

    static function nuevoEmpleado() {
        require_once("vista/empleado/nuevo.php");
    }

    static function guardarEmpleado() {
        $nombre = $_REQUEST['nombre'];
        $apellido = $_REQUEST['apellido'];
        $documento = $_REQUEST['documento'];
        $fech_nac = $_REQUEST['fech_nac'];
        $correo = $_REQUEST['correo'];
        $edad = $_REQUEST['edad'];
        $rol = $_REQUEST['rol']; // ASESOR, CHOFER, TRIPULANTE

        $columnas = "nombre, apellido, documento, fech_nac, correo, edad";
        $valores = "'$nombre', '$apellido', '$documento', '$fech_nac', '$correo', $edad";

        $empleado = new Modelo();
        $empleado->insertar("EMPLEADO", $columnas, $valores);
        $id_empleado = $empleado->getLastId();

        if ($rol == 'asesor') {
            $estacion = $_REQUEST['estacion'];
            $empleado->insertar("ASESOR", "id_empleado, estacionTrabajo", "'$id_empleado', '$estacion'");
        } elseif ($rol == 'chofer') {
            $licencia = $_REQUEST['licencia'];
            $empleado->insertar("CHOFER", "id_empleado, licencia", "'$id_empleado', '$licencia'");
        } elseif ($rol == 'tripulante') {
            $empleado->insertar("TRIPULANTE_DE_CABINA", "id_empleado", "'$id_empleado'");
        }

        header("location:".urlsite."?m=indexEmpleado");
    }

    static function editarEmpleado() {
        $id = $_REQUEST['id'];
        $empleado = new Modelo();
        $dato = $empleado->mostrar("EMPLEADO", "id_empleado=$id");
        require_once("vista/empleado/editar.php");
    }

    static function actualizarEmpleado() {
        $id = $_REQUEST['id'];
        $nombre = $_REQUEST['nombre'];
        $apellido = $_REQUEST['apellido'];
        $documento = $_REQUEST['documento'];
        $fech_nac = $_REQUEST['fech_nac'];
        $correo = $_REQUEST['correo'];
        $edad = $_REQUEST['edad'];

        $data = "nombre='$nombre', apellido='$apellido', documento='$documento', fech_nac='$fech_nac', correo='$correo', edad=$edad";

        $empleado = new Modelo();
        $empleado->actualizar("EMPLEADO", $data, "id_empleado=$id");
        header("location:".urlsite."?m=indexEmpleado");
    }

    static function eliminarEmpleado() {
        $id = $_REQUEST['id'];
        $empleado = new Modelo();
        $empleado->eliminar("EMPLEADO", "id_empleado=$id");
        header("location:".urlsite."?m=indexEmpleado");
    }
 
    // ------ CRUD DE CLASE ------
    static function indexClase() {
        $obj = new Modelo();
        $dato = $obj->mostrar("CLASE", "1");
        require_once("vista/clase/index.php");
    }

    static function nuevoClase() {
        require_once("vista/clase/nuevo.php");
    }

    static function guardarClase() {
        $clase = $_REQUEST['clase'];
        $precio_clase = $_REQUEST['precio_clase'];
        $servicios = $_REQUEST['servicios'];

        $columnas = "clase, precio_clase, servicios";
        $valores = "'$clase', $precio_clase, '$servicios'";

        $obj = new Modelo();
        $obj->insertar("CLASE", $columnas, $valores);

        header("location:" . urlsite . "?m=indexClase");
    }

    static function editarClase() {
        $id = $_REQUEST['id'];
        $obj = new Modelo();
        $dato = $obj->mostrar("CLASE", "id_clase=" . $id);
        require_once("vista/clase/editar.php");
    }

    static function actualizarClase() {
        $id = $_REQUEST['id'];
        $clase = $_REQUEST['clase'];
        $precio_clase = $_REQUEST['precio_clase'];
        $servicios = $_REQUEST['servicios'];

        $data = "clase='$clase', precio_clase=$precio_clase, servicios='$servicios'";

        $obj = new Modelo();
        $obj->actualizar("CLASE", $data, "id_clase=" . $id);

        header("location:" . urlsite . "?m=indexClase");
    }

    static function eliminarClase() {
        $id = $_REQUEST['id'];
        $obj = new Modelo();
        $obj->eliminar("CLASE", "id_clase=" . $id);

        header("location:" . urlsite . "?m=indexClase");
    }

        // ------ CRUD DE TRANSPORTE ------
    static function indexTransporte() {
        $obj = new Modelo();
        $dato = $obj->mostrar("TRANSPORTE", "1");
        require_once("vista/transporte/index.php");
    }

    static function nuevoTransporte() {
        $modelo = new Modelo();
        $clases = $modelo->mostrar("CLASE", "1");  // Para el select de clases
        require_once("vista/transporte/nuevo.php");
    }

    static function guardarTransporte() {
        $id_clase = $_REQUEST['id_clase'];
        $aforo = $_REQUEST['aforo'];

        $columnas = "id_clase, aforo";
        $valores = "$id_clase, $aforo";

        $obj = new Modelo();
        $obj->insertar("TRANSPORTE", $columnas, $valores);

        header("location:" . urlsite . "?m=indexTransporte");
    }

    static function editarTransporte() {
        $id = $_REQUEST['id'];
        $modelo = new Modelo();
        $dato = $modelo->mostrar("TRANSPORTE", "id_tran=" . $id);
        $clases = $modelo->mostrar("CLASE", "1");  // Para cambiar la clase
        require_once("vista/transporte/editar.php");
    }

    static function actualizarTransporte() {
        $id = $_REQUEST['id'];
        $id_clase = $_REQUEST['id_clase'];
        $aforo = $_REQUEST['aforo'];

        $data = "id_clase=$id_clase, aforo=$aforo";

        $obj = new Modelo();
        $obj->actualizar("TRANSPORTE", $data, "id_tran=" . $id);

        header("location:" . urlsite . "?m=indexTransporte");
    }

    static function eliminarTransporte() {
        $id = $_REQUEST['id'];
        $obj = new Modelo();
        $obj->eliminar("TRANSPORTE", "id_tran=" . $id);

        header("location:" . urlsite . "?m=indexTransporte");
    }

// ----- CRUD DE CONDUCE -----
    static function indexConduce() {
        $modelo = new Modelo();
        $dato = $modelo->consulta("SELECT C.id_empleado, E.nombre, E.apellido, C.id_tran 
                                FROM CONDUCE C 
                                JOIN EMPLEADO E ON C.id_empleado = E.id_empleado");
        require_once("vista/conduce/index.php");
    }

    static function nuevoConduce() {
        $modelo = new Modelo();
        $choferes = $modelo->consulta("SELECT CH.id_empleado, E.nombre, E.apellido 
                                    FROM CHOFER CH 
                                    JOIN EMPLEADO E ON CH.id_empleado = E.id_empleado");
        $transportes = $modelo->mostrar("TRANSPORTE", "1");
        require_once("vista/conduce/nuevo.php");
    }

    static function guardarConduce() {
        $id_empleado = $_REQUEST['id_empleado'];
        $id_tran = $_REQUEST['id_tran'];

        $columnas = "id_empleado, id_tran";
        $valores = "$id_empleado, $id_tran";

        $modelo = new Modelo();
        $modelo->insertar("CONDUCE", $columnas, $valores);

        header("location:" . urlsite . "?m=indexConduce");
    }

    static function eliminarConduce() {
        $id_empleado = $_REQUEST['id_empleado'];
        $id_tran = $_REQUEST['id_tran'];

        $modelo = new Modelo();
        $modelo->eliminar("CONDUCE", "id_empleado=$id_empleado AND id_tran=$id_tran");

        header("location:" . urlsite . "?m=indexConduce");
    }

        
    // ----- CRUD DE ATIENDE -----
    static function indexAtiende() {
        $modelo = new Modelo();
        $dato = $modelo->consulta("SELECT A.id_empleado, E.nombre, E.apellido, A.id_tran 
                                FROM ATIENDE A 
                                JOIN EMPLEADO E ON A.id_empleado = E.id_empleado");
        require_once("vista/atiende/index.php");
    }

    static function nuevoAtiende() {
        $modelo = new Modelo();

        // Obtener tripulantes con sus datos
        $tripulantes = $modelo->consulta("SELECT E.id_empleado, E.nombre, E.apellido
                                        FROM EMPLEADO E
                                        JOIN TRIPULANTE_DE_CABINA T ON E.id_empleado = T.id_empleado");

        // Obtener transportes
        $transportes = $modelo->mostrar("TRANSPORTE", "1");

        require_once("vista/atiende/nuevo.php");
    }

    static function guardarAtiende() {
        $id_empleado = $_REQUEST['id_empleado'];
        $id_tran = $_REQUEST['id_tran'];

        $columnas = "id_empleado, id_tran";
        $valores = "$id_empleado, $id_tran";

        $modelo = new Modelo();
        $modelo->insertar("ATIENDE", $columnas, $valores);

        header("location:" . urlsite . "?m=indexAtiende");
    }

    static function eliminarAtiende() {
        $id_empleado = $_REQUEST['id_empleado'];
        $id_tran = $_REQUEST['id_tran'];

        $modelo = new Modelo();
        $modelo->eliminar("ATIENDE", "id_empleado=$id_empleado AND id_tran=$id_tran");

        header("location:" . urlsite . "?m=indexAtiende");
    }


    // ----- CRUD de RUTA -----
    static function indexRuta() {
        $modelo = new Modelo();
        $dato = $modelo->mostrar("RUTA", "1");
        require_once("vista/ruta/index.php");
    }

    static function nuevoRuta() {
        require_once("vista/ruta/nuevo.php");
    }

    static function guardarRuta() {
        $ciudad_origen = $_REQUEST['ciudad_origen'];
        $ciudad_destino = $_REQUEST['ciudad_destino'];
        $estacion_origen = $_REQUEST['estacion_origen'];
        $estacion_destino = $_REQUEST['estacion_destino'];

        $columnas = "ciudad_origen, ciudad_destino, estacion_origen, estacion_destino";
        $valores = "'$ciudad_origen', '$ciudad_destino', '$estacion_origen', '$estacion_destino'";

        $modelo = new Modelo();
        $modelo->insertar("RUTA", $columnas, $valores);

        header("location:" . urlsite . "?m=indexRuta");
    }

    static function editarRuta() {
        $id = $_REQUEST['id'];
        $modelo = new Modelo();
        $dato = $modelo->mostrar("RUTA", "id_ruta = $id");
        require_once("vista/ruta/editar.php");
    }

    static function actualizarRuta() {
        $id = $_REQUEST['id'];
        $ciudad_origen = $_REQUEST['ciudad_origen'];
        $ciudad_destino = $_REQUEST['ciudad_destino'];
        $estacion_origen = $_REQUEST['estacion_origen'];
        $estacion_destino = $_REQUEST['estacion_destino'];

        $data = "ciudad_origen='$ciudad_origen', ciudad_destino='$ciudad_destino', 
                estacion_origen='$estacion_origen', estacion_destino='$estacion_destino'";

        $modelo = new Modelo();
        $modelo->actualizar("RUTA", $data, "id_ruta=$id");

        header("location:" . urlsite . "?m=indexRuta");
    }

    static function eliminarRuta() {
        $id = $_REQUEST['id'];
        $modelo = new Modelo();
        $modelo->eliminar("RUTA", "id_ruta=$id");

        header("location:" . urlsite . "?m=indexRuta");
    }


    // ----- CRUD de HORARIO -----
    static function indexHorario() {
        $modelo = new Modelo();
        $dato = $modelo->mostrar("HORARIO", "1");
        require_once("vista/horario/index.php");
    }

    static function nuevoHorario() {
        $modelo = new Modelo();
        $rutas = $modelo->mostrar("RUTA", "1");
        require_once("vista/horario/nuevo.php");
    }

    static function guardarHorario() {
        $tipo = $_REQUEST['tipo'];
        $fecha = $_REQUEST['fecha'];
        $hora_salida = $_REQUEST['hora_salida'];
        $hora_llegada = $_REQUEST['hora_llegada'];
        $id_ruta = $_REQUEST['id_ruta'];

        // Calcular la duración
        $duracion_viaje = self::calcularDuracion($hora_salida, $hora_llegada);

        $columnas = "tipo, fecha, hora_salida, hora_llegada, duracion_viaje, id_ruta";
        $valores = "'$tipo','$fecha','$hora_salida', '$hora_llegada', '$duracion_viaje', $id_ruta";

        $modelo = new Modelo();
        $modelo->insertar("HORARIO", $columnas, $valores);

        header("location:" . urlsite . "?m=indexHorario");
    }

    private static function calcularDuracion($salida, $llegada) {
        $horaSalida = new DateTime($salida);
        $horaLlegada = new DateTime($llegada);

        if ($horaLlegada < $horaSalida) {
            // Si la llegada es al día siguiente
            $horaLlegada->modify('+1 day');
        }

        $intervalo = $horaSalida->diff($horaLlegada);
        return $intervalo->format('%H:%I:%S');
    }


    static function editarHorario() {
        $id = $_REQUEST['id'];
        $modelo = new Modelo();
        $dato = $modelo->mostrar("HORARIO", "id_horario = $id");
        $rutas = $modelo->mostrar("RUTA", "1");
        require_once("vista/horario/editar.php");
    }

    static function actualizarHorario() {
        $id = $_REQUEST['id'];
        $tipo = $_REQUEST['tipo'];
        $fecha = $_REQUEST['fecha'];
        $hora_salida = $_REQUEST['hora_salida'];
        $hora_llegada = $_REQUEST['hora_llegada'];
        $id_ruta = $_REQUEST['id_ruta'];

        // Calcular la duración
        $duracion_viaje = self::calcularDuracion($hora_salida, $hora_llegada);

        $data = "tipo='$tipo',fecha='$fecha', hora_salida='$hora_salida', hora_llegada='$hora_llegada', 
                duracion_viaje='$duracion_viaje', id_ruta=$id_ruta";

        $modelo = new Modelo();
        $modelo->actualizar("HORARIO", $data, "id_horario=$id");

        header("location:" . urlsite . "?m=indexHorario");
    }

    static function eliminarHorario() {
        $id = $_REQUEST['id'];
        $modelo = new Modelo();
        $modelo->eliminar("HORARIO", "id_horario=$id");

        header("location:" . urlsite . "?m=indexHorario");
    }


    // ---------- CRUD TIENE ------------
    static function indexTiene() {
        $modelo = new Modelo();
        $dato = $modelo->mostrar("TIENE", "1");
        require_once("vista/tiene/index.php");
    }

    static function nuevoTiene() {
        $modelo = new Modelo();
        $transportes = $modelo->mostrar("TRANSPORTE", "1");
        $horarios = $modelo->mostrar("HORARIO", "1");
        require_once("vista/tiene/nuevo.php");
    }

    static function guardarTiene() {
        $id_tran = $_REQUEST['id_tran'];
        $id_horario = $_REQUEST['id_horario'];

        $columnas = "id_tran, id_horario";
        $valores = "$id_tran, $id_horario";

        $modelo = new Modelo();
        $modelo->insertar("TIENE", $columnas, $valores);
        header("location:" . urlsite . "?m=indexTiene");
    }

    static function eliminarTiene() {
        $id_tran = $_REQUEST['id_tran'];
        $id_horario = $_REQUEST['id_horario'];

        $modelo = new Modelo();
        $modelo->eliminar("TIENE", "id_tran=$id_tran AND id_horario=$id_horario");
        header("location:" . urlsite . "?m=indexTiene");
    }

    //RESERVAAAAAAAAAAAAAAAAA
    // Paso 1: Selección de ciudades, fechas y cantidad de pasajeros
    static function indexReserva() {
        require_once("vista/reserva/paso1.php");
    }

    // Paso 2: Mostrar horarios y transportes según ciudades seleccionadas
    static function paso2Reserva() {
        $_SESSION['reserva'] = array_merge($_SESSION['reserva'] ?? [], $_REQUEST);
        $modelo = new Modelo();

        $fase = $_REQUEST['fase'] ?? 'ida';
        $reserva = $_SESSION['reserva'];

        // Si se seleccionó en el POST algún transporte
        if (isset($_POST['seleccion'])) {
            list($id_horario, $id_transporte) = explode('-', $_POST['seleccion']);
            if ($fase === 'ida') {
                $_SESSION['reserva']['ida_horario'] = $id_horario;
                $_SESSION['reserva']['ida_transporte'] = $id_transporte;

                if ($reserva['tipo_viaje'] === 'ida_vuelta') {
                    // Redirigir a paso2 para la fase retorno
                    header("Location: index.php?m=paso2Reserva&fase=retorno");
                    exit;
                } else {
                    // Solo ida, continuar a paso3
                    header("Location: index.php?m=paso3Reserva");
                    exit;
                }
            } elseif ($fase === 'retorno') {
                $_SESSION['reserva']['retorno_horario'] = $id_horario;
                $_SESSION['reserva']['retorno_transporte'] = $id_transporte;

                header("Location: index.php?m=paso3Reserva");
                exit;
            }
        }

        // Determinar los datos según la fase
        $ciudad_origen = ($fase === 'ida') ? $reserva['ciudad_origen'] : $reserva['ciudad_destino'];
        $ciudad_destino = ($fase === 'ida') ? $reserva['ciudad_destino'] : $reserva['ciudad_origen'];
        $fecha = ($fase === 'ida') ? $reserva['fecha_salida'] : $reserva['fecha_retorno'];
        error_log("FASE: $fase | FECHA: $fecha");

        $rutas = $modelo->consulta("SELECT * FROM RUTA WHERE ciudad_origen = '$ciudad_origen' AND ciudad_destino = '$ciudad_destino'");

        $horarios = [];
        if (!empty($rutas)) {
            $ids_ruta = array_column($rutas, 'id_ruta');
            $ids_ruta_str = implode(',', $ids_ruta);

            $horarios = $modelo->consulta(
                "SELECT h.*, r.ciudad_origen, r.ciudad_destino, r.estacion_origen, r.estacion_destino
                FROM HORARIO h 
                JOIN RUTA r ON h.id_ruta = r.id_ruta 
                WHERE h.id_ruta IN ($ids_ruta_str) AND h.fecha = '$fecha'"
            );

            foreach ($horarios as &$horario) {
                $id_horario = $horario['id_horario'];

                $horario['transportes'] = $modelo->consulta(
                    "SELECT t.*, c.clase, c.servicios, c.precio_clase 
                    FROM TIENE ti
                    JOIN TRANSPORTE t ON ti.id_tran = t.id_tran
                    JOIN CLASE c ON t.id_clase = c.id_clase
                    WHERE ti.id_horario = $id_horario"
                );
            }
            unset($horario);
        }

        require_once("vista/reserva/paso2.php");
    }


    // Paso 3: Formulario para datos de pasajeros
    static function paso3Reserva() {
        $_SESSION['reserva'] = array_merge($_SESSION['reserva'], $_REQUEST);

        require_once("vista/reserva/paso3.php");
    }

    static function paso4Reserva() {
        $_SESSION['reserva'] = array_merge($_SESSION['reserva'], $_REQUEST);

        $contacto_compra = $_POST['contacto_compra'] ?? 'principal';
        $_SESSION['reserva']['contacto_compra'] = $contacto_compra;

        if ($contacto_compra === 'principal') {
            $_SESSION['reserva']['contacto_data'] = $_POST['pasajero'];

        } elseif (strpos($contacto_compra, 'adulto_') === 0) {
            $index = explode('_', $contacto_compra)[1];

            // Promover el adulto secundario seleccionado como principal
            $_SESSION['reserva']['pasajero'] = $_POST['pasajeros_secundarios']['adulto'][$index] ?? null;

            // Agregar el pasajero principal anterior como secundario adulto
            $nextIndex = count($_POST['pasajeros_secundarios']['adulto']) + 1;
            $_POST['pasajeros_secundarios']['adulto'][$nextIndex] = $_POST['pasajero'];

            // Eliminar el contacto de compra de los pasajeros secundarios
            unset($_POST['pasajeros_secundarios']['adulto'][$index]);

            $_SESSION['reserva']['contacto_data'] = $_SESSION['reserva']['pasajero'];
        } else {
            $_SESSION['reserva']['contacto_data'] = null;
        }

        // Guardamos la lista actualizada de pasajeros secundarios
        $_SESSION['reserva']['pasajeros_secundarios'] = $_POST['pasajeros_secundarios'] ?? [];

        require_once("vista/reserva/paso4.php");
    }


    // Guardar todo en la base de datos
        public function confirmarReserva() {
        $reserva = $_SESSION['reserva'] ?? null;

        if (!$reserva) {
            header("Location: index.php?m=paso1Reserva");
            exit;
        }

        $modelo = new Modelo();
        $metodo_pago = $_POST['metodo_pago'];
        $reserva['metodo_pago'] = $metodo_pago;
        $_SESSION['reserva'] = $reserva;

        // === 1. Insertar contacto de compra en PASAJERO ===
        $contacto = $reserva['contacto_data'];
        $columnas = "nombres, apellidos, genero, tipo_documento, numero_documento, telefono, nacionalidad, fech_nac, email, contacto_compra";
        $valores = "'{$contacto['nombres']}', '{$contacto['apellidos']}', '{$contacto['genero']}', '{$contacto['tipo_documento']}', 
                    '{$contacto['numero_documento']}', '{$contacto['telefono']}', '{$contacto['nacionalidad']}', 
                    '{$contacto['fech_nac']}', '{$contacto['email']}', 1";
        $modelo->insertar("PASAJERO", $columnas, $valores);
        $id_contacto = $modelo->getLastId();

        // === 2. Insertar en PASAJERO_CORRIENTE o PASAJERO_EMPRESA ===
        if (!empty($contacto['empresa'])) {
            $empresa = $contacto['empresa'];
            $columnas = "id_pasajero, RUC, direccion, razonSocial";
            $valores = "$id_contacto, '{$empresa['ruc']}', '{$empresa['direccion']}', '{$empresa['razon_social']}'";
            $modelo->insertar("PASAJERO_EMPRESA", $columnas, $valores);
        } else {
            $modelo->insertar("PASAJERO_CORRIENTE", "id_pasajero", "$id_contacto");
        }

        // === 3. Insertar el pago en PAGO ===
        $fecha_pago = date('Y-m-d');
        $columnas = "metodo_pago, fecha_pago, monto";
        $valores = "'$metodo_pago', '$fecha_pago', {$reserva['monto_total']}";
        $modelo->insertar("PAGO", $columnas, $valores);
        $id_pago = $modelo->getLastId();

        // === 4. Insertar la RESERVA ===
        $fecha_reserva = date('Y-m-d');
        $fecha_retorno = !empty($reserva['fecha_retorno']) ? "'{$reserva['fecha_retorno']}'" : "NULL";

        $id_horario_ida = $reserva['ida_horario'];
        $id_horario_retorno = ($reserva['tipo_viaje'] === 'ida_vuelta' && !empty($reserva['retorno_horario'])) ? $reserva['retorno_horario'] : "NULL";

        $columnas = "tipo_viaje, tipo_transporte, fecha_reserva, fecha_salida, fecha_retorno, id_pasajero, id_horario_ida, id_horario_retorno, id_pago";
        $valores = "'{$reserva['tipo_viaje']}', 'Tren', '$fecha_reserva', '{$reserva['fecha_salida']}', $fecha_retorno,
                    $id_contacto, $id_horario_ida, $id_horario_retorno, $id_pago";
        $modelo->insertar("RESERVA", $columnas, $valores);
        $id_reserva = $modelo->getLastId();

        $contacto_compra = $_SESSION['reserva']['contacto_compra'] ?? 'principal';

        // === 5. Insertar PASAJEROS_SECUNDARIOS ===
        foreach ($reserva['pasajeros_secundarios'] as $tipo => $grupo) {
            foreach ($grupo as $index => $ps) {

                // Construir el identificador del pasajero solo si es adulto
                if ($tipo === 'adulto') {
                    $identificador = "adulto_{$index}";
                    if ($identificador === $contacto_compra) {
                        continue; // Saltamos este adulto porque ya se guardó en PASAJERO
                    }
                }

                // Insertar en PASAJEROS_SECUNDARIOS
                $modelo->insertar("PASAJEROS_SECUNDARIOS", "id_reserva", "$id_reserva");
                $id_ps = $modelo->getLastId();

                if ($tipo == 'adulto') {
                    $columnas = "id_pasajerosec, nombres, apellidos, genero, tipo_documento, numero_documento, nacionalidad, fech_nac, contacto_compra";
                    $valores = "$id_ps, '{$ps['nombres']}', '{$ps['apellidos']}', '{$ps['genero']}', '{$ps['tipo_documento']}', 
                                '{$ps['numero_documento']}', '{$ps['nacionalidad']}', '{$ps['fech_nac']}', 0";
                    $modelo->insertar("PS_ADULTO", $columnas, $valores);

                } elseif ($tipo == 'nino') {
                    $columnas = "id_pasajerosec, nombres, apellidos, genero, tipo_documento, numero_documento, nacionalidad, fech_nac";
                    $valores = "$id_ps, '{$ps['nombres']}', '{$ps['apellidos']}', '{$ps['genero']}', '{$ps['tipo_documento']}', 
                                '{$ps['numero_documento']}', '{$ps['nacionalidad']}', '{$ps['fech_nac']}'";
                    $modelo->insertar("PS_NIÑO", $columnas, $valores);

                } elseif ($tipo == 'infante') {
                    $columnas = "id_pasajerosec, resposable";
                    $valores = "$id_ps, '{$ps['responsable']}'";
                    $modelo->insertar("PS_INFANTE", $columnas, $valores);
                }
            }
        }

        // Limpiar la sesión de reserva
        unset($_SESSION['reserva']);

        // Mensaje y redirección a la landing
        echo "<script>
            alert('¡Reserva realizada con éxito!');
            window.location.href = 'index.php'; // Redirige a la landing page
        </script>";
        exit;
    }
}
?>
