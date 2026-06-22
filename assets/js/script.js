// Animación de aparición al hacer scroll
document.addEventListener("DOMContentLoaded", () => {
  const fadeElements = document.querySelectorAll(".fade-in");

  const appearOnScroll = new IntersectionObserver(
    (entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add("visible");
          observer.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.3 }
  );

  fadeElements.forEach(el => appearOnScroll.observe(el));
});

// Animación para las tarjetas del menú al aparecer
document.addEventListener("DOMContentLoaded", () => {
  const menuItems = document.querySelectorAll(".menu-grid .item");

  const showOnScroll = new IntersectionObserver(
    (entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add("visible");
          observer.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.2 }
  );

  menuItems.forEach(item => showOnScroll.observe(item));
});


// Animación del título del menú
document.addEventListener("DOMContentLoaded", () => {
  const menuTitle = document.querySelector(".menu-title");

  if (menuTitle) {
    const titleObserver = new IntersectionObserver(
      (entries, observer) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            menuTitle.classList.add("visible");
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.3 }
    );

    titleObserver.observe(menuTitle);
  }
});

// Animación del título de promociones
document.addEventListener("DOMContentLoaded", () => {
  const promoTitle = document.querySelector(".promo-title");
  if (promoTitle) {
    const promoObserver = new IntersectionObserver(
      (entries, observer) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            promoTitle.classList.add("visible");
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.3 }
    );
    promoObserver.observe(promoTitle);
  }
});

function showSent(event) {
  event.preventDefault();
  const form = document.getElementById("contactForm");
  const msg = document.getElementById("sentMessage");

  msg.style.display = "block";
  form.reset();

  setTimeout(() => {
    msg.style.display = "none";
  }, 3000);
}
// =========================
// 🛒 CARRITO DE PEDIDOS
// =========================

let cart = [];

// Cargar carrito desde localStorage al iniciar
function loadCart() {
  const savedCart = localStorage.getItem("pizzaCart");
  if (savedCart) {
    cart = JSON.parse(savedCart);
    updateCart();
  }
}

// Guardar carrito en localStorage
function saveCart() {
  localStorage.setItem("pizzaCart", JSON.stringify(cart));
}

// Actualizar contador del carrito en el header
function updateCartCount() {
  const cartCount = document.getElementById("cart-count");
  if (cartCount) {
    cartCount.innerText = cart.length;
  }
}

// detectar botones "Agregar al carrito"
document.addEventListener("DOMContentLoaded", () => {
  // Cargar carrito guardado
  loadCart();
  
  const buttons = document.querySelectorAll(".add-cart");

  buttons.forEach(button => {
    button.addEventListener("click", () => {
      const name = button.dataset.name;
      const price = parseInt(button.dataset.price);

      cart.push({ name, price });

      updateCart();
      saveCart();
    });
  });

  // Manejar clic en el icono del carrito en el header
  const cartToggle = document.getElementById("cart-toggle");
  const cartSection = document.getElementById("cart");
  
  if (cartToggle && cartSection) {
    cartToggle.addEventListener("click", (e) => {
      e.stopPropagation();
      cartSection.style.display = cartSection.style.display === "none" ? "block" : "none";
    });

    // Cerrar el carrito al hacer clic en otro lado
    document.addEventListener("click", (e) => {
      if (!cartToggle.contains(e.target) && !cartSection.contains(e.target)) {
        cartSection.style.display = "none";
      }
    });
  }
});

// actualizar carrito
function updateCart() {
  const list = document.getElementById("cart-items");
  const totalElement = document.getElementById("cart-total");

  // Actualizar contador en el header
  updateCartCount();

  if (!list || !totalElement) return;

  list.innerHTML = "";

  let total = 0;

  cart.forEach((item, index) => {
    total += item.price;

    list.innerHTML += `
      <li>
        ${item.name} - Gs. ${item.price}
        <button onclick="removeItem(${index})">❌</button>
      </li>
    `;
  });

  totalElement.innerText = total;
}

// eliminar item
function removeItem(index) {
  cart.splice(index, 1);
  updateCart();
  saveCart();
}
// =========================
// 🧾 MODAL DE PEDIDO
// =========================

document.addEventListener("DOMContentLoaded", () => {

  const modal = document.getElementById("order-modal");
  const btn = document.getElementById("confirm-order");
  const close = document.querySelector(".close");

  if (!modal || !btn || !close) return;

  btn.addEventListener("click", () => {
    openModal();
  });

  close.addEventListener("click", () => {
    modal.style.display = "none";
  });

  window.addEventListener("click", (e) => {
    if (e.target == modal) {
      modal.style.display = "none";
    }
  });

  function openModal() {
    const list = document.getElementById("modal-items");
    const totalElement = document.getElementById("modal-total");

    if (!list || !totalElement) return;

    list.innerHTML = "";
    let total = 0;

    cart.forEach(item => {
      total += item.price;

      list.innerHTML += `
        <li>${item.name} - Gs. ${item.price}</li>
      `;
    });

    totalElement.innerText = total;
    modal.style.display = "block";
  }
  window.goToLocation = function () {
  window.location.href = "contact.php#contacto";
};

});