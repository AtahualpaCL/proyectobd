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
    
    <label>Tipo de Pasajero:</label>
    <select name="tipo_pasajero" id="tipo_pasajero" required onchange="mostrarCamposEmpresa()">
        <option value="corriente">Corriente</option>
        <option value="empresa">Empresa</option>
    </select><br>

    <div id="datos_empresa" style="display:none;">
        <label>RUC:</label>
        <input type="text" name="ruc"><br>

        <label>Dirección:</label>
        <input type="text" name="direccion"><br>

        <label>Razón Social:</label>
        <input type="text" name="razon_social"><br>
    </div>


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
