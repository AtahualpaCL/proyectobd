<?php require_once("vista/layout/header.php") ?>

<h1>Lista de Transporte</h1>
<a href="?m=nuevoTransporte">Nuevo Transporte</a>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Clase</th>
            <th>Aforo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php if (!empty($dato)): ?>
        <?php foreach ($dato as $tran): ?>
        <tr>
            <td><?= $tran['id_tran'] ?></td>
            <td><?= $tran['id_clase'] ?></td>
            <td><?= $tran['aforo'] ?></td>
            <td>
                <a href="?m=editarTransporte&id=<?= $tran['id_tran'] ?>">Editar</a> |
                <a href="?m=eliminarTransporte&id=<?= $tran['id_tran'] ?>" onclick="return confirm('¿Está seguro?')">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="4">No hay registros disponibles.</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>

<form action="index.php" method="get">
    <button type="submit">Volver al menú</button>
</form>

<?php require_once("vista/layout/footer.php") ?>
