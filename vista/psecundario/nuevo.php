<?php require_once("vista/layout/header.php") ?>

<h1>Nuevo Pasajero Secundario</h1>

<form action="" method="get">
    <label>ID Reserva:</label><br>
    <input type="number" name="id_reserva" required><br><br>

    <label>Tipo de Pasajero Secundario:</label><br>
    <select name="tipo_secundario" id="tipo_secundario" required onchange="mostrarCampos()">
        <option value="">Seleccione tipo</option>
        <option value="adulto">Adulto</option>
        <option value="niño">Niño</option>
        <option value="infante">Infante</option>
    </select><br><br>

    <div id="datosComunes" style="display:none;">
        <label>Nombres:</label><br>
        <input type="text" name="nombres"><br>

        <label>Apellidos:</label><br>
        <input type="text" name="apellidos"><br>

        <label>Género:</label><br>
        <input type="radio" name="genero" value="M"> Masculino
        <input type="radio" name="genero" value="F"> Femenino<br>

        <label>Tipo Documento:</label><br>
        <select name="tipo_documento">
            <option value="">Seleccione</option>
            <option value="DNI">DNI</option>
            <option value="PAS">Pasaporte</option>
            <option value="CE">Carnet de Extranjería</option>
        </select><br>

        <label>Número de Documento:</label><br>
        <input type="text" name="numero_documento"><br>

        <label>Nacionalidad:</label><br>
        <input type="text" name="nacionalidad"><br>

        <label>Fecha Nacimiento:</label><br>
        <input type="date" name="fech_nac"><br>
    </div>

    <div id="contactoCompra" style="display:none;">
        <label>¿Es contacto de compra?</label><br>
        <input type="checkbox" name="contacto_compra" value="1"><br>
    </div>

    <div id="responsableInfante" style="display:none;">
        <label>Responsable:</label><br>
        <input type="text" name="responsable"><br>
    </div>

    <input type="hidden" name="m" value="guardarPasajeroSecundario">
    <input type="submit" value="Guardar">
</form>

<script>
function mostrarCampos() {
    var tipo = document.getElementById('tipo_secundario').value;
    document.getElementById('datosComunes').style.display = (tipo === 'adulto' || tipo === 'niño') ? 'block' : 'none';
    document.getElementById('contactoCompra').style.display = (tipo === 'adulto') ? 'block' : 'none';
    document.getElementById('responsableInfante').style.display = (tipo === 'infante') ? 'block' : 'none';
}
</script>

<?php require_once("vista/layout/footer.php") ?>
