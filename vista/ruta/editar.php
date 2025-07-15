<?php require_once("vista/layout/header.php") ?>
<h1>Editar Ruta</h1>
<form method="post" action="">
    <?php foreach($dato as $d): ?>
        <input type="hidden" name="id" value="<?= $d['id_ruta'] ?>">

        <label>Ciudad Origen:</label><br>
        <input type="text" name="ciudad_origen" value="<?= $d['ciudad_origen'] ?>" required><br>

        <label>Ciudad Destino:</label><br>
        <input type="text" name="ciudad_destino" value="<?= $d['ciudad_destino'] ?>" required><br>

        <label>Estación Origen:</label><br>
        <input type="text" name="estacion_origen" value="<?= $d['estacion_origen'] ?>" required><br>

        <label>Estación Destino:</label><br>
        <input type="text" name="estacion_destino" value="<?= $d['estacion_destino'] ?>" required><br>

    <?php endforeach; ?>
    <input type="submit" value="Actualizar">
    <input type="hidden" name="m" value="actualizarRuta">
</form>
<?php require_once("vista/layout/footer.php") ?>