<?php require_once("vista/layout/header.php"); ?>
<link rel="stylesheet" href="/proyectobd/vista/menu.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<div class="menu-container">
    <h2>Menú Principal de Administrador</h2>
    <ul class="menu-grid">
        <li><a href="index.php?m=indexPasajero"><i class="fas fa-user"></i> Pasajeros</a></li>
        <li><a href="index.php?m=indexEmpleado"><i class="fas fa-user-tie"></i> Empleados</a></li>
        <li><a href="index.php?m=indexClase"><i class="fas fa-chair"></i> Clases</a></li>
        <li><a href="index.php?m=indexTransporte"><i class="fas fa-train"></i> Transporte</a></li>
        <li><a href="index.php?m=indexAtiende"><i class="fas fa-clipboard-check"></i> Atiende</a></li>
        <li><a href="index.php?m=indexConduce"><i class="fas fa-id-badge"></i> Conduce</a></li>
        <li><a href="index.php?m=indexRuta"><i class="fas fa-map-marked-alt"></i> Rutas</a></li>
        <li><a href="index.php?m=indexHorario"><i class="fas fa-clock"></i> Horarios</a></li>
        <li><a href="index.php?m=indexTiene"><i class="fas fa-link"></i> Tiene</a></li>

        <!-- Si necesitas placeholders para simetría (solo si hay menos de 9) -->
        <!--
        <li class="menu-placeholder"></li>
        <li class="menu-placeholder"></li>
        -->
    </ul>
</div>

<div class="botones-form">
    <a href="index.php" class="boton-volver">Volver al menú principal</a>
</div>

<?php require_once("vista/layout/footer.php"); ?>
