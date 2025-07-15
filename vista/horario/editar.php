<?php require_once("vista/layout/header.php") ?>
<h1>Editar Horario</h1>
<form method="post" action="">
    <?php foreach($dato as $d): ?>
        <input type="hidden" name="id" value="<?= $d['id_horario'] ?>">

        <label>Tipo:</label><br>
        <input type="text" name="tipo" value="<?= $d['tipo'] ?>" required><br>

        <label>Hora Salida:</label><br>
        <input type="time" name="hora_salida" value="<?= $d['hora_salida'] ?>" required><br>

        <label>Hora Llegada:</label><br>
        <input type="time" name="hora_llegada" value="<?= $d['hora_llegada'] ?>" required><br>

        <label>Ruta:</label><br>
        <select name="id_ruta" required>
            <?php foreach($rutas as $grupo): ?>
                <?php foreach($grupo as $r): ?>
                    <option value="<?= $r['id_ruta'] ?>" <?= $r['id_ruta'] == $d['id_ruta'] ? 'selected' : '' ?>>
                        <?= $r['ciudad_origen'] ?> - <?= $r['ciudad_destino'] ?>
                    </option>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </select><br>

    <?php endforeach; ?>

    <input type="submit" value="Actualizar">
    <input type="hidden" name="m" value="actualizarHorario">
</form>
<?php require_once("vista/layout/footer.php") ?>