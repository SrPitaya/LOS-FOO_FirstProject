<?php
include 'config/db.php';
?>
<div class="container mx-auto flex flex-wrap pb-12">
  <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
    <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
      <a class="flex flex-wrap no-underline hover:no-underline">
        <p class="w-full text-gray-600 text-xs md:text-sm px-6 mt-4">
          Octava consulta
        </p>
        <div class="w-full font-bold text-xl text-gray-800 px-6">
          Lista de alumnos que tienen que ir a complementación (nota menor a 7).
        </div>
        <p class="text-gray-800 text-base px-6 mb-5">
          <table class="w-full border-collapse rounded-lg bg-white shadow-lg overflow-hidden ml-6 mr-6">
            <thead id="tableHeader8" style="display: none;">
              <tr class="bg-gray-800 text-white text-left">
                <th class="p-4">Nombre de Alumnos</th>
                <th class="p-4">Materia_Calificaciones</th>
              </tr>
            </thead>
            <tbody class="text-black" id="alumnosTableBody8">
              <!-- Data will be inserted here via AJAX -->
            </tbody>
          </table>
        </p>
      </a>
    </div>
    <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
      <div class="flex items-center justify-start">
        <button id="actionButton8" class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out cursor-pointer">
          Consultar
        </button>
        <button id="closeButton8" class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out cursor-pointer" style="display: none;">
          Cerrar
        </button>
      </div>
    </div>
  </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const actionButton8 = document.getElementById('actionButton8');
    const closeButton8 = document.getElementById('closeButton8');
    const alumnosTableBody8 = document.getElementById('alumnosTableBody8');
    const tableHeader8 = document.getElementById('tableHeader8');

    function loadPage8(page) {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'connection/fetch_consulta8.php?page=' + page, true);
        xhr.onload = function() {
            if (this.status === 200) {
                alumnosTableBody8.innerHTML = this.responseText;
                // Añadir eventos a los nuevos botones de paginación
                addPaginationEvents8();
            }
        };
        xhr.send();
    }

    function addPaginationEvents8() {
        const paginationButtons = document.querySelectorAll('.pagination-button');
        paginationButtons.forEach(button => {
            button.addEventListener('click', function() {
                const page = this.getAttribute('data-page');
                loadPage8(page);
            });
        });
    }

    actionButton8.addEventListener('click', function() {
        loadPage8(1);
        actionButton8.style.display = 'none';
        closeButton8.style.display = 'inline-block';
        tableHeader8.style.display = 'table-header-group';
    });

    closeButton8.addEventListener('click', function() {
        alumnosTableBody8.innerHTML = '';
        closeButton8.style.display = 'none';
        actionButton8.style.display = 'inline-block';
        tableHeader8.style.display = 'none';
    });
});
</script>