<?php require_once("vista/layout/header.php") ?>
<link rel="stylesheet" href="/proyectobd/vista/transporte/css/editar.css">

<h1>Editar Transporte</h1>

<form method="post" action="">
    <?php $t = $dato[0]; ?>
    
    <input type="hidden" name="id" value="<?= $t['id_tran'] ?>">

    <label>Clase:</label><br>
    <select name="id_clase" required>
        <?php foreach ($clases as $c): ?>
            <option value="<?= $c['id_clase'] ?>" <?= ($c['id_clase'] == $t['id_clase']) ? 'selected' : '' ?>>
                <?= $c['clase'] ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <label>Aforo:</label><br>
    <input type="number" name="aforo" value="<?= $t['aforo'] ?>" required><br>

    <div class="botones-form">
        <input type="submit" value="Guardar" class="boton-guardar">
        <button type="button" onclick="window.location.href='index.php?m=indexTransporte'" class="boton-volver">Cancelar</button>
    </div>
    <input type="hidden" name="m" value="actualizarTransporte">
</form>

<?php require_once("vista/layout/footer.php") ?>
