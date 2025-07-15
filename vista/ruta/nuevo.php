<?php require_once("vista/layout/header.php") ?>
<link rel="stylesheet" href="/proyectobd/vista/ruta/css/nuevo.css">

<h1>Nueva Ruta</h1>
<form method="get" action="">
    <label>Ciudad Origen:</label><br>
    <select name="ciudad_origen" required>
        <option value="" disabled selected>Seleccione ciudad origen</option>
        <option value="Cusco">Cusco</option>
        <option value="Ollantaytambo">Ollantaytambo</option>
        <option value="Machu Picchu">Machu Picchu</option>
        <option value="Urubamba">Urubamba</option>
    </select><br>

    <label>Ciudad Destino:</label><br>
    <select name="ciudad_destino" required>
        <option value="" disabled selected>Seleccione ciudad destino</option>
        <option value="Cusco">Cusco</option>
        <option value="Ollantaytambo">Ollantaytambo</option>
        <option value="Machu Picchu">Machu Picchu</option>
        <option value="Urubamba">Urubamba</option>
    </select><br>

    <label>Estación Origen:</label><br>
    <select name="estacion_origen" required>
        <option value="" disabled selected>Seleccione estación origen</option>
        <option value="Estación Wanchaq">Estación Wanchaq</option>
        <option value="Estación Poroy">Estación Poroy</option>
        <option value="Estación Ollantaytambo">Estación Ollantaytambo</option>
        <option value="Estación Machu Picchu">Estación Machu Picchu</option>
    </select><br>

    <label>Estación Destino:</label><br>
    <select name="estacion_destino" required>
        <option value="" disabled selected>Seleccione estación destino</option>
        <option value="Estación Wanchaq">Estación Wanchaq</option>
        <option value="Estación Poroy">Estación Poroy</option>
        <option value="Estación Ollantaytambo">Estación Ollantaytambo</option>
        <option value="Estación Machu Picchu">Estación Machu Picchu</option>
    </select><br>

    <div class="botones-form">
        <input type="submit" value="Guardar" class="boton-guardar">
        <button type="button" onclick="window.location.href='index.php?m=indexRuta'" class="boton-volver">Cancelar</button>
    </div>
    <input type="hidden" name="m" value="guardarRuta">
</form>
<?php require_once("vista/layout/footer.php") ?>
