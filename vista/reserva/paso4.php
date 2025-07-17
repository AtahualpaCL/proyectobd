<?php require_once("vista/layout/header.php"); ?>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/proyectobd/vista/reserva/css/paso4.css">

<h1>Realizar Reserva - Paso 4</h1>

<div class="pasos">
  <div class="paso" data-step="1">Búsqueda</div>
  <div class="paso" data-step="2">Trenes</div>
  <div class="paso" data-step="3">Datos de Pasajeros</div>
  <div class="paso active" data-step="4">Confirmación y Pago</div>
</div>

<h2>Resumen de tu Reserva</h2>
<div class="resumen-wrapper">
  <div class="resumen-container">
        <?php
        $reserva = $_SESSION['reserva'];

        // Mostrar datos del viaje
        echo "<h3>Viaje:</h3>";
        echo "<p>Origen: {$reserva['ciudad_origen']}</p>";
        echo "<p>Destino: {$reserva['ciudad_destino']}</p>";
        echo "<p>Tipo de viaje: " . ($reserva['tipo_viaje'] === 'ida_vuelta' ? 'Ida y Vuelta' : 'Solo ida') . "</p>";
        echo "<p>Fecha de salida: {$reserva['fecha_salida']}</p>";

        if ($reserva['tipo_viaje'] === 'ida_vuelta') {
            echo "<p>Fecha de retorno: {$reserva['fecha_retorno']}</p>";
        }

        // Mostrar el pasajero principal
        echo "<h3>Pasajero Principal:</h3>";
        $p = $reserva['pasajero'];
        echo "{$p['nombres']} {$p['apellidos']} ({$p['tipo_documento']}: {$p['numero_documento']})<br>";
        echo "Teléfono: {$p['telefono']}<br>";
        echo "Correo: {$p['email']}<br>";

        // Mostrar pasajeros secundarios
        if (!empty($reserva['pasajeros_secundarios'])) {
            echo "<h3>Pasajeros Secundarios:</h3>";
            foreach ($reserva['pasajeros_secundarios'] as $tipo => $grupo) {
                foreach ($grupo as $idx => $sec) {
                    echo "<strong>" . ucfirst($tipo) . " {$idx}:</strong> {$sec['nombres']} {$sec['apellidos']}<br>";
                }
            }
        } else {
            echo "<p>No hay pasajeros secundarios.</p>";
        }

        // Calcular el monto total
        $modelo = new Modelo();
        $monto_total = 0;

        if (isset($reserva['ida_transporte'])) {
            $precio = $modelo->consulta("SELECT c.precio_clase FROM TRANSPORTE t JOIN CLASE c ON t.id_clase = c.id_clase WHERE t.id_tran = {$reserva['ida_transporte']}");
            $precio_ida = $precio[0]['precio_clase'] ?? 0;
            $monto_total += $precio_ida * ($reserva['cant_adultos'] + $reserva['cant_ninos']);
        }

        if ($reserva['tipo_viaje'] === 'ida_vuelta' && isset($reserva['retorno_transporte'])) {
            $precio = $modelo->consulta("SELECT c.precio_clase FROM TRANSPORTE t JOIN CLASE c ON t.id_clase = c.id_clase WHERE t.id_tran = {$reserva['retorno_transporte']}");
            $precio_retorno = $precio[0]['precio_clase'] ?? 0;
            $monto_total += $precio_retorno * ($reserva['cant_adultos'] + $reserva['cant_ninos']);
        }

        $_SESSION['reserva']['monto_total'] = $monto_total;

        echo "<h3>Total a Pagar: S/. {$monto_total}</h3>";
        ?>
    </div>
</div>

<h3>Selecciona el Método de Pago</h3>

<form method="post" action="index.php?m=confirmarReserva" class="metodo-pago-form">
  <div class="metodo-pago-opciones">
    <button type="button" class="pago-btn" data-value="Tarjeta">
      <img src="https://cdn-icons-png.flaticon.com/512/196/196578.png" alt="Tarjeta" />
      Tarjeta
    </button>
    <button type="button" class="pago-btn" data-value="Paypal">
      <img src="https://cdn-icons-png.flaticon.com/512/174/174861.png" alt="PayPal" />
      PayPal
    </button>
    <button type="button" class="pago-btn" data-value="SafetyPay">
      <img src="/proyectobd/vista/reserva/img/safetypay-logo.png" alt="SafetyPay" />
      SafetyPay
    </button>
  </div>

  <input type="hidden" name="metodo_pago" id="metodo_pago" required>
  <input type="submit" value="Confirmar y Pagar">
</form>


<script>
  const botones = document.querySelectorAll('.pago-btn');
  const inputMetodo = document.getElementById('metodo_pago');

  botones.forEach(btn => {
    btn.addEventListener('click', () => {
      botones.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      inputMetodo.value = btn.dataset.value;
    });
  });
</script>

<?php require_once("vista/layout/footer.php"); ?>
