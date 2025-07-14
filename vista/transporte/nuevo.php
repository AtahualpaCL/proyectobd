<?php require_once("vista/layout/header.php") ?>

<h1>Nuevo Transporte</h1>
<form method="get" action="">
    <label>Clase:</label><br>
    <select name="id_clase" required>
        <option value="" disabled selected>Seleccione una clase</option>
        <?php foreach ($clases as $c): ?>
            <option value="<?= $c['id_clase'] ?>"><?= $c['clase'] ?></option>
        <?php endforeach; ?>
    </select><br>

    <label>Aforo:</label><br>
    <input type="number" name="aforo" required><br>

    <input type="submit" value="Guardar">
    <input type="hidden" name="m" value="guardarTransporte">
</form>

<?php require_once("vista/layout/footer.php") ?>
