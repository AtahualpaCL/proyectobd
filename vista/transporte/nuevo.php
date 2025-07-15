<?php require_once("vista/layout/header.php") ?>
<link rel="stylesheet" href="/proyectobd/vista/transporte/css/nuevo.css">


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

    <div class="botones-form">
        <input type="submit" value="Guardar" class="boton-guardar">
        <button type="button" onclick="window.location.href='index.php?m=indexTransporte'" class="boton-volver">Cancelar</button>
    </div>
    <input type="hidden" name="m" value="guardarTransporte">
</form>

<?php require_once("vista/layout/footer.php") ?>
