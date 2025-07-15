<?php require_once("vista/layout/header.php") ?>
<link rel="stylesheet" href="/proyectobd/vista/pasajero/css/editar.css">

<h1>Editar Pasajero</h1>
<form action="" method="get">
    <?php foreach($dato as $value): foreach($value as $v): ?>
        <input type="hidden" name="id" value="<?= $v['id_pasajero'] ?>">
        <label>Nombres:</label><br>
        <input type="text" name="nombres" value="<?= $v['nombres'] ?>"><br>

        <label>Apellidos:</label><br>
        <input type="text" name="apellidos" value="<?= $v['apellidos'] ?>"><br>

        <label>Teléfono:</label><br>
        <input type="text" name="telefono" value="<?= $v['telefono'] ?>"><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?= $v['email'] ?>"><br><br>

        <input type="submit" value="Actualizar">
        <input type="hidden" name="m" value="actualizar">
    <?php endforeach; endforeach; ?>
</form>

<?php require_once("vista/layout/footer.php") ?>
