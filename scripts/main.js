var scrollpos = window.scrollY;
var header = document.getElementById("header");
var navcontent = document.getElementById("nav-content");
var navaction = document.getElementById("navAction");
var brandname = document.getElementById("brandname");
var toToggle = document.querySelectorAll(".toggleColour");
var logo = document.querySelector("img[alt='Logo']");
var menuIcon = document.querySelector("img[alt='Menu']");

document.addEventListener("scroll", function () {
  /*Apply classes for slide in bar*/
  scrollpos = window.scrollY;

  if (scrollpos > 10) {
    header.classList.add("bg-white");
    navaction.classList.remove("bg-white");
    navaction.classList.add("gradient");
    navaction.classList.remove("text-gray-800");
    navaction.classList.add("text-white");
    logo.classList.add("logo-black");
    menuIcon.classList.add("menu-black");
    navcontent.classList.add("rounded-box");
    //Use to switch toggleColour colours
    for (var i = 0; i < toToggle.length; i++) {
      toToggle[i].classList.add("text-gray-800");
      toToggle[i].classList.remove("text-white");
    }
    header.classList.add("shadow");
    navcontent.classList.remove("bg-gray-100");
    navcontent.classList.add("bg-white");
  } else {
    header.classList.remove("bg-white");
    navaction.classList.remove("gradient");
    navaction.classList.add("bg-white");
    navaction.classList.remove("text-white");
    navaction.classList.add("text-gray-800");
    logo.classList.remove("logo-black");
    menuIcon.classList.remove("menu-black");
    navcontent.classList.remove("rounded-box");
    //Use to switch toggleColour colours
    for (var i = 0; i < toToggle.length; i++) {
      toToggle[i].classList.add("text-white");
      toToggle[i].classList.remove("text-gray-800");
    }

    header.classList.remove("shadow");
    navcontent.classList.remove("bg-white");
    navcontent.classList.add("bg-gray-100");
  }
});

/*Toggle dropdown list*/
/*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

var navMenuDiv = document.getElementById("nav-content");
var navMenu = document.getElementById("nav-toggle");

document.onclick = check;
function check(e) {
  var target = (e && e.target) || (event && event.srcElement);

  //Nav Menu
  if (!checkParent(target, navMenuDiv)) {
    // click NOT on the menu
    if (checkParent(target, navMenu)) {
      // click on the link
      if (navMenuDiv.classList.contains("hidden")) {
        navMenuDiv.classList.remove("hidden");
      } else {
        navMenuDiv.classList.add("hidden");
      }
    } else {
      // click both outside link and outside menu, hide menu
      navMenuDiv.classList.add("hidden");
    }
  }
}
function checkParent(t, elm) {
  while (t.parentNode) {
    if (t == elm) {
      return true;
    }
    t = t.parentNode;
  }
  return false;
}

// Función para cargar el modal
function loadModal() {
  fetch('components/Modal.php')
    .then(response => response.text())
    .then(html => {
      // Inserta el contenido del modal al final del body
      document.body.insertAdjacentHTML('beforeend', html);

      // Obtén el botón y el modal
      const navAction = document.getElementById('navAction');
      const modal = document.getElementById('modalComponent');
      const closeModalButton = document.getElementById('closeModal');
      const modalOverlay = document.getElementById('modalOverlay');
      const navToggle = document.getElementById('nav-toggle');
      const navContent = document.getElementById('nav-content');

      // Función para abrir el modal
      function openModal() {
        modal.classList.remove('hidden');
        modal.classList.add('modal'); // Add modal class for z-index
        navToggle.classList.add('hidden'); // Ocultar nav-toggle
        navContent.classList.add('hidden'); // Ocultar nav-content
        document.body.classList.add('overflow-hidden'); // Desactivar scroll
      }

      // Función para cerrar el modal
      function closeModal() {
        modal.classList.add('hidden');
        modal.classList.remove('modal'); // Remove modal class
        navToggle.classList.remove('hidden'); // Mostrar nav-toggle
        navContent.classList.remove('hidden'); // Mostrar nav-content
        document.body.classList.remove('overflow-hidden'); // Activar scroll
      }

      // Evento para abrir el modal
      navAction.addEventListener('click', openModal);

      // Evento para cerrar el modal
      closeModalButton.addEventListener('click', closeModal);

      // Cerrar modal si se hace clic fuera del modal
      modalOverlay.addEventListener('click', (event) => {
        if (event.target === modalOverlay) {
          closeModal();
        }
      });

      // Asegurar que solo los botones dentro del modal tengan cursor pointer
      const modalButtons = modal.querySelectorAll('button');
      modalButtons.forEach(button => {
        button.classList.add('modal-button');
      });

      // Evitar que el cursor cambie dentro del contenido del modal
      const modalContent = modal.querySelector('.modal-content');
      modalContent.classList.add('modal-content');
    })
    .catch(error => {
      console.error('Error al cargar el modal:', error);
    });
}

// Cargar el modal al cargar la página
window.addEventListener('DOMContentLoaded', loadModal);
