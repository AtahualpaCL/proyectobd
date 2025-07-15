<?php require_once("vista/layout/header.php") ?>
<link rel="stylesheet" href="/proyectobd/vista/empleado/css/editar.css">

<h1 class="titulo-form">Editar Pasajero</h1>

<form action="" method="get" class="formulario-pasajero">
    <?php foreach($dato as $value): foreach($value as $v): ?>
        <input type="hidden" name="id" value="<?= $v['id_pasajero'] ?>">

        <label>Nombres:</label>
        <input type="text" name="nombres" value="<?= $v['nombres'] ?>" required>

        <label>Apellidos:</label>
        <input type="text" name="apellidos" value="<?= $v['apellidos'] ?>" required>

        <label>Teléfono:</label>
        <input type="text" name="telefono" value="<?= $v['telefono'] ?>" required>

        <label>Email:</label>
        <input type="email" name="email" value="<?= $v['email'] ?>" required>

        <div class="botones-form">
            <input type="submit" value="Guardar" class="boton-guardar">
            <a href="index.php?m=indexEmpleado" class="boton-volver">Cancelar</a>
        </div>

        <input type="hidden" name="m" value="actualizar">
    <?php endforeach; endforeach; ?>
</form>

<?php require_once("vista/layout/footer.php") ?>
