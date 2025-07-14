<?php require_once("vista/layout/header.php") ?>

<h1>Nuevo Pasajero</h1>
<form action="" method="get">
    <label>Nombres:</label><br>
    <input type="text" name="nombres"><br>

    <label>Apellidos:</label><br>
    <input type="text" name="apellidos"><br>

    <label>Género:</label><br>
    <input type="text" name="genero"><br>

    <label>Tipo de Documento:</label><br>
    <input type="text" name="tipo_documento"><br>

    <label>Número de Documento:</label><br>
    <input type="text" name="numero_documento"><br>

    <label>Teléfono:</label><br>
    <input type="text" name="telefono"><br>

    <label>Nacionalidad:</label><br>
    <input type="text" name="nacionalidad"><br>

    <label>Fecha de Nacimiento:</label><br>
    <input type="date" name="fech_nac"><br>

    <label>Email:</label><br>
    <input type="email" name="email"><br>

    <label>Contacto de Compra:</label><br>
    <input type="number" name="contacto_compra" min="0" max="1"><br><br>

    <input type="submit" value="Guardar">
    <input type="hidden" name="m" value="guardarPasajero">
</form>

<?php require_once("vista/layout/footer.php") ?>
