<?php require_once("vista/layout/header.php") ?>
<link rel="stylesheet" href="/proyectobd/vista/ruta/css/editar.css">

<h1>Editar Ruta</h1>

<?php
// Arrays de ejemplo (estos deberían venir del controlador en una versión ideal)
$ciudades = ['Cusco', 'Machu Picchu', 'Ollantaytambo', 'Poroy'];
$estaciones = ['Estación Wanchaq', 'Estación San Pedro', 'Estación Ollantaytambo', 'Estación Machu Picchu'];
?>

<form method="get" action="">
    <?php foreach($dato as $d): ?>
        <input type="hidden" name="id" value="<?= $d['id_ruta'] ?>">

        <label>Ciudad Origen:</label><br>
        <select name="ciudad_origen" required>
            <option value="" disabled>Seleccione una ciudad</option>
            <?php foreach ($ciudades as $ciudad): ?>
                <option value="<?= $ciudad ?>" <?= ($ciudad == $d['ciudad_origen']) ? 'selected' : '' ?>>
                    <?= $ciudad ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <label>Ciudad Destino:</label><br>
        <select name="ciudad_destino" required>
            <option value="" disabled>Seleccione una ciudad</option>
            <?php foreach ($ciudades as $ciudad): ?>
                <option value="<?= $ciudad ?>" <?= ($ciudad == $d['ciudad_destino']) ? 'selected' : '' ?>>
                    <?= $ciudad ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <label>Estación Origen:</label><br>
        <select name="estacion_origen" required>
            <option value="" disabled>Seleccione una estación</option>
            <?php foreach ($estaciones as $estacion): ?>
                <option value="<?= $estacion ?>" <?= ($estacion == $d['estacion_origen']) ? 'selected' : '' ?>>
                    <?= $estacion ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <label>Estación Destino:</label><br>
        <select name="estacion_destino" required>
            <option value="" disabled>Seleccione una estación</option>
            <?php foreach ($estaciones as $estacion): ?>
                <option value="<?= $estacion ?>" <?= ($estacion == $d['estacion_destino']) ? 'selected' : '' ?>>
                    <?= $estacion ?>
                </option>
            <?php endforeach; ?>
        </select><br>
    <?php endforeach; ?>

    <div class="botones-form">
        <input type="submit" value="Guardar" class="boton-guardar">
        <button type="button" onclick="window.location.href='index.php?m=indexRuta'" class="boton-volver">Cancelar</button>
    </div>
    <input type="hidden" name="m" value="actualizarRuta">
</form>

<?php require_once("vista/layout/footer.php") ?>
