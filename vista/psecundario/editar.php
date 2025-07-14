<?php require_once("vista/layout/header.php") ?>

<h1>Editar Pasajero Secundario</h1>
<form action="" method="get">
    <?php foreach($dato as $value): foreach($value as $v): ?>
        <input type="hidden" name="id" value="<?= $v['id_psecundario'] ?>">
        <label>Nombres:</label><br>
        <input type="text" name="nombres" value="<?= $v['nombres'] ?>"><br>

        <label>Apellidos:</label><br>
        <input type="text" name="apellidos" value="<?= $v['apellidos'] ?>"><br>

        <input type="submit" value="Actualizar">
        <input type="hidden" name="m" value="actualizar">
    <?php endforeach; endforeach; ?>
</form>

<?php require_once("vista/layout/footer.php") ?>
