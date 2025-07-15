<?php require_once("vista/layout/header.php") ?>
<link rel="stylesheet" href="/proyectobd/vista/clase/css/index.css">

<h1>Lista de Clases</h1>
<a href="?m=nuevoClase" class="boton-nuevo">+ Nuevo Clase</a>

<table>
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
            <a href="?m=editarClase&id=<?= $clase['id_clase'] ?>" class="btn-editar">Editar</a>
            <a href="?m=eliminarClase&id=<?= $clase['id_clase'] ?>" class="btn-eliminar" onclick="return confirm('¿Está seguro?')">Eliminar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<a href="index.php" class="boton-volver">Volver al menú</a>

<?php require_once("vista/layout/footer.php") ?>
