<?php require_once("vista/layout/header.php") ?>
<h1>Listado de Horarios</h1>
<a href="?m=nuevoHorario">Nuevo Horario</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Tipo</th>
        <th>Fecha</th>
        <th>Hora Salida</th>
        <th>Hora Llegada</th>
        <th>Duración</th>
        <th>Ruta</th>
        <th>Acciones</th>
    </tr>
    <?php foreach($dato as $h): ?>
    <tr>
        <td><?= $h['id_horario'] ?></td>
        <td><?= $h['tipo'] ?></td>
        <td><?= $h['fecha']?></td>
        <td><?= $h['hora_salida'] ?></td>
        <td><?= $h['hora_llegada'] ?></td>
        <td><?= $h['duracion_viaje'] ?></td>
        <td><?= $h['id_ruta'] ?></td>
        <td>
            <a href="?m=editarHorario&id=<?= $h['id_horario'] ?>">Editar</a> |
            <a href="?m=eliminarHorario&id=<?= $h['id_horario'] ?>" onclick="return confirm('¿Está seguro?')">Eliminar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<br>
<form action="index.php" method="get">
    <button type="submit">Volver al menú</button>
</form>

<?php require_once("vista/layout/footer.php") ?>
