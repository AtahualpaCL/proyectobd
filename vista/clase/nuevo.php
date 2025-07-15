<?php require_once("vista/layout/header.php") ?>
<link rel="stylesheet" href="/proyectobd/vista/clase/css/nuevo.css">

<h1>Nueva Clase</h1>
<form method="get" action="">
    <label>Clase:</label><br>
    <select name="clase" required>
        <option value="" disabled selected>Seleccione una clase</option>
        <option value="PeruRail Expedition">PeruRail Expedition</option>
        <option value="PeruRail Vistadome">PeruRail Vistadome</option>
        <option value="PeruRail Vistadome Observatory">PeruRail Vistadome Observatory</option>
        <option value="Hiram Bingham">Hiram Bingham</option>
    </select><br>
    
    <label>Precio:</label><br>
    <input type="number" step="0.01" name="precio_clase" required><br>

    <label>Servicios:</label><br>
    <input type="text" name="servicios"><br>

    <input type="submit" value="Guardar">
    <input type="hidden" name="m" value="guardarClase">
</form>

<?php require_once("vista/layout/footer.php") ?>
