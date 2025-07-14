<?php require_once("vista/layout/header.php") ?>

<h1>Nuevo Pasajero</h1>
<form action="" method="get">
    <label>Nombres:</label><br>
    <input type="text" name="nombres" required><br>

    <label>Apellidos:</label><br>
    <input type="text" name="apellidos" required><br><br>
    
    <label>Género:</label><br>
    <span style="color: black;">Seleccione género</span><br>
    <input type="radio" name="genero" value="M" required> Masculino<br>
    <input type="radio" name="genero" value="F"> Femenino<br><br>

    <label>Tipo de Documento:</label><br>
    <select name="tipo_documento" required>
        <option value="" disabled selected>Seleccione tipo de documento</option>
        <option value="DNI">Documento de Identidad</option>
        <option value="PAS">Pasaporte</option>
        <option value="CE">Carnet de Extranjería</option>
    </select><br><br>

    <label>Número de Documento:</label><br>
    <input type="text" name="numero_documento" required><br><br>


    <label>Teléfono:</label><br>
    <input type="text" name="telefono" required><br><br>

    <label>Nacionalidad:</label><br>
    <select name="nacionalidad" required>
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
    </select><br><br>

    <label>Fecha de Nacimiento:</label><br>
    <input type="date" name="fech_nac" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>¿Es contacto de compra?</label><br>
    <input type="checkbox" name="contacto_compra" value="1"> Sí<br><br>

    <input type="submit" value="Guardar">
    <input type="hidden" name="m" value="guardarPasajero">
</form>
<script>
    function mostrarCamposEmpresa() {
        const tipo = document.getElementById('tipo_pasajero').value;
        const datosEmpresa = document.getElementById('datos_empresa');
        datosEmpresa.style.display = (tipo === 'empresa') ? 'block' : 'none';
    }
</script>
<?php require_once("vista/layout/footer.php") ?>
