<?php require_once("vista/layout/header.php") ?>
<link rel="stylesheet" href="/proyectobd/vista/empleado/css/editar.css">

<h1 class="titulo-form">Editar Empleado</h1>

<form action="" method="get" class="formulario-empleado">
    <?php foreach($dato as $v): ?>
        <input type="hidden" name="id" value="<?= $v['id_empleado'] ?>">

        <label>Nombres:</label>
        <input type="text" name="nombre" value="<?= $v['nombre'] ?>" required>

        <label>Apellidos:</label>
        <input type="text" name="apellido" value="<?= $v['apellido'] ?>" required>

        <label>Documento:</label>
        <input type="text" name="documento" value="<?= $v['documento'] ?>" required>

        <label>Fecha de Nacimiento:</label>
        <input type="date" name="fech_nac" value="<?= $v['fech_nac'] ?>" required>

        <label>Correo:</label>
        <input type="email" name="correo" value="<?= $v['correo'] ?>" required>

        <label>Edad:</label>
        <input type="number" name="edad" value="<?= $v['edad'] ?>" required>

        <div class="botones-form">
            <input type="submit" value="Guardar" class="boton-guardar">
            <a href="index.php?m=indexEmpleado" class="boton-volver">Cancelar</a>
        </div>

        <input type="hidden" name="m" value="actualizarEmpleado">
    <?php endforeach; ?>
</form>

<?php require_once("vista/layout/footer.php") ?>
