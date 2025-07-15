<?php require_once("vista/layout/header.php") ?>
<link rel="stylesheet" href="/proyectobd/vista/transporte/css/index.css">

<h1>Lista de Transporte</h1>

<a href="?m=nuevoTransporte" class="boton-nuevo">+ Nuevo Transporte</a>

<div class="contenedor-tabla">
    <table>
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
                    <a href="?m=editarTransporte&id=<?= $tran['id_tran'] ?>" class="btn-editar">Editar</a>
                    <a href="?m=eliminarTransporte&id=<?= $tran['id_tran'] ?>" class="btn-eliminar" onclick="return confirm('¿Está seguro?')">Eliminar</a>
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
</div>

<a href="index.php?m=menuAdmin" class="boton-volver">Volver al menú de administrador</a>

<?php require_once("vista/layout/footer.php") ?>
