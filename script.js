document.addEventListener("DOMContentLoaded", function () {
  // Načítání jídelního menu bez reloadu (s event delegation)
  const menuNav = document.querySelector(".menu nav");
  if (menuNav) {
      menuNav.addEventListener("click", function (event) {
          const link = event.target.closest("a");
          if (!link) return;

          event.preventDefault();
          const id = link.getAttribute("href").split("=")[1];

          // Fallback pro Safari, pokud fetch selže
          const xhr = new XMLHttpRequest();
          xhr.open("GET", "load-content.php?id-stranky=" + id, true);
          xhr.onload = function () {
              if (xhr.status === 200) {
                  document.getElementById("food-menu-wraper").innerHTML = xhr.responseText;
              } else {
                  console.error("Chyba při načítání jídla:", xhr.status);
              }
          };
          xhr.send();
      });
  }

  // Načítání nápojového menu bez reloadu (s event delegation)
  const drinkNav = document.querySelector(".drink-menu nav");
  if (drinkNav) {
      drinkNav.addEventListener("click", function (event) {
          const link = event.target.closest("a");
          if (!link) return;

          event.preventDefault();
          const id = link.getAttribute("href").split("=")[1];

          const xhr = new XMLHttpRequest();
          xhr.open("GET", "load-content.php?id-napoj=" + id, true);
          xhr.onload = function () {
              if (xhr.status === 200) {
                  document.getElementById("drink-menu-wraper").innerHTML = xhr.responseText;
              } else {
                  console.error("Chyba při načítání nápojů:", xhr.status);
              }
          };
          xhr.send();
      });
  }

  // Scroll na sekci rezervace (s fallbackem pro Safari)
  const rezervaceBtn = document.querySelector(".buttons button:nth-child(2)");
  if (rezervaceBtn) {
      rezervaceBtn.addEventListener("click", function (event) {
          event.preventDefault();
          const rezervaceSekce = document.getElementById("rezervace");
          if (rezervaceSekce) {
              if ("scrollBehavior" in document.documentElement.style) {
                  rezervaceSekce.scrollIntoView({ behavior: "smooth" });
              } else {
                  const top = rezervaceSekce.getBoundingClientRect().top + window.pageYOffset;
                  window.scrollTo(0, top);
              }
          }
      });
  }

  // Aktivní položka v menu podle cesty (Safari-safe)
  const allMenus = document.querySelectorAll("nav ul");
  allMenus.forEach((menu) => {
      const menuItems = menu.querySelectorAll("li a");
      let activeFound = false;

      menuItems.forEach((item) => {
          const itemPath = new URL(item.href).pathname;
          const currentPath = window.location.pathname;
          if (itemPath === currentPath) {
              item.classList.add("active");
              activeFound = true;
          }
      });

      if (!activeFound && menuItems.length > 0) {
          menuItems[0].classList.add("active");
      }

      menuItems.forEach((item) => {
          item.addEventListener("click", function () {
              menuItems.forEach((el) => el.classList.remove("active"));
              this.classList.add("active");
          });
      });
  });

  // případně cookies / další funkcionalitu
});