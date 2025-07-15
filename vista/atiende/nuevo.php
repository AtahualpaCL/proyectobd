<?php require_once("vista/layout/header.php") ?>
<link rel="stylesheet" href="/proyectobd/vista/atiende/css/nuevo.css">

<h1>Asignar Tripulante a Transporte</h1>

<form method="get" action="">
    <input type="hidden" name="m" value="guardarAtiende">

    <label>Tripulante:</label><br>
    <select name="id_empleado" required>
        <option value="" disabled selected>Seleccione un tripulante</option>
        <?php foreach ($tripulantes as $t): ?>
            <option value="<?= $t['id_empleado'] ?>">
                <?= $t['nombre'] . ' ' . $t['apellido'] ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Transporte:</label><br>
    <select name="id_tran" required>
        <option value="" disabled selected>Seleccione un transporte</option>
        <?php foreach ($transportes as $tran): ?>
            <option value="<?= $tran['id_tran'] ?>">
                Transporte <?= $tran['id_tran'] ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <div class="botones-form">
        <input type="submit" value="Guardar" class="boton-guardar">
        <button type="button" onclick="window.location.href='index.php?m=indexAtiende'" class="boton-volver">Cancelar</button>
    </div>
</form>

<?php require_once("vista/layout/footer.php") ?>
