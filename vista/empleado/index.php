<?php require_once("vista/layout/header.php") ?>

<link rel="stylesheet" href="/proyectobd/vista/empleado/css/index.css">

<h1>Listado de Empleados</h1>

<a href="index.php?m=nuevoEmpleado" class="boton-nuevo">+ Nuevo Empleado</a>

<div class="contenedor-tabla">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRES</th>
                <th>APELLIDOS</th>
                <th>EDAD</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($dato)): ?>
                <?php foreach ($dato as $v): ?>
                    <tr>
                        <td><?= $v['id_empleado'] ?></td>
                        <td><?= $v['nombre'] ?></td>
                        <td><?= $v['apellido'] ?></td>
                        <td><?= $v['edad'] ?></td>
                        <td>
                            <a href="index.php?m=editarEmpleado&id=<?= $v['id_empleado'] ?>" class="btn-editar">Editar</a>
                            <a href="index.php?m=eliminarEmpleado&id=<?= $v['id_empleado'] ?>" class="btn-eliminar" onclick="return confirm('¿Está seguro?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>
</div>

<a href="index.php?m=menuAdmin" class="boton-volver">Volver al menú de administrador</a>

<?php require_once("vista/layout/footer.php") ?>
