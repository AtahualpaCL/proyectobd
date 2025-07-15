<?php require_once("vista/layout/header.php"); ?>
<link rel="stylesheet" href="/proyectobd/vista/tiene/css/index.css">

<h1>Lista de Transporte por Horario</h1>
<a href="?m=nuevoTiene">Asignar Transporte a Horario</a>

<table>
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
                        <a href="?m=eliminarTiene&id_tran=<?= $d['id_tran'] ?>&id_horario=<?= $d['id_horario'] ?>" 
                        class="boton-eliminar"
                        onclick="return confirm('¿Está seguro?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
<br>
<div class="botones-form" style="margin-top: 30px;">
    <a href="index.php?m=menuAdmin" class="boton-volver">Volver al menú de administrador</a>
</div>

<?php require_once("vista/layout/footer.php"); ?>
