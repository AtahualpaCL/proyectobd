<?php require_once("vista/layout/header.php"); ?>

<h2>Resumen de tu Reserva</h2>

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

<h3>Selecciona el Método de Pago</h3>
<form method="post" action="index.php?m=confirmarReserva">
    <select name="metodo_pago" required>
        <option value="">Seleccione un método</option>
        <option value="Tarjeta">Tarjeta</option>
        <option value="Paypal">Paypal</option>
        <option value="SafetyPay">SafetyPay</option>
    </select><br><br>

    <input type="submit" value="Confirmar y Pagar">
</form>

<?php require_once("vista/layout/footer.php"); ?>
