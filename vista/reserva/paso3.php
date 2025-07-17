<?php require_once("vista/layout/header.php"); ?>
<link rel="stylesheet" href="/proyectobd/vista/reserva/css/paso3.css">

<h1>Realizar Reserva - Paso 3</h1>

<div class="pasos">
  <div class="paso" data-step="1">Búsqueda</div>
  <div class="paso" data-step="2">Trenes</div>
  <div class="paso active" data-step="3">Datos de Pasajeros</div>
  <div class="paso" data-step="4">Confirmación y Pago</div>
</div>

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
        <label><input type="radio" name="pasajero[genero]" value="M" required> Masculino</label>
        <label><input type="radio" name="pasajero[genero]" value="F"> Femenino</label><br>

        <label>Tipo de Documento: </label><br>
        <select name="pasajero[tipo_documento]" onchange="actualizarMaxLength(this, 'pasajero[numero_documento]')" required>
        <option value="" disabled selected>Seleccione Tipo de Documento</option>    
        <option value="DNI">DNI</option>
            <option value="Pasaporte">Pasaporte</option>
            <option value="Carnet de Extranjeria">Carnet de Extranjería</option>
        </select><br>

        <label>Número de Documento:</label><br>
        <input type="text" name="pasajero[numero_documento]" required><br>

        <label>Teléfono:</label><br>
        <input type="text" name="pasajero[telefono]"><br>

        <label>Nacionalidad:</label><br>
        <select name="pasajero[nacionalidad]" required>
            <option value="" disabled selected>Seleccione Nacionalidad</option> 
            <option value="Afganistán">Afganistán</option>
            <option value="Alemania">Alemania</option>
            <option value="Argentina">Argentina</option>
            <option value="Australia">Australia</option>
            <option value="Bolivia">Bolivia</option>
            <option value="Brasil">Brasil</option>
            <option value="Canadá">Canadá</option>
            <option value="Chile">Chile</option>
            <option value="China">China</option>
            <option value="Colombia">Colombia</option>
            <option value="Corea del Sur">Corea del Sur</option>
            <option value="Cuba">Cuba</option>
            <option value="Ecuador">Ecuador</option>
            <option value="Egipto">Egipto</option>
            <option value="El Salvador">El Salvador</option>
            <option value="España">España</option>
            <option value="Estados Unidos">Estados Unidos</option>
            <option value="Francia">Francia</option>
            <option value="Guatemala">Guatemala</option>
            <option value="Honduras">Honduras</option>
            <option value="India">India</option>
            <option value="Italia">Italia</option>
            <option value="Japón">Japón</option>
            <option value="México">México</option>
            <option value="Nicaragua">Nicaragua</option>
            <option value="Países Bajos">Países Bajos</option>
            <option value="Panamá">Panamá</option>
            <option value="Paraguay">Paraguay</option>
            <option value="Perú">Perú</option>
            <option value="Portugal">Portugal</option>
            <option value="Reino Unido">Reino Unido</option>
            <option value="República Dominicana">República Dominicana</option>
            <option value="Rusia">Rusia</option>
            <option value="Sudáfrica">Sudáfrica</option>
            <option value="Suecia">Suecia</option>
            <option value="Suiza">Suiza</option>
            <option value="Uruguay">Uruguay</option>
            <option value="Venezuela">Venezuela</option>
        </select><br>

        <label>Fecha de Nacimiento:</label><br>
        <input type="date" name="pasajero[fech_nac]" required><br>

        <label><input type="checkbox" class="checkbox-contacto" name="contacto_compra" value="principal" onchange="mostrarEmailEmpresa(this)">¿Es contacto de compra?</label><br>

        <div class="info-contacto" style="display:none;">
            <label>Correo electrónico:</label><br>
            <input type="email" name="pasajero[email]"><br>

            <label>¿Es pasajero empresa?</label>
            <input type="checkbox" onchange="toggleEmpresa(this, 'pasajero')"><br>

            <div class="empresa-info" style="display:none;">
                <label>RUC:</label><br>
                <input type="text" name="pasajero[empresa_ruc]" maxlength="11"><br>

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
            <label>
                <input type="radio" name="pasajeros_secundarios[adulto][<?= $i ?>][genero]" value="M" required> Masculino
            </label>
            <label>
                <input type="radio" name="pasajeros_secundarios[adulto][<?= $i ?>][genero]" value="F"> Femenino
            </label><br>

           <label>Tipo de Documento:</label><br>
            <select name="pasajeros_secundarios[adulto][<?= $i ?>][tipo_documento]" onchange="actualizarMaxLength(this, 'pasajeros_secundarios[adulto][<?= $i ?>][numero_documento]')" required>
            <option value="" disabled selected>Seleccione Tipo de Documento</option>    
            <option value="DNI">DNI</option>
                <option value="Pasaporte">Pasaporte</option>
                <option value="Carnet de Extranjeria">Carnet de Extranjería</option>
            </select><br>

            <label>Número de Documento:</label><br>
            <input type="text" name="pasajeros_secundarios[adulto][<?= $i ?>][numero_documento]" required><br>

            <label>Teléfono:</label><br>
            <input type="text" name="pasajeros_secundarios[adulto][<?= $i ?>][telefono]"><br>

           <label>Nacionalidad:</label><br>
            <select name="pasajeros_secundarios[adulto][<?= $i ?>][nacionalidad]" required>
                <option value="" disabled selected>Seleccione nacionalidad</option>
                <option value="Afganistán">Afganistán</option>
                <option value="Alemania">Alemania</option>
                <option value="Argentina">Argentina</option>
                <option value="Australia">Australia</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Brasil">Brasil</option>
                <option value="Canadá">Canadá</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Colombia">Colombia</option>
                <option value="Corea del Sur">Corea del Sur</option>
                <option value="Cuba">Cuba</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egipto">Egipto</option>
                <option value="El Salvador">El Salvador</option>
                <option value="España">España</option>
                <option value="Estados Unidos">Estados Unidos</option>
                <option value="Francia">Francia</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Honduras">Honduras</option>
                <option value="India">India</option>
                <option value="Italia">Italia</option>
                <option value="Japón">Japón</option>
                <option value="México">México</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Países Bajos">Países Bajos</option>
                <option value="Panamá">Panamá</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Perú">Perú</option>
                <option value="Portugal">Portugal</option>
                <option value="Reino Unido">Reino Unido</option>
                <option value="República Dominicana">República Dominicana</option>
                <option value="Rusia">Rusia</option>
                <option value="Sudáfrica">Sudáfrica</option>
                <option value="Suecia">Suecia</option>
                <option value="Suiza">Suiza</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Venezuela">Venezuela</option>
            </select><br>

            <label>Fecha de Nacimiento:</label><br>
            <input type="date" name="pasajeros_secundarios[adulto][<?= $i ?>][fech_nac]" required><br>

            <label>
            <input type="checkbox" class="checkbox-contacto" name="contacto_compra" value="adulto_<?= $i ?>" onchange="mostrarEmailEmpresa(this)">
            ¿Es contacto de compra?
            </label><br>

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
        <label><input type="radio" name="pasajeros_secundarios[nino][<?= $i ?>][genero]" value="M" required>Masculino</label>
        <label><input type="radio" name="pasajeros_secundarios[nino][<?= $i ?>][genero]" value="F">Femenino</label><br>

        <label>Tipo de Documento:</label><br>
        <select name="pasajeros_secundarios[nino][<?= $i ?>][tipo_documento]" onchange="actualizarMaxLength(this, 'pasajeros_secundarios[nino][<?= $i ?>][numero_documento]')" required>
        <option value="" disabled selected>Seleccione Tipo de Documento</option>    
        <option value="DNI">DNI</option>
            <option value="Pasaporte">Pasaporte</option>
            <option value="Carnet de Extranjeria">Carnet de Extranjería</option>
        </select><br>

        <label>Número de Documento:</label><br>
        <input type="text" name="pasajeros_secundarios[nino][<?= $i ?>][numero_documento]" required><br>

        <label>Nacionalidad:</label><br>
        <select name="pasajeros_secundarios[nino][<?= $i ?>][nacionalidad]" required>
            <option value="" disabled selected>Seleccione nacionalidad</option>
            <option value="Afganistán">Afganistán</option>
            <option value="Alemania">Alemania</option>
            <option value="Argentina">Argentina</option>
            <option value="Australia">Australia</option>
            <option value="Bolivia">Bolivia</option>
            <option value="Brasil">Brasil</option>
            <option value="Canadá">Canadá</option>
            <option value="Chile">Chile</option>
            <option value="China">China</option>
            <option value="Colombia">Colombia</option>
            <option value="Corea del Sur">Corea del Sur</option>
            <option value="Cuba">Cuba</option>
            <option value="Ecuador">Ecuador</option>
            <option value="Egipto">Egipto</option>
            <option value="El Salvador">El Salvador</option>
            <option value="España">España</option>
            <option value="Estados Unidos">Estados Unidos</option>
            <option value="Francia">Francia</option>
            <option value="Guatemala">Guatemala</option>
            <option value="Honduras">Honduras</option>
            <option value="India">India</option>
            <option value="Italia">Italia</option>
            <option value="Japón">Japón</option>
            <option value="México">México</option>
            <option value="Nicaragua">Nicaragua</option>
            <option value="Países Bajos">Países Bajos</option>
            <option value="Panamá">Panamá</option>
            <option value="Paraguay">Paraguay</option>
            <option value="Perú">Perú</option>
            <option value="Portugal">Portugal</option>
            <option value="Reino Unido">Reino Unido</option>
            <option value="República Dominicana">República Dominicana</option>
            <option value="Rusia">Rusia</option>
            <option value="Sudáfrica">Sudáfrica</option>
            <option value="Suecia">Suecia</option>
            <option value="Suiza">Suiza</option>
            <option value="Uruguay">Uruguay</option>
            <option value="Venezuela">Venezuela</option>
        </select><br>

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

    
    <div class="botones-form">
        <a href="index.php?m=paso2Reserva" class="boton-volver">Volver</a>
        <input type="submit" value="Confirmar Datos y Continuar al Pago" class="boton-amarillo">
    </div>
