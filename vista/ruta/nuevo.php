<?php require_once("vista/layout/header.php") ?>
<h1>Nueva Ruta</h1>
<form method="get" action="">
    <label>Ciudad Origen:</label><br>
    <input type="text" name="ciudad_origen" required><br>

    <label>Ciudad Destino:</label><br>
    <input type="text" name="ciudad_destino" required><br>

    <label>Estación Origen:</label><br>
    <input type="text" name="estacion_origen" required><br>

    <label>Estación Destino:</label><br>
    <input type="text" name="estacion_destino" required><br>

    <input type="submit" value="Guardar">
    <input type="hidden" name="m" value="guardarRuta">
</form>
<?php require_once("vista/layout/footer.php") ?>