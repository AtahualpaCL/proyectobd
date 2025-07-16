<?php require_once("vista/layout/header.php"); ?>
<link rel="stylesheet" href="/proyectobd/vista/tiene/css/nuevo.css">

<h1>Asignar Transporte a Horario</h1>

<form method="get" action="">
    <label>Transporte:</label><br>
    <select name="id_tran" required>
        <option value="" disabled selected>Seleccione un transporte</option>
        <?php foreach ($transportes as $t): ?>
            <option value="<?= $t['id_tran'] ?>">ID <?= $t['id_tran'] ?> - Clase <?= $t['id_clase'] ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Horario:</label><br>
    <select name="id_horario" required>
        <option value="" disabled selected>Seleccione un horario</option>
        <?php foreach ($horarios as $h): ?>
            <option value="<?= $h['id_horario'] ?>">ID <?= $h['id_horario'] ?> - <?= $h['hora_salida'] ?> a <?= $h['hora_llegada'] ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <div class="botones-form">
        <input type="submit" value="Guardar" class="boton-guardar">
        <button type="button" onclick="window.location.href='index.php?m=indexTiene'" class="boton-volver">Cancelar</button>
    </div>
    <input type="hidden" name="m" value="guardarTiene">
</form>

<?php require_once("vista/layout/footer.php"); ?>
