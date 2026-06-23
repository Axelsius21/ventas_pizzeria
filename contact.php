<?php include("includes/header.php"); ?>

<!-- ==================== CONTACTO ==================== -->
<section id="contacto" class="contact fade-in">
  <h2>Contáctanos</h2>
  <p>¿Querés hacer tu pedido, reservar una mesa o enviarnos un mensaje? ¡Estamos para atenderte!</p>

  <div class="contact-info">
    <div class="info-item">
      <i class="fas fa-map-marker-alt"></i>
      <span>Av. Juan E. O’Leary – Barrio Loma, Caacupé</span>
    </div>
    <div class="info-item">
      <i class="fas fa-phone"></i>
      <span>+595 984 122 160</span>
    </div>
    <div class="info-item">
      <i class="fas fa-clock"></i>
      <span>Lunes a Domingo de 18:00 a 23:30 hs</span>
    </div>
  </div>

  <div class="social-links">
    <a href="https://wa.me/595984122160" target="_blank" class="btn-social whatsapp"><i class="fab fa-whatsapp"></i> WhatsApp</a>
    <a href="https://www.instagram.com/pizzarogaa" target="_blank" class="btn-social instagram"><i class="fab fa-instagram"></i> Instagram</a>
    <a href="https://www.tiktok.com/@PizzaRogaPY" target="_blank" class="btn-social tiktok"><i class="fab fa-tiktok"></i> TikTok</a>
    <a href="https://www.facebook.com/PizzaRogaCaacupe" target="_blank" class="btn-social facebook"><i class="fab fa-facebook-f"></i> Facebook</a>
  </div>

  <div class="map-container">
    <iframe src="https://www.google.com/maps?q=Caacupé&output=embed" loading="lazy"></iframe>
  </div>

  <div class="form-container">
    <h3>Escríbenos</h3>
    <form id="contactForm" onsubmit="showSent(event)">
      <input type="text" name="name" placeholder="Tu nombre" required>
      <input type="text" name="phone" placeholder="Tu número de contacto" required>
      <textarea name="message" placeholder="Tu mensaje" required></textarea>
      <button type="submit" class="btn-send">Enviar Mensaje</button>
    </form>
    <div id="sentMessage" class="sent-message">¡Mensaje enviado con éxito! ❤️</div>
  </div>
</section>

<!-- ==================== CARRITO ==================== -->
<div id="cart">
    <h3>🛒 Carrito</h3>
    <ul id="cart-items"></ul>
    <p>Total: Gs. <span id="cart-total">0</span></p>
    <button id="confirm-order" class="btn-confirm">
      Confirmar pedido
    </button>
</div>

<!-- MODAL -->
<div id="order-modal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>

    <h2> Tu Pedido</h2>

    <ul id="modal-items"></ul>

    <p>Total: Gs. <span id="modal-total">0</span></p>

    <h3> Método de entrega</h3>

    <button class="delivery-btn" onclick="window.open('https://wa.me/595984122160?text=Quiero%20este%20pedido%20porfavor', '_blank')">
      Delivery
    </button>

    <button class="pickup-btn" onclick="goToLocation()">
  Retiro en local
</button>
  </div>
</div>

<?php include("includes/footer.php"); ?>
