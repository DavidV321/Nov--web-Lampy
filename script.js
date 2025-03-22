// načítání menu bez refresh stránky

document.addEventListener("DOMContentLoaded", function () {
    // Klikání na položky jídelního menu
    document.querySelectorAll(".menu nav a").forEach(link => {
        link.addEventListener("click", function (event) {
            event.preventDefault();
            let id = this.getAttribute("href").split("=")[1];

            fetch("load-content.php?id-stranky=" + id)
                .then(response => response.text())
                .then(data => {
                    document.getElementById("food-menu-wraper").innerHTML = data; // Obsah jídel
                })
                .catch(error => console.error("Chyba při načítání jídla:", error));
        });
    });

    // Klikání na položky nápojového menu
    document.querySelectorAll(".drink-menu nav a").forEach(link => {
        link.addEventListener("click", function (event) {
            event.preventDefault();
            let id = this.getAttribute("href").split("=")[1];

            fetch("load-content.php?id-napoj=" + id)
                .then(response => response.text())
                .then(data => {
                    document.getElementById("drink-menu-wraper").innerHTML = data; // Obsah nápojů
                })
                .catch(error => console.error("Chyba při načítání nápojů:", error));
        });
    });
});

// scroll z button na rezervace

document.addEventListener("DOMContentLoaded", function () {
    document.querySelector(".buttons button:nth-child(2)").addEventListener("click", function (event) {
        event.preventDefault(); // Zabrání výchozímu chování tlačítka

        const rezervaceSekce = document.getElementById("rezervace");
        if (rezervaceSekce) {
            rezervaceSekce.scrollIntoView({ behavior: "smooth" });
        }
    });
});

// úprava menu - podržené menu

document.addEventListener("DOMContentLoaded", function () {
    const allMenus = document.querySelectorAll("nav ul"); // Najde všechna menu
  
    allMenus.forEach((menu) => {
      const menuItems = menu.querySelectorAll("li a");
      let activeFound = false;
  
      // Procházení položek v menu a hledání shody s URL
      menuItems.forEach((item) => {
        if (item.href === window.location.href) {
          item.classList.add("active");
          activeFound = true;
        }
      });
  
      // Pokud žádná položka není aktivní, nastavíme první jako výchozí
      if (!activeFound && menuItems.length > 0) {
        menuItems[0].classList.add("active");
      }
  
      // Přidání event listeneru pro změnu aktivní položky při kliknutí
      menuItems.forEach((item) => {
        item.addEventListener("click", function () {
          menuItems.forEach((el) => el.classList.remove("active"));
          this.classList.add("active");
        });
      });
    });
  });

  // cookies
  