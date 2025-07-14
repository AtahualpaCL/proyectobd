<?php require_once("vista/layout/header.php") ?>

<h1>Editar Transporte</h1>
<form method="post" action="">
    <?php $t = $dato[0][0]; ?>
    <input type="hidden" name="id" value="<?= $t['id_tran'] ?>">

    <label>Clase:</label><br>
    <select name="id_clase" required>
        <?php foreach ($clases[0] as $c): ?>
            <option value="<?= $c['id_clase'] ?>" <?= ($c['id_clase'] == $t['id_clase']) ? 'selected' : '' ?>>
                <?= $c['clase'] ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <label>Aforo:</label><br>
    <input type="number" name="aforo" value="<?= $t['aforo'] ?>" required><br>

    <input type="submit" value="Actualizar">
    <input type="hidden" name="m" value="actualizarTransporte">
</form>

<?php require_once("vista/layout/footer.php") ?>
