<?php require_once("vista/layout/header.php") ?>

<h1>Asignar Tripulante a Transporte</h1>

<form method="get" action="">
    <label>Tripulante:</label><br>
    <select name="id_empleado" required>
        <option value="" disabled selected>Seleccione un tripulante</option>
        <?php foreach ($tripulantes as $t): ?>
            <option value="<?= $t['id_empleado'] ?>"><?= $t['nombre'] . ' ' . $t['apellido'] ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Transporte:</label><br>
    <select name="id_tran" required>
        <option value="" disabled selected>Seleccione un transporte</option>
        <?php foreach ($transportes as $tran): ?>
            <option value="<?= $tran['id_tran'] ?>">Transporte <?= $tran['id_tran'] ?></option>
        <?php endforeach; ?>
    </select>
    </select><br><br>

    <input type="submit" value="Guardar">
    <input type="hidden" name="m" value="guardarAtiende">
</form>


<?php require_once("vista/layout/footer.php") ?>
