<?php require_once("vista/layout/header.php"); ?>
<link rel="stylesheet" href="/proyectobd/vista/selector_usuario.css">

<!-- Agregamos íconos Font Awesome (CDN) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

<div class="selector-container">
    <h1>Bienvenido al Sistema de Reservas de Tren</h1>
    <p class="subtitulo">Seleccione su tipo de usuario:</p>

    <div class="opciones">
        <a href="index.php?m=menuAdmin" class="opcion">
            <i class="fas fa-user-shield icono"></i>
            <span>Administrador</span>
        </a>
        <a href="index.php?m=menuCliente" class="opcion">
            <i class="fas fa-user icono"></i>
            <span>Cliente</span>
        </a>
    </div>
</div>

<?php require_once("vista/layout/footer.php"); ?>
