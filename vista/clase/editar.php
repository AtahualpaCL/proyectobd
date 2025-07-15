<?php require_once("vista/layout/header.php") ?>
<link rel="stylesheet" href="/proyectobd/vista/clase/css/editar.css">

<h1>Editar Clase</h1>
<form method="get" action="">
    <?php $c = $dato[0][0]; ?>
    <input type="hidden" name="id" value="<?= $c['id_clase'] ?>">

    <label>Clase:</label><br>
    <input type="text" name="clase" value="<?= $c['clase'] ?>" required><br>

    <label>Precio:</label><br>
    <input type="number" step="0.01" name="precio_clase" value="<?= $c['precio_clase'] ?>" required><br>

    <label>Servicios:</label><br>
    <input type="text" name="servicios" value="<?= $c['servicios'] ?>"><br>

    <input type="submit" value="Actualizar">
    <input type="hidden" name="m" value="actualizarClase">
</form>

<?php require_once("vista/layout/footer.php") ?>
