<?php require_once("vista/layout/header.php") ?>
<link rel="stylesheet" href="/proyectobd/vista/conduce/css/index.css">

<h1>Lista de Conducciones</h1>

<a href="?m=nuevoConduce" class="boton-nuevo">Nuevo Conduce</a>

<div class="contenedor-tabla">
    <table>
        <thead>
            <tr>
                <th>Chofer</th>
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
                    <a href="?m=eliminarConduce&id_empleado=<?= $row['id_empleado'] ?>&id_tran=<?= $row['id_tran'] ?>"
                       onclick="return confirm('¿Eliminar este registro?')" 
                       class="btn-eliminar">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<a href="index.php?m=menuAdmin" class="boton-volver">Volver al menú de administrador</a>

<?php require_once("vista/layout/footer.php") ?>
