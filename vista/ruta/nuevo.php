<?php require_once("vista/layout/header.php") ?>
<link rel="stylesheet" href="/proyectobd/vista/ruta/css/nuevo.css">

<h1>Nueva Ruta</h1>
<form method="get" action="">
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

    <label>Estación Origen:</label><br>
    <select name="estacion_origen" id="estacion_origen" required>
        <option value="" disabled selected>Seleccione estación de origen</option>
    </select><br><br>

    <label>Estación Destino:</label><br>
    <select name="estacion_destino" id="estacion_destino" required>
        <option value="" disabled selected>Seleccione estación de destino</option>
    </select><br><br>

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
    const estacionesPorCiudad = {
        "Cusco": ["Wanchaq", "San Pedro", "Poroy"],
        "Urubamba": ["Urubamba"],
        "Ollantaytambo": ["Ollantaytambo"],
        "Machu Picchu": ["Machu Picchu"],
        "Hidroelectrica": ["Hidroeléctrica"],
        "Puno": ["Puno"]    
    };

            // Actualizar ciudades destino
        function actualizarDestinos(ciudadOrigen) {
            const destinoSelect = document.getElementById('ciudad_destino');
            destinoSelect.innerHTML = '<option value="" disabled selected>Seleccione ciudad de destino</option>';

            const destinos = destinosPorOrigen[ciudadOrigen] || [];
            destinos.forEach(dest => {
                const option = document.createElement('option');
                option.value = dest;
                option.textContent = dest;
                destinoSelect.appendChild(option);
            });
        }

        // Actualizar estaciones según ciudad
        function actualizarEstaciones(ciudad, selectId) {
            const estacionSelect = document.getElementById(selectId);
            estacionSelect.innerHTML = '<option value="" disabled selected>Seleccione estación</option>';

            const estaciones = estacionesPorCiudad[ciudad] || [];
            estaciones.forEach(est => {
                const option = document.createElement('option');
                option.value = est;
                option.textContent = est;
                estacionSelect.appendChild(option);
            });
        }

        // Eventos
        document.getElementById('ciudad_origen').addEventListener('change', function () {
            const ciudadOrigen = this.value;
            actualizarDestinos(ciudadOrigen);
            actualizarEstaciones(ciudadOrigen, 'estacion_origen');

            // Limpiar ciudad destino y estación destino cuando cambia el origen
            document.getElementById('ciudad_destino').value = '';
            document.getElementById('estacion_destino').innerHTML = '<option value="" disabled selected>Seleccione estación de destino</option>';
        });

        document.getElementById('ciudad_destino').addEventListener('change', function () {
            const ciudadDestino = this.value;
            actualizarEstaciones(ciudadDestino, 'estacion_destino');
        });
        </script>

    <div class="botones-form">
        <input type="submit" value="Guardar" class="boton-guardar">
        <button type="button" onclick="window.location.href='index.php?m=indexRuta'" class="boton-volver">Cancelar</button>
    </div>
    <input type="hidden" name="m" value="guardarRuta">
</form>
<?php require_once("vista/layout/footer.php") ?>
