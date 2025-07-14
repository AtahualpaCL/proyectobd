<?php require_once("vista/layout/header.php") ?>

<h1>Nuevo Empleado</h1>

<form action="" method="get">
    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br>

    <label>Apellido:</label><br>
    <input type="text" name="apellido" required><br>

    <label>Documento:</label><br>
    <input type="text" name="documento" required><br>

    <label>Fecha de Nacimiento:</label><br>
    <input type="date" name="fech_nac" required><br>

    <label>Correo:</label><br>
    <input type="email" name="correo"><br>

    <label>Edad:</label><br>
    <input type="number" name="edad"><br>

    <label>Rol:</label><br>
    <select name="rol" id="rol" required onchange="mostrarCampos()">
        <option value="" disabled selected>Seleccione un rol</option>
        <option value="asesor">Asesor</option>
        <option value="chofer">Chofer</option>
        <option value="tripulante">Tripulante de Cabina</option>
    </select><br><br>

    <div id="camposRol"></div>

    <input type="submit" value="Guardar">
    <input type="hidden" name="m" value="guardarEmpleado">
</form>

<script>
function mostrarCampos() {
    const rol = document.getElementById('rol').value;
    let campos = '';

    if (rol === 'asesor') {
        campos += '<label>Estación de Trabajo:</label><br>';
        campos += '<input type="text" name="estacion" required><br>';
    } else if (rol === 'chofer') {
        campos += '<label>Licencia:</label><br>';
        campos += '<input type="text" name="licencia" required><br>';
    } else if (rol === 'tripulante') {
        campos += '<p>Sin campos adicionales para tripulante.</p>';
    }

    document.getElementById('camposRol').innerHTML = campos;
}
</script>

<?php require_once("vista/layout/footer.php") ?>
