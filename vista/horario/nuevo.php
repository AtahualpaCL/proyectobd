<?php require_once("vista/layout/header.php") ?>
<link rel="stylesheet" href="/proyectobd/vista/horario/css/nuevo.css">

<h1>Nuevo Horario</h1>
<form method="get" action="">
    <label>Tipo:</label><br>
    <input type="text" name="tipo" required><br>

    <label>Fecha:</label><br>
    <input type="date" name="fecha" required><br>

    <label>Hora Salida:</label><br>
    <input type="time" name="hora_salida" required><br>

    <label>Hora Llegada:</label><br>
    <input type="time" name="hora_llegada" required><br>

    <label>Ruta:</label><br>
    <select name="id_ruta" required>
        <option value="" disabled selected>Seleccione una ruta</option>
        <?php foreach ($rutas as $r): ?>
            <option value="<?= $r['id_ruta'] ?>">
                <?= $r['estacion_origen'] ?> - <?= $r['estacion_destino'] ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <div class="botones-form">
        <input type="submit" value="Guardar" class="boton-guardar">
        <button type="button" onclick="window.location.href='index.php?m=indexHorario'" class="boton-volver">Cancelar</button>
    </div>
    <input type="hidden" name="m" value="guardarHorario">
</form>
<?php require_once("vista/layout/footer.php") ?>