</form>

<script>
// Mostrar email y empresa solo al contacto de compra
function mostrarEmailEmpresa(clickedCheckbox) {
    const checkboxes = document.querySelectorAll('.checkbox-contacto');
    const pasajeroDiv = clickedCheckbox.closest('.pasajero');

    // Ocultamos todos los info-contacto
    document.querySelectorAll('.info-contacto').forEach(div => {
        div.style.display = 'none';
    });

    // Contar cuántos están chequeados (sin incluir el que recién se está marcando si aún no está)
    const yaMarcados = Array.from(checkboxes).filter(cb => cb.checked && cb !== clickedCheckbox);

    if (clickedCheckbox.checked && yaMarcados.length > 0) {
        const confirmar = confirm("Ya hay otro pasajero marcado como contacto de compra. ¿Deseas cambiarlo?");
        if (confirmar) {
            // Desmarcar los demás
            yaMarcados.forEach(cb => {
                cb.checked = false;
                cb.closest('.pasajero').querySelector('.info-contacto').style.display = 'none';
            });

            // Mostrar la info del actual
            pasajeroDiv.querySelector('.info-contacto').style.display = 'block';

        } else {
            // Usuario no quiso cambiar, desmarcar el actual
            clickedCheckbox.checked = false;
        }
    } else if (clickedCheckbox.checked) {
        // No había otro marcado, simplemente mostrar info
        pasajeroDiv.querySelector('.info-contacto').style.display = 'block';
    } else {
        // Se desmarcó el actual
        pasajeroDiv.querySelector('.info-contacto').style.display = 'none';
    }
}

// Mostrar/ocultar campos de empresa
function toggleEmpresa(checkbox, tipo) {
    const empresaInfo = checkbox.closest('.info-contacto').querySelector('.empresa-info');
    empresaInfo.style.display = checkbox.checked ? 'block' : 'none';
}

function actualizarMaxLength(select, inputName) {
    const input = document.querySelector(`input[name='${inputName}']`);
    if (!input) return;
    if (select.value === 'DNI') {
        input.maxLength = 8;
    } else if (select.value === 'Pasaporte') {
        input.maxLength = 12;
    } else if (select.value === 'Carnet de Extranjeria') {
        input.maxLength = 15;
    } else {
        input.removeAttribute('maxLength');
    }
}

</script>

<?php require_once("vista/layout/footer.php"); ?>
