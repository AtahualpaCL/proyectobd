<?php require_once("vista/layout/header.php") ?>
<link rel="stylesheet" href="/proyectobd/vista/pasajero/css/index.css">

<h1>Listado de Pasajeros</h1>

<a href="index.php?m=nuevoPasajero" class="boton-nuevo">+ Nuevo Pasajero</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($dato)): ?>
            <?php foreach ($dato as $v): ?>
                <tr>
                    <td><?= $v['id_pasajero'] ?></td>
                    <td><?= $v['nombres'] ?></td>
                    <td><?= $v['apellidos'] ?></td>
                    <td><?= $v['telefono'] ?></td>
                    <td>
                        <a href="index.php?m=editarPasajero&id=<?= $v['id_pasajero'] ?>">Editar</a>
                        <a href="index.php?m=eliminarPasajero&id=<?= $v['id_pasajero'] ?>" onclick="return confirm('¿Está seguro de eliminar?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php endif ?>
    </tbody>
</table>

<form action="index.php" method="get">
    <button type="submit">Volver al menú</button>
</form>

<?php require_once("vista/layout/footer.php") ?>
