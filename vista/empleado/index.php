<?php require_once("vista/layout/header.php") ?>

<h1>Listado de Empleados</h1>
<a href="index.php?m=nuevoEmpleado">Nuevo Empleado</a>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Edad</th>
            <th>Acciones</th>
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
                        <a href="index.php?m=editarEmpleado&id=<?= $v['id_empleado'] ?>">Editar</a>
                        <a href="index.php?m=eliminarEmpleado&id=<?= $v['id_empleado'] ?>" onclick="return confirm('¿Está seguro?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php endif ?>
    </tbody>
</table>
<br>
<form action="index.php" method="get">
    <button type="submit">Volver al menú</button>
</form>

<?php require_once("vista/layout/footer.php") ?>
