<?php require_once("vista/layout/header.php") ?>

<h1>Listado de Pasajeros Secundarios</h1>
<a href="index.php?m=nuevoPasajeroSecundario">Nuevo Pasajero Secundario</a>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombres</th>
            <th>Apellidos</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($dato)): 
            foreach ($dato as $value):
                foreach ($value as $v): ?>
                <tr>
                    <td><?= $v['id_psecundario'] ?></td>
                    <td><?= $v['nombres'] ?></td>
                    <td><?= $v['apellidos'] ?></td>
                    <td>
                        <a href="index.php?m=editarPasajeroSecundario&id=<?= $v['id_psecundario'] ?>">Editar</a>
                        <a href="index.php?m=eliminarPasajeroSecundario&id=<?= $v['id_psecundario'] ?>">Eliminar</a>
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
