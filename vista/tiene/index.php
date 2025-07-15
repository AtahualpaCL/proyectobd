<?php require_once("vista/layout/header.php"); ?>

<h1>Lista de Transporte por Horario</h1>
<a href="?m=nuevoTiene">Asignar Transporte a Horario</a>

<table border="1">
    <thead>
        <tr>
            <th>ID Transporte</th>
            <th>ID Horario</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($dato)): ?>    
            <?php foreach ($dato as $d): ?>
                <tr>
                    <td><?= $d['id_tran'] ?></td>
                    <td><?= $d['id_horario'] ?></td>
                    <td>
                        <a href="?m=editarTiene&id_tran=<?= $d['id_tran'] ?>&id_horario=<?= $d['id_horario'] ?>">Editar</a> |
                        <a href="?m=eliminarTiene&id_tran=<?= $d['id_tran'] ?>&id_horario=<?= $d['id_horario'] ?>" onclick="return confirm('¿Está seguro?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
<br>
<form action="index.php" method="get">
    <button type="submit">Volver al menú</button>
</form>

<?php require_once("vista/layout/footer.php"); ?>
