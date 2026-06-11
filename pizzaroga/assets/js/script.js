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
