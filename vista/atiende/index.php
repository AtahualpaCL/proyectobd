<?php require_once("vista/layout/header.php") ?>
<link rel="stylesheet" href="/proyectobd/vista/atiende/css/index.css">

<h1>Lista de Atenciones (Tripulante de Cabina)</h1>

<a href="?m=nuevoAtiende" class="boton-nuevo">+ Nuevo Atiende</a>

<div class="contenedor-tabla">
    <table>
        <thead>
            <tr>
                <th>Tripulante</th>
                <th>Transporte</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($dato as $row): ?>
            <tr>
                <td><?= $row['nombre'] . ' ' . $row['apellido'] ?></td>
                <td><?= $row['id_tran'] ?></td>
                <td>
                    <a href="?m=eliminarAtiende&id_empleado=<?= $row['id_empleado'] ?>&id_tran=<?= $row['id_tran'] ?>" class="btn-eliminar" onclick="return confirm('¿Eliminar este registro?')">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="botones-form" style="margin-top: 30px;">
    <a href="index.php?m=menuAdmin" class="boton-volver">Volver al menú de administrador</a>
</div>

<?php require_once("vista/layout/footer.php") ?>
