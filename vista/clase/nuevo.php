<?php require_once("vista/layout/header.php") ?>

<h1>Nueva Clase</h1>
<form method="get" action="">
    <label>Clase:</label><br>
    <input type="text" name="clase" required><br>

    <label>Precio:</label><br>
    <input type="number" step="0.01" name="precio_clase" required><br>

    <label>Servicios:</label><br>
    <input type="text" name="servicios"><br>

    <input type="submit" value="Guardar">
    <input type="hidden" name="m" value="guardarClase">
</form>

<?php require_once("vista/layout/footer.php") ?>
