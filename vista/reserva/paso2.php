<?php require_once("vista/layout/header.php"); ?>
<link rel="stylesheet" href="/proyectobd/vista/reserva/css/paso2.css">

<h1>Realizar Reserva - Paso 2</h1>

<div class="pasos">
  <div class="paso" data-step="1">Búsqueda</div>
  <div class="paso active" data-step="2">Trenes</div>
  <div class="paso" data-step="3">Datos de Pasajeros</div>
  <div class="paso" data-step="4">Confirmación y Pago</div>
</div>

<div class="info-viaje">
  <p><strong>Ruta:</strong> <?= $ciudad_origen ?> → <?= $ciudad_destino ?></p>
  <p><strong>Fecha:</strong> <?= $fecha ?></p>
</div>

<form method="post" action="">
  <?php foreach ($horarios as $horario): ?>
    <div class="horario-card">
      <h3><?= $horario['hora_salida'] ?> - <?= $horario['hora_llegada'] ?> (<?= $horario['duracion_viaje'] ?>)</h3>
      <p><strong>Estación:</strong> <?= $horario['estacion_origen'] ?> → <?= $horario['estacion_destino'] ?></p>

      <?php foreach ($horario['transportes'] as $transporte): ?>
        <label class="opcion-transporte">
          <input type="radio" 
                 name="seleccion" 
                 value="<?= $horario['id_horario'] ?>-<?= $transporte['id_tran'] ?>" 
                 required>
          <div class="contenido">
            <strong><?= $transporte['clase'] ?> - S/<?= $transporte['precio_clase'] ?></strong>
            <div class="servicios">
              Servicios: <?= $transporte['servicios'] ?>
            </div>
          </div>
        </label>
      <?php endforeach; ?>
    </div>
  <?php endforeach; ?>

  <input type="hidden" name="fase" value="<?= $fase ?>">
  <input type="hidden" name="m" value="paso2Reserva">
  <button type="submit" class="boton-amarillo">Siguiente</button>
</form>

<script>
  document.querySelectorAll('input[type="radio"]').forEach(radio => {
    radio.addEventListener('change', () => {
      document.querySelectorAll('.servicios').forEach(div => div.style.display = 'none');
      radio.closest('.opcion-transporte').querySelector('.servicios').style.display = 'block';
    });
  });
</script>

<?php require_once("vista/layout/footer.php"); ?>
