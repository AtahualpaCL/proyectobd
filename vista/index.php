<?php require_once("vista/layout/header.php") ?>

<h1>Listado de Pasajeros</h1>
<a href="index.php?m=nuevo">Nuevo Pasajero</a>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Teléfono</th>
            <th>Email</th>
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
                    <td><?= $v['email'] ?></td>
                    <td>
                        <a href="index.php?m=editar&id=<?= $v['id_pasajero'] ?>">Editar</a>
                        <a href="index.php?m=eliminar&id=<?= $v['id_pasajero'] ?>">Eliminar</a>
                    </td>
                </tr>
        <?php endforeach; endforeach; endif; ?>
    </tbody>
</table>

<?php require_once("vista/layout/footer.php") ?>
