<?php require_once("vista/layout/header.php") ?>
<link rel="stylesheet" href="/proyectobd/vista/clase/css/editar.css">

<h1>Editar Clase</h1>

<form method="get" action="">
    <?php foreach ($dato as $c): ?>
        <input type="hidden" name="id" value="<?= $c['id_clase'] ?>">

        <label>Clase:</label><br>
        <select name="clase" required>
            <option value="" disabled>Seleccione una clase</option>
            <option value="PeruRail Expedition" <?= ($c['clase'] == 'PeruRail Expedition') ? 'selected' : '' ?>>PeruRail Expedition</option>
            <option value="PeruRail Vistadome" <?= ($c['clase'] == 'PeruRail Vistadome') ? 'selected' : '' ?>>PeruRail Vistadome</option>
            <option value="PeruRail Vistadome Observatory" <?= ($c['clase'] == 'PeruRail Vistadome Observatory') ? 'selected' : '' ?>>PeruRail Vistadome Observatory</option>
            <option value="Hiram Bingham" <?= ($c['clase'] == 'Hiram Bingham') ? 'selected' : '' ?>>Hiram Bingham</option>
        </select><br>

        <label>Precio:</label><br>
        <input type="number" step="0.01" name="precio_clase" value="<?= $c['precio_clase'] ?>" required><br>

        <label>Servicios:</label><br>
        <input type="text" name="servicios" value="<?= $c['servicios'] ?>"><br>

        <div class="botones-form">
            <input type="submit" value="Guardar" class="boton-guardar">
            <a href="index.php?m=indexClase" class="boton-volver">Cancelar</a>
        </div>
        <input type="hidden" name="m" value="actualizarClase">
    <?php endforeach; ?>
</form>

<?php require_once("vista/layout/footer.php") ?>
