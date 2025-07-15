<?php require_once("vista/layout/header.php") ?>
<link rel="stylesheet" href="/proyectobd/vista/empleado/css/nuevo.css">

<h1 class="titulo-form">Nuevo Empleado</h1>

<form action="" method="get" class="formulario-empleado">
    <label>Nombre:</label>
    <input type="text" name="nombre" required>

    <label>Apellido:</label>
    <input type="text" name="apellido" required>

    <label>Documento:</label>
    <input type="text" name="documento" required>

    <label>Fecha de Nacimiento:</label>
    <input type="date" name="fech_nac" required>

    <label>Correo:</label>
    <input type="email" name="correo">

    <label>Edad:</label>
    <input type="number" name="edad">

    <label>Rol:</label>
    <select name="rol" id="rol" required onchange="mostrarCampos()">
        <option value="" disabled selected>Seleccione un rol</option>
        <option value="asesor">Asesor</option>
        <option value="chofer">Chofer</option>
        <option value="tripulante">Tripulante de Cabina</option>
    </select>

    <div id="camposRol" class="campos-rol"></div>

    <div class="botones-form">
        <input type="submit" value="Guardar" class="boton-guardar">
        <a href="index.php?m=indexEmpleado" class="boton-volver">Cancelar</a>
    </div>

    <input type="hidden" name="m" value="guardarEmpleado">
</form>

<script>
function mostrarCampos() {
    const rol = document.getElementById('rol').value;
    let campos = '';

    if (rol === 'asesor') {
        campos += '<label>Estación de Trabajo:</label>';
        campos += '<input type="text" name="estacion" required>';
    } else if (rol === 'chofer') {
        campos += '<label>Licencia:</label>';
        campos += '<input type="text" name="licencia" required>';
    } else if (rol === 'tripulante') {
        campos += '<p class="mensaje-tripulante">Sin campos adicionales para tripulante.</p>';
    }

    document.getElementById('camposRol').innerHTML = campos;
}
</script>

<?php require_once("vista/layout/footer.php") ?>
