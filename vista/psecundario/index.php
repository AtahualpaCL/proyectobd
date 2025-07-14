<?php require_once("vista/layout/header.php") ?>

<h1>Listado de Pasajeros Secundarios</h1>
<a href="index.php?m=nuevoPasajeroSecundario">Nuevo Pasajero Secundario</a>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($dato)): ?>
            <?php foreach ($dato as $v): ?>
                <tr>
                    <td><?= $v['id_pasajerosec'] ?></td>
                    <td><?= $v['nombres'] ?></td>
                    <td><?= $v['apellidos'] ?></td>
                    <td>
                        <a href="index.php?m=editarPasajeroSecundario&id=<?= $v['id_pasajerosec'] ?>">Editar</a>
                        <a href="index.php?m=eliminarPasajeroSecundario&id=<?= $v['id_pasajerosec'] ?>" onclick="return confirm('¿Está seguro de eliminar?')">Eliminar</a>
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
