<?php require_once("vista/layout/header.php"); ?>

<h2>Datos del Pasajero Principal</h2>

<form method="post" action="index.php?m=paso4Reserva">
    <h3>Pasajero Principal</h3>

    <label>Nombres:</label><br>
    <input type="text" name="pasajero[nombres]" required><br>

    <label>Apellidos:</label><br>
    <input type="text" name="pasajero[apellidos]" required><br>

    <label>Género:</label><br>
    <select name="pasajero[genero]" required>
        <option value="M">Masculino</option>
        <option value="F">Femenino</option>
    </select><br>

    <label>Tipo de Documento:</label><br>
    <input type="text" name="pasajero[tipo_documento]" required><br>

    <label>Número de Documento:</label><br>
    <input type="text" name="pasajero[numero_documento]" required><br>

    <label>Teléfono:</label><br>
    <input type="text" name="pasajero[telefono]"><br>

    <label>Nacionalidad:</label><br>
    <input type="text" name="pasajero[nacionalidad]" required><br>

    <label>Fecha de Nacimiento:</label><br>
    <input type="date" name="pasajero[fech_nac]" required><br>

    <label>Correo electrónico:</label><br>
    <input type="email" name="pasajero[email]"><br>

    <label>¿Es contacto de compra?:</label>
    <input type="radio" name="contacto_compra" value="principal"><br><br>

    <hr>

    <h3>Pasajeros Secundarios</h3>
    <?php
    $reserva = $_SESSION['reserva'];

    $cant_adultos = $reserva['cant_adultos'] ?? 0;
    $cant_ninos = $reserva['cant_ninos'] ?? 0;
    $cant_infantes = $reserva['cant_infantes'] ?? 0;

    for ($i = 1; $i < $cant_adultos; $i++) { ?>
        <h4>Adulto Secundario <?= $i ?></h4>
        <input type="hidden" name="pasajeros_secundarios[adulto][<?= $i ?>][tipo]" value="adulto">

        <label>Nombres:</label><br>
        <input type="text" name="pasajeros_secundarios[adulto][<?= $i ?>][nombres]" required><br>

        <label>Apellidos:</label><br>
        <input type="text" name="pasajeros_secundarios[adulto][<?= $i ?>][apellidos]" required><br>

        <label>Género:</label><br>
        <select name="pasajeros_secundarios[adulto][<?= $i ?>][genero]" required>
            <option value="M">Masculino</option>
            <option value="F">Femenino</option>
        </select><br>

        <label>Tipo de Documento:</label><br>
        <input type="text" name="pasajeros_secundarios[adulto][<?= $i ?>][tipo_documento]" required><br>

        <label>Número de Documento:</label><br>
        <input type="text" name="pasajeros_secundarios[adulto][<?= $i ?>][numero_documento]" required><br>

        <label>Nacionalidad:</label><br>
        <input type="text" name="pasajeros_secundarios[adulto][<?= $i ?>][nacionalidad]" required><br>

        <label>Fecha de Nacimiento:</label><br>
        <input type="date" name="pasajeros_secundarios[adulto][<?= $i ?>][fech_nac]" required><br>

        <label>¿Es contacto de compra?:</label>
        <input type="radio" name="contacto_compra" value="adulto_<?= $i ?>"><br><br>
        <hr>
    <?php
    }

    for ($i = 1; $i <= $cant_ninos; $i++) { ?>
        <h4>Niño <?= $i ?></h4>
        <input type="hidden" name="pasajeros_secundarios[nino][<?= $i ?>][tipo]" value="nino">

        <label>Nombres:</label><br>
        <input type="text" name="pasajeros_secundarios[nino][<?= $i ?>][nombres]" required><br>

        <label>Apellidos:</label><br>
        <input type="text" name="pasajeros_secundarios[nino][<?= $i ?>][apellidos]" required><br>

        <label>Género:</label><br>
        <select name="pasajeros_secundarios[nino][<?= $i ?>][genero]" required>
            <option value="M">Masculino</option>
            <option value="F">Femenino</option>
        </select><br>

        <label>Tipo de Documento:</label><br>
        <input type="text" name="pasajeros_secundarios[nino][<?= $i ?>][tipo_documento]" required><br>

        <label>Número de Documento:</label><br>
        <input type="text" name="pasajeros_secundarios[nino][<?= $i ?>][numero_documento]" required><br>

        <label>Nacionalidad:</label><br>
        <input type="text" name="pasajeros_secundarios[nino][<?= $i ?>][nacionalidad]" required><br>

        <label>Fecha de Nacimiento:</label><br>
        <input type="date" name="pasajeros_secundarios[nino][<?= $i ?>][fech_nac]" required><br><br>
        <hr>
    <?php
    }

    for ($i = 1; $i <= $cant_infantes; $i++) { ?>
        <h4>Infante <?= $i ?></h4>
        <input type="hidden" name="pasajeros_secundarios[infante][<?= $i ?>][tipo]" value="infante">

        <label>Responsable:</label><br>
        <select name="pasajeros_secundarios[infante][<?= $i ?>][responsable]" required>
            <option value="" disabled selected>Seleccione Responsable</option>
            <option value="principal">Pasajero Principal</option>
            <?php
            for ($j = 1; $j < $cant_adultos; $j++) {
                echo "<option value='secundario_{$j}'>Pasajero Secundario {$j}</option>";
            }
    ?>
</select><br><br>
<hr>

        <hr>
    <?php
    }
    ?>

    <input type="submit" value="Confirmar Datos y Continuar al Pago">
</form>

<?php require_once("vista/layout/footer.php"); ?>
