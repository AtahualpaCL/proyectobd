<?php require_once("vista/layout/header.php") ?>
<link rel="stylesheet" href="/proyectobd/vista/conduce/css/nuevo.css">

<h1>Asignar Chofer a Transporte</h1>

<form method="get" action="">
    <label>Chofer:</label><br>
    <select name="id_empleado" required>
        <option value="" disabled selected>Seleccione un chofer</option>
        <?php foreach ($choferes as $c): ?>
            <option value="<?= $c['id_empleado'] ?>"><?= $c['nombre'] . ' ' . $c['apellido'] ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Transporte:</label><br>
    <select name="id_tran" required>
        <option value="" disabled selected>Seleccione un transporte</option>
        <?php foreach ($transportes as $tran): ?>
            <option value="<?= $tran['id_tran'] ?>">Transporte <?= $tran['id_tran'] ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <div class="botones-form">
        <input type="submit" value="Guardar" class="boton-guardar">
        <button type="button" onclick="window.location.href='index.php?m=indexConduce'" class="boton-volver">Cancelar</button>
    </div>
    <input type="hidden" name="m" value="guardarConduce">
</form>
<br>

<?php require_once("vista/layout/footer.php") ?>
