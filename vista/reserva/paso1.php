<?php require_once("vista/layout/header.php") ?>
<link rel="stylesheet" href="/proyectobd/vista/reserva/css/paso1.css">

<h1>Realizar Reserva - Paso 1</h1>

<div class="pasos">
  <div class="paso active" data-step="1">Búsqueda</div>
  <div class="paso" data-step="2">Trenes</div>
  <div class="paso" data-step="3">Datos de Pasajeros</div>
  <div class="paso" data-step="4">Confirmación y Pago</div>
</div>


<form method="post" action="index.php?m=paso2Reserva">
    <label>Tipo de Viaje:</label><br>
    <select name="tipo_viaje" id="tipo_viaje" required onchange="toggleRetorno()">
        <option value="solo_ida">Solo ida</option>
        <option value="ida_vuelta">Ida y retorno</option>
    </select><br><br>

<label>Ciudad Origen:</label><br>
<select name="ciudad_origen" id="ciudad_origen" required>
    <option value="" disabled selected>Seleccione ciudad de origen</option>
    <optgroup label="Cusco">
        <option value="Cusco">Cusco</option>
        <option value="Urubamba">Urubamba</option>
        <option value="Ollantaytambo">Ollantaytambo</option>
        <option value="Machu Picchu">Machu Picchu</option>
        <option value="Hidroelectrica">Hidroelectrica</option>
    </optgroup>
    <optgroup label="Puno">
        <option value="Puno">Puno</option>
    </optgroup>
    <optgroup label="Arequipa">
        <option value="Arequipa">Arequipa</option>
    </optgroup>
</select><br><br>

    <label>Ciudad Destino:</label><br>
    <select name="ciudad_destino" id="ciudad_destino" required>
        <option value="" disabled selected>Seleccione ciudad de destino</option>
    </select>

    <script>
    // Mapeo de ciudades destino por ciudad origen
    const destinosPorOrigen = {
        "Cusco": ["Urubamba", "Ollantaytambo", "Machu Picchu", "Hidroelectrica"],
        "Urubamba": [ "Machu Picchu"],
        "Ollantaytambo": ["Machu Picchu"],
        "Machu Picchu": ["Cusco", "Urubamba", "Ollantaytambo", "Hidroelectrica"],
        "Hidroelectrica": ["Machu Picchu"],

        "Puno": ["Arequipa", "Cusco"],

        "Arequipa": ["Cusco", "Puno"]
    };

    document.getElementById('ciudad_origen').addEventListener('change', function () {
        const ciudadOrigen = this.value;
        const selectDestino = document.getElementById('ciudad_destino');

        // Limpiar opciones anteriores
        selectDestino.innerHTML = '<option value="" disabled selected>Seleccione ciudad de destino</option>';

        // Obtener destinos posibles
        const destinos = destinosPorOrigen[ciudadOrigen] || [];

        // Agregar opciones al select destino
        destinos.forEach(ciudad => {
            const option = document.createElement('option');
            option.value = ciudad;
            option.textContent = ciudad;
            selectDestino.appendChild(option);
        });
    });
    </script>


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

   <div class="botones-form">
        <a href="index.php?m=menuCliente" class="boton-volver">Volver</a>
        <input type="submit" value="Siguiente" class="boton-amarillo">
    </div>
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
