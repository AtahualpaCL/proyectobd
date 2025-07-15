<?php require_once("vista/layout/header.php") ?>
<link rel="stylesheet" href="/proyectobd/vista/ruta/css/nuevo.css">

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

    <div class="botones-form">
        <input type="submit" value="Guardar" class="boton-guardar">
        <button type="button" onclick="window.location.href='index.php?m=indexRuta'" class="boton-volver">Cancelar</button>
    </div>
    <input type="hidden" name="m" value="guardarRuta">
</form>
<?php require_once("vista/layout/footer.php") ?>