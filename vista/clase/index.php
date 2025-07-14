<?php require_once("vista/layout/header.php") ?>

<h1>Lista de Clases</h1>
<a href="?m=nuevoClase">Nuevo Clase</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Clase</th>
        <th>Precio</th>
        <th>Servicios</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($dato as $clase): ?>
    <tr>
        <td><?= $clase['id_clase'] ?></td>
        <td><?= $clase['clase'] ?></td>
        <td><?= $clase['precio_clase'] ?></td>
        <td><?= $clase['servicios'] ?></td>
        <td>
            <a href="?m=editarClase&id=<?= $clase['id_clase'] ?>">Editar</a> |
            <a href="?m=eliminarClase&id=<?= $clase['id_clase'] ?>" onclick="return confirm('¿Está seguro?')">Eliminar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<form action="index.php" method="get">
    <button type="submit">Volver al menú</button>
</form>

<?php require_once("vista/layout/footer.php") ?>
