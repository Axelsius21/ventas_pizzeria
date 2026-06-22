<?php include("includes/header.php"); ?>
<section class="menu-page fade-in">
    <h2>Menú Completo</h2>

    <div class="menu-grid">

        <div class="item">
            <img src="assets/img/pizza1.jpg" alt="Pizza Tradicional">
            <h4>Pizza Tradicional</h4>
            <p>Masa artesanal con salsa casera, queso mozzarella y orégano fresco.</p>
            <span>Gs. 35.000</span>
    <button class="add-cart" data-name="Pizza Tradicional" data-price="35000">
        Agregar al carrito
    </button>
        </div>

        <div class="item">
            <img src="assets/img/pizza2.jpg" alt="Pizza Cuatro Quesos">
            <h4>Pizza Cuatro Quesos</h4>
            <p>Combinación de mozzarella, gorgonzola, parmesano y catupiry.</p>
            <span>Gs. 40.000</span>
    <button class="add-cart" data-name="Pizza Cuatro Quesos" data-price="40000">
        Agregar al carrito
    </button>
        </div>

        <div class="item">
            <img src="assets/img/pizza3.jpg" alt="Pizza Vegana">
            <h4>Pizza Vegana</h4>
            <p>Base sin productos animales, vegetales frescos y aceite de oliva.</p>
            <span>Gs. 38.000</span>
    <button class="add-cart" data-name="Pizza Vegana" data-price="38000">
        Agregar al carrito
    </button>
        </div>

        <div class="item">
            <img src="assets/img/pizza4.jpg" alt="Pizza Familiar">
            <h4>Pizza Familiar</h4>
            <p>Perfecta para compartir. El doble de masa, queso y amor, cantidades limitadas.</p>
            <span>Gs. 55.000</span>
    <button class="add-cart" data-name="Pizza Familiar" data-price="55000">
        Agregar al carrito
    </button>
        </div>

        <!-- NUEVAS PIZZAS -->

        <div class="item">
            <img src="assets/img/pizza5.jpg" alt="Pizza Pepperoni">
            <h4>Pizza Pepperoni</h4>
            <p>Clásica pizza con abundante pepperoni y queso mozzarella derretido.</p>
            <span>Gs. 42.000</span>
    <button class="add-cart" data-name="Pizza Pepperoni" data-price="42000">
        Agregar al carrito
    </button>
        </div>

        <div class="item">
            <img src="assets/img/pizza6.jpg" alt="Pizza Hawaiana">
            <h4>Pizza Hawaiana</h4>
            <p>Piña dulce y queso mozzarella en combinación perfecta.</p>
            <span>Gs. 41.000</span>
    <button class="add-cart" data-name="Pizza Hawaiana" data-price="41000">
        Agregar al carrito
    </button>
        </div>

        <div class="item">
            <img src="assets/img/pizza7.jpg" alt="Pizza Barbacoa">
            <h4>Pizza Barbacoa</h4>
            <p>Carne, salsa BBQ, cebolla y queso derretido.</p>
            <span>Gs. 45.000</span>
    <button class="add-cart" data-name="Pizza Barbacoa" data-price="45000">
        Agregar al carrito
    </button>
        </div>

        <div class="item">
            <img src="assets/img/pizza8.jpg" alt="Pizza Napolitana">
            <h4>Pizza Napolitana</h4>
            <p>Tomate fresco, albahaca, ajo y mozzarella clásica.</p>
            <span>Gs. 39.000</span>
    <button class="add-cart" data-name="Pizza Napolitana" data-price="39000">
        Agregar al carrito
    </button>
        </div>
        <div class="item">
            <img src="assets/img/pizza9.jpg" alt="Pizza Mexicana">
            <h4>Pizza Mexicana</h4>
            <p>Carne molida, jalapeños, maíz y salsa picante. </p>
            <span>Gs. 43.000</span>
    <button class="add-cart" data-name="Pizza Mexicana" data-price="43000">
        Agregar al carrito
    </button>
        </div>

    </div>
</section>
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

    <button class="delivery-btn" onclick="window.open('https://wa.me/595984122160?text=En%20que%20podemos%20ayudarte', '_blank')">
      Delivery
    </button>

    <button class="pickup-btn" onclick="goToLocation()">
  Retiro en local
</button>
  </div>
</div>

<?php include("includes/footer.php"); ?>
