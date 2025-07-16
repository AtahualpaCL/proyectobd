<?php require_once("vista/layout/header.php") ?>
<link rel="stylesheet" href="/proyectobd/vista/horario/css/editar.css">

<h1>Editar Horario</h1>
<form method="get" action="">
    <?php foreach($dato as $d): ?>
        <input type="hidden" name="id" value="<?= $d['id_horario'] ?>">

        <label>Tipo:</label><br>
        <input type="text" name="tipo" value="<?= $d['tipo'] ?>" required><br>
        <label>Fecha:</label><br>
        <input type="date" name="fecha" value="<?= $d['fecha'] ?>" required><br>

        <label>Hora Salida:</label><br>
        <input type="time" name="hora_salida" value="<?= $d['hora_salida'] ?>" required><br>

        <label>Hora Llegada:</label><br>
        <input type="time" name="hora_llegada" value="<?= $d['hora_llegada'] ?>" required><br>

        <label>Ruta:</label><br>
        <select name="id_ruta" required>
            <?php foreach($rutas as $r): ?>
                    <option value="<?= $r['id_ruta'] ?>" <?= $r['id_ruta'] == $d['id_ruta'] ? 'selected' : '' ?>>
                        <?= $r['ciudad_origen'] ?> - <?= $r['ciudad_destino'] ?>
                    </option>
            <?php endforeach; ?>
        </select><br>

    <?php endforeach; ?>

    <div class="botones-form">
        <input type="submit" value="Guardar" class="boton-guardar">
        <button type="button" onclick="window.location.href='index.php?m=indexHorario'" class="boton-volver">Cancelar</button>
    </div>
    <input type="hidden" name="m" value="actualizarHorario">
</form>
<?php require_once("vista/layout/footer.php") ?>