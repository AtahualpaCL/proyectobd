<?php require_once("vista/layout/header.php") ?>

<h1>Listado de Pasajeros</h1>
<a href="index.php?m=nuevoPasajero">Nuevo Pasajero</a>
<table border="1">
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
        <?php if (!empty($dato)): 
            foreach ($dato as $value):
                foreach ($value as $v): ?>
                <tr>
                    <td><?= $v['id_pasajero'] ?></td>
                    <td><?= $v['nombres'] ?></td>
                    <td><?= $v['apellidos'] ?></td>
                    <td><?= $v['telefono'] ?></td>
                    <td>
                        <a href="index.php?m=editarPasajero&id=<?= $v['id_pasajero'] ?>">Editar</a>
                        <a href="index.php?m=eliminarPasajero&id=<?= $v['id_pasajero'] ?>">Eliminar</a>
                    </td>
                </tr>
        <?php endforeach; endforeach; endif; ?>
    </tbody>
</table>
<br>
<form action="index.php" method="get">
    <button type="submit">Volver al menú</button>
</form>


<?php require_once("vista/layout/footer.php") ?>
