<?php require_once("vista/layout/header.php"); ?>

<h2>Selección de Transporte y Horario: <?= ucfirst($fase) ?></h2>
<p>De: <?= $ciudad_origen ?> → A: <?= $ciudad_destino ?></p>
<p>Fecha: <?= $fecha ?></p>

<form method="post" action="">
    <?php foreach ($horarios as $horario): ?>
        <h3>Horario: <?= $horario['hora_salida'] ?> - <?= $horario['hora_llegada'] ?> (<?= $horario['duracion_viaje'] ?>)</h3>
        <p>Estación: <?= $horario['estacion_origen'] ?> → <?= $horario['estacion_destino'] ?></p>

        <?php if (!empty($horario['transportes'])): ?>
            <?php foreach ($horario['transportes'] as $transporte): ?>
                <div style="border:1px solid #ccc; padding:8px; margin:5px;">
                    <input type="radio" name="seleccion[<?= $horario['id_horario'] ?>]" value="<?= $transporte['id_tran'] ?>" required>
                    <strong><?= $transporte['clase'] ?> - Precio: <?= $transporte['precio_clase'] ?></strong>
                    <div style="display:none;" class="servicios">
                        Servicios: <?= $transporte['servicios'] ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay transportes asignados a este horario.</p>
        <?php endif; ?>
        <hr>
    <?php endforeach; ?>

    <input type="hidden" name="fase" value="<?= $fase ?>">
    <input type="hidden" name="m" value="<?php 
        if ($fase == 'ida' && $_SESSION['reserva']['tipo_viaje'] == 'ida y retorno') {
            echo 'paso2Reserva';
        } else {
            echo 'paso3Reserva';
        }
    ?>">

    <input type="submit" value="Continuar">
</form>

<script>
    // Mostrar/Ocultar servicios al seleccionar
    document.querySelectorAll('input[type="radio"]').forEach(radio => {
        radio.addEventListener('change', () => {
            document.querySelectorAll('.servicios').forEach(div => div.style.display = 'none');
            radio.parentElement.querySelector('.servicios').style.display = 'block';
        });
    });
</script>

<?php require_once("vista/layout/footer.php"); ?>
