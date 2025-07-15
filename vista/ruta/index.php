<?php require_once("vista/layout/header.php") ?>

<h1>Lista de Rutas</h1>
<a href="?m=nuevoRuta">Nueva Ruta</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Ciudad Origen</th>
        <th>Ciudad Destino</th>
        <th>Estación Origen</th>
        <th>Estación Destino</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($dato as $ruta): ?>
    <tr>
        <td><?= $ruta['id_ruta'] ?></td>
        <td><?= $ruta['ciudad_origen'] ?></td>
        <td><?= $ruta['ciudad_destino'] ?></td>
        <td><?= $ruta['estacion_origen'] ?></td>
        <td><?= $ruta['estacion_destino'] ?></td>
        <td>
            <a href="?m=editarRuta&id=<?= $ruta['id_ruta'] ?>">Editar</a> |
            <a href="?m=eliminarRuta&id=<?= $ruta['id_ruta'] ?>" onclick="return confirm('¿Está seguro?')">Eliminar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<form action="index.php" method="get">
    <button type="submit">Volver al menú</button>
</form>

<?php require_once("vista/layout/footer.php") ?>
