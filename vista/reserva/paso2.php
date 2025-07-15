<?php require_once("vista/layout/header.php"); ?>

<h2>Selección de Transporte y Horario: <?= ucfirst($fase) ?></h2>
<p>De: <?= $ciudad_origen ?> → A: <?= $ciudad_destino ?></p>
<p>Fecha: <?= $fecha ?></p>

<form method="post" action="">
    <?php foreach ($horarios as $horario): ?>
        <h3>Horario: <?= $horario['hora_salida'] ?> - <?= $horario['hora_llegada'] ?> (<?= $horario['duracion_viaje'] ?>)</h3>
        <p>Estación: <?= $horario['estacion_origen'] ?> → <?= $horario['estacion_destino'] ?></p>

        <?php foreach ($horario['transportes'] as $transporte): ?>
            <div style="border:1px solid #ccc; padding:8px; margin:5px;">
                <input type="radio" 
                    name="seleccion" 
                    value="<?= $horario['id_horario'] ?>-<?= $transporte['id_tran'] ?>" 
                    required>
                <strong><?= $transporte['clase'] ?> - Precio: <?= $transporte['precio_clase'] ?></strong>
                <div style="display:none;" class="servicios">
                    Servicios: <?= $transporte['servicios'] ?>
                </div>
            </div>
        <?php endforeach; ?>
        <hr>
    <?php endforeach; ?>

    <input type="hidden" name="fase" value="<?= $fase ?>">
    <input type="hidden" name="m" value="paso2Reserva">

    <input type="submit" value="Continuar">
</form>

<script>
    document.querySelectorAll('input[type="radio"]').forEach(radio => {
        radio.addEventListener('change', () => {
            document.querySelectorAll('.servicios').forEach(div => div.style.display = 'none');
            radio.parentElement.querySelector('.servicios').style.display = 'block';
        });
    });
</script>

<?php require_once("vista/layout/footer.php"); ?>
