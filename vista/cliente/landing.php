<?php require_once("vista/layout/header.php") ?>
<link rel="stylesheet" href="/proyectobd/vista/cliente/landing.css">

<header class="hero">
  <div class="overlay"></div>
  <div class="content">
    <h1>¡Bienvenido a PeruRail!</h1>
    <p>Tu aventura en tren hacia Machu Picchu comienza aquí.</p>
    <a href="index.php?m=indexReserva" class="btn-reserva">Reserva Ahora</a>
  </div>
</header>

<section class="promos">
  <h2>Promociones Especiales</h2>
  <div class="promo-grid">
    <a class="promo" href="#">
      <img src="/proyectobd/vista/cliente/img/promo-vistadome.jpg" alt="15% Vistadome">
      <h3>Flash Sale 15%</h3>
      <p>15% de descuento en tren Vistadome con código <b>VISIT15</b></p>
    </a>
    <a class="promo" href="#">
      <img src="/proyectobd/vista/cliente/img/promo-cyberdays.jpg" alt="30% Cyber Days">
      <h3>Cyber Days 30%</h3>
      <p>30% en Expedition, Vistadome y Observatory – código <b>CYBERQ2</b></p>
    </a>
    <a class="promo" href="#">
      <img src="/proyectobd/vista/cliente/img/promo-peruanos.jpg" alt="50% Peruanos">
      <h3>Peruanos 50%</h3>
      <p>Hasta 50% de descuento en Expedition</p>
    </a>
    <a class="promo" href="#">
      <img src="/proyectobd/vista/cliente/img/promo-idavuelta.jpg" alt="5% Ida y Vuelta">
      <h3>Ida y vuelta 5%</h3>
      <p>5% de descuento en viaje redondo</p>
    </a>
  </div>
</section>

<section class="trenes">
  <h2>Nuestros Trenes</h2>
  <div class="tren-grid">
    <div class="tren-card">
      <img src="/proyectobd/vista/cliente/img/tren-vistadome.jpg" alt="Vistadome Interior">
      <h3>Vistadome</h3>
      <ul>
        <li>Ventanas panorámicas y techo</li>
        <li>Snack a bordo y música ambiental</li>
        <li>Desfile de alpaca y audiotour</li>
      </ul>
    </div>
    <div class="tren-card">
      <img src="/proyectobd/vista/cliente/img/tren-observatory.jpg" alt="Observatory">
      <h3>Vistadome Observatory</h3>
      <ul>
        <li>Coche observatorio y coche bar</li>
        <li>Música y danza en vivo</li>
        <li>Balcones y snack gourmet</li>
      </ul>
    </div>
    <div class="tren-card">
      <img src="/proyectobd/vista/cliente/img/tren-expedition.jpg" alt="Expedition">
      <h3>Expedition</h3>
      <ul>
        <li>Opción económica con audio guía</li>
        <li>Varias frecuencias diarias</li>
        <li>Ambiente cálido y cultural</li>
      </ul>
    </div>
    <div class="tren-card">
      <img src="/proyectobd/vista/cliente/img/hiram-bingham.jpg" alt="Hiram Bingham">
      <h3>Hiram Bingham</h3>
      <p>Tren de lujo estilo Belmond</p>
      <p>Menú gourmet de 3 tiempos</p>
      <p>Bar abierto y show en vivo</p>
    </div>
</div>
  </div>
</section>


<footer>
  <p>&copy; 2025 Servicio de Trenes • Alta experiencia al viajero peruano e internacional.</p>
</footer>

<?php require_once("vista/layout/footer.php") ?>
