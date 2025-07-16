<?php require_once("vista/layout/header.php") ?>

<h1>Realizar Reserva - Paso 1</h1>

<form method="post" action="index.php?m=paso2Reserva">
    <label>Tipo de Viaje:</label><br>
    <select name="tipo_viaje" id="tipo_viaje" required onchange="toggleRetorno()">
        <option value="solo_ida">Solo ida</option>
        <option value="ida_vuelta">Ida y retorno</option>
    </select><br><br>

    <label>Ciudad Origen:</label><br>
    <select name="ciudad_origen" required>
        <option value="" disabled selected>Seleccione ciudad de origen</option>
        <option value="Cusco">Cusco</option>
        <option value="Puno">Puno</option>
        <option value="Arequipa">Arequipa</option>
        <option value="Lima">Lima</option>
    </select><br><br>

    <label>Ciudad Destino:</label><br>
    <select name="ciudad_destino" required>
        <option value="" disabled selected>Seleccione ciudad de destino</option>
        <option value="Cusco">Cusco</option>
        <option value="Puno">Puno</option>
        <option value="Arequipa">Arequipa</option>
        <option value="Machu Picchu">Machu Picchu</option>
    </select><br><br>

    <label>Fecha de salida:</label><br>
    <input type="date" name="fecha_salida" required><br><br>

    <label>Fecha de retorno:</label><br>
    <input type="date" name="fecha_retorno" id="fecha_retorno"><br><br>

    <label>Adultos:</label><br>
    <input type="number" name="cant_adultos" min="0" value="1" required><br><br>

    <label>Niños:</label><br>
    <input type="number" name="cant_ninos" min="0" value="0"><br><br>

    <label>Infantes:</label><br>
    <input type="number" name="cant_infantes" min="0" value="0"><br><br>

    <input type="submit" value="Siguiente">
</form>

<script>
function toggleRetorno() {
    const tipoViaje = document.getElementById('tipo_viaje').value;
    const fechaRetorno = document.getElementById('fecha_retorno');

    if (tipoViaje === 'solo_ida') {
        fechaRetorno.disabled = true;
        fechaRetorno.value = '';
    } else {
        fechaRetorno.disabled = false;
    }
}

// Inicializar el estado al cargar la página
document.addEventListener('DOMContentLoaded', toggleRetorno);
</script>

<?php require_once("vista/layout/footer.php") ?>
