<?php require_once("vista/layout/header.php") ?>
<link rel="stylesheet" href="/proyectobd/vista/ruta/css/index.css">

<h1>Lista de Rutas</h1>
<a href="?m=nuevoRuta" class="boton-nuevo">+ Nueva Ruta</a>
<table>
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
            <a href="?m=editarRuta&id=<?= $ruta['id_ruta'] ?>" class="btn-editar">Ed</a>
            <a href="?m=eliminarRuta&id=<?= $ruta['id_ruta'] ?>" class="btn-eliminar" onclick="return confirm('¿Está seguro?')">El</a>
        </td>

    </tr>
    <?php endforeach; ?>
</table>

<div class="botones-form" style="margin-top: 30px;">
    <a href="index.php?m=menuAdmin" class="boton-volver">Volver al menú de administrador</a>
</div>

<?php require_once("vista/layout/footer.php") ?>
