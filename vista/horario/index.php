<?php require_once("vista/layout/header.php") ?>
<link rel="stylesheet" href="/proyectobd/vista/horario/css/index.css">

<h1>Listado de Horarios</h1>

<a href="?m=nuevoHorario" class="boton-nuevo">Nuevo Horario</a>

<div class="contenedor-tabla">
    <table>
        <thead>
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
        </thead>
        <tbody>
            <?php foreach($dato as $h): ?>
            <tr>
                <td><?= $h['id_horario'] ?></td>
                <td><?= $h['tipo'] ?></td>
                <td><?= $h['fecha'] ?></td>
                <td><?= $h['hora_salida'] ?></td>
                <td><?= $h['hora_llegada'] ?></td>
                <td><?= $h['duracion_viaje'] ?></td>
                <td><?= $h['id_ruta'] ?></td>
                <td>
                    <a href="?m=editarHorario&id=<?= $h['id_horario'] ?>" class="btn-editar">Editar</a>
                    <a href="?m=eliminarHorario&id=<?= $h['id_horario'] ?>" class="btn-eliminar" onclick="return confirm('¿Está seguro?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="botones-form">
    <a href="index.php?m=menuAdmin" class="boton-volver">Volver al menú de administrador</a>
</div>

<?php require_once("vista/layout/footer.php") ?>
