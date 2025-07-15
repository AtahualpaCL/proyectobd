<?php require_once("vista/layout/header.php"); ?>

<h2>Datos de los Pasajeros</h2>

<form method="post" action="index.php?m=paso4Reserva">
    <?php
    $reserva = $_SESSION['reserva'];
    $cant_adultos = $reserva['cant_adultos'] ?? 1;
    $cant_ninos = $reserva['cant_ninos'] ?? 0;
    $cant_infantes = $reserva['cant_infantes'] ?? 0;
    ?>

    <h3>Pasajero Principal</h3>
    <div class="pasajero" data-index="0" data-tipo="principal">
        <!-- Datos comunes -->
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

        <input type="radio" name="contacto_compra" value="principal" onchange="mostrarEmailEmpresa(this)"> ¿Es contacto de compra?<br>

        <div class="info-contacto" style="display:none;">
            <label>Correo electrónico:</label><br>
            <input type="email" name="pasajero[email]"><br>

            <label>¿Es pasajero empresa?</label>
            <input type="checkbox" onchange="toggleEmpresa(this, 'pasajero')"><br>

            <div class="empresa-info" style="display:none;">
                <label>RUC:</label><br>
                <input type="text" name="pasajero[empresa_ruc]"><br>

                <label>Dirección:</label><br>
                <input type="text" name="pasajero[empresa_direccion]"><br>

                <label>Razón Social:</label><br>
                <input type="text" name="pasajero[empresa_razon_social]"><br>
            </div>
        </div>
        <hr>
    </div>

    <?php
    for ($i = 1; $i < $cant_adultos; $i++) { ?>
        <h4>Adulto Secundario <?= $i ?></h4>
        <div class="pasajero" data-index="<?= $i ?>" data-tipo="adulto">

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

            <label>Teléfono:</label><br>
            <input type="text" name="pasajeros_secundarios[adulto][<?= $i ?>][telefono]"><br>

            <label>Nacionalidad:</label><br>
            <input type="text" name="pasajeros_secundarios[adulto][<?= $i ?>][nacionalidad]" required><br>

            <label>Fecha de Nacimiento:</label><br>
            <input type="date" name="pasajeros_secundarios[adulto][<?= $i ?>][fech_nac]" required><br>

            <input type="radio" name="contacto_compra" value="adulto_<?= $i ?>" onchange="mostrarEmailEmpresa(this)"> ¿Es contacto de compra?<br>

            <div class="info-contacto" style="display:none;">
                <label>Correo electrónico:</label><br>
                <input type="email" name="pasajeros_secundarios[adulto][<?= $i ?>][email]"><br>

                <label>¿Es pasajero empresa?</label>
                <input type="checkbox" onchange="toggleEmpresa(this, 'adulto_<?= $i ?>')"><br>

                <div class="empresa-info" style="display:none;">
                    <label>RUC:</label><br>
                    <input type="text" name="pasajeros_secundarios[adulto][<?= $i ?>][empresa_ruc]"><br>

                    <label>Dirección:</label><br>
                    <input type="text" name="pasajeros_secundarios[adulto][<?= $i ?>][empresa_direccion]"><br>

                    <label>Razón Social:</label><br>
                    <input type="text" name="pasajeros_secundarios[adulto][<?= $i ?>][empresa_razon_social]"><br>
                </div>
            </div>
            <hr>
        </div>
    <?php } ?>

    <!-- Niños -->
    <?php
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
        <input type="date" name="pasajeros_secundarios[nino][<?= $i ?>][fech_nac]" required><br>
        <hr>
    <?php } ?>

    <!-- Infantes -->
    <?php
    for ($i = 1; $i <= $cant_infantes; $i++) { ?>
        <h4>Infante <?= $i ?></h4>
        <input type="hidden" name="pasajeros_secundarios[infante][<?= $i ?>][tipo]" value="infante">

        <label>Responsable:</label><br>
        <select name="pasajeros_secundarios[infante][<?= $i ?>][responsable]" required>
            <option value="principal">Pasajero Principal</option>
            <?php
            for ($j = 1; $j < $cant_adultos; $j++) {
                echo "<option value='secundario_{$j}'>Pasajero Secundario {$j}</option>";
            }
            ?>
        </select><br>
        <hr>
    <?php } ?>

    <input type="submit" value="Confirmar Datos y Continuar al Pago">
</form>

<script>
// Mostrar email y empresa solo al contacto de compra
function mostrarEmailEmpresa(radio) {
    document.querySelectorAll('.info-contacto').forEach(div => div.style.display = 'none');
    radio.parentElement.querySelector('.info-contacto').style.display = 'block';
}

// Mostrar/ocultar campos de empresa
function toggleEmpresa(checkbox, tipo) {
    const empresaInfo = checkbox.closest('.info-contacto').querySelector('.empresa-info');
    empresaInfo.style.display = checkbox.checked ? 'block' : 'none';
}
</script>

<?php require_once("vista/layout/footer.php"); ?>
