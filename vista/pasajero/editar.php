<?php require_once("vista/layout/header.php") ?>
<link rel="stylesheet" href="/proyectobd/vista/pasajero/css/editar.css">

<h1>Editar Pasajero</h1>
<form action="" method="get">
    <?php foreach($dato as $v): ?>
        <input type="hidden" name="id" value="<?= $v['id_pasajero'] ?>">

        <label>Nombres:</label><br>
        <input type="text" name="nombres" value="<?= $v['nombres'] ?>"><br>

        <label>Apellidos:</label><br>
        <input type="text" name="apellidos" value="<?= $v['apellidos'] ?>"><br>

        <label>Teléfono:</label><br>
        <input type="text" name="telefono" value="<?= $v['telefono'] ?>"><br>

        <label>Género:</label><br>
        <input type="text" name="genero" value="<?= $v['genero'] ?>"><br>

        <label>Tipo de documento:</label><br>
        <input type="text" name="tipo_documento" value="<?= $v['tipo_documento'] ?>"><br>

        <label>Número de documento:</label><br>
        <input type="text" name="numero_documento" value="<?= $v['numero_documento'] ?>"><br>

        <label>Nacionalidad:</label><br>
        <input type="text" name="nacionalidad" value="<?= $v['nacionalidad'] ?>"><br>

        <label>Fecha de nacimiento:</label><br>
        <input type="date" name="fech_nac" value="<?= $v['fech_nac'] ?>"><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?= $v['email'] ?>"><br><br>

        <div class="botones-form">
            <input type="submit" value="Guardar" class="boton-guardar">
            <a href="index.php?m=indexPasajero" class="boton-volver">Cancelar</a>
        </div>

        <input type="hidden" name="m" value="actualizarPasajero">
    <?php endforeach; ?>
</form>

<?php require_once("vista/layout/footer.php") ?>
