<?php require_once("vista/layout/header.php") ?>

<h1>Lista de Atenciones (Tripulante de Cabina)</h1>
<a href="?m=nuevoAtiende">Nuevo Atiende</a>

<table border="1">
    <tr>
        <th>Tripulante</th>
        <th>Transporte</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($dato as $row): ?>
    <tr>
        <td><?= $row['nombre'] . ' ' . $row['apellido'] ?></td>
        <td><?= $row['id_tran'] ?></td>
        <td>
            <a href="?m=eliminarAtiende&id_empleado=<?= $row['id_empleado'] ?>&id_tran=<?= $row['id_tran'] ?>" onclick="return confirm('¿Eliminar este registro?')">Eliminar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<br>
<form action="index.php" method="get">
    <button type="submit">Volver al menú</button>
</form>
<?php require_once("vista/layout/footer.php") ?>
