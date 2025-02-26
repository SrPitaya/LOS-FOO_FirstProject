<?php
include 'config/db.php';
?>
<div class="container mx-auto flex flex-wrap pb-12">
  <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
    <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
      <a class="flex flex-wrap no-underline hover:no-underline">
        <p class="w-full text-gray-600 text-xs md:text-sm px-6 mt-4">
          Tercera consulta
        </p>
        <div class="w-full font-bold text-xl text-gray-800 px-6">
          Curricula Escolar (Asignaturas agrupados por cuatrimestre).
        </div>
        <p class="text-gray-800 text-base px-6 mb-5">
          <table class="w-full border-collapse rounded-lg bg-white shadow-lg overflow-hidden ml-6 mr-6">
            <thead id="tableHeader3" style="display: none;">
              <tr class="bg-gray-800 text-white text-left">
                <th class="p-4">Materias</th>
                <th class="p-4">Cuatrimestre</th>
              </tr>
            </thead>
            <tbody class="text-black" id="curriculaTableBody">
              <!-- Data will be inserted here via AJAX -->
            </tbody>
          </table>
        </p>
      </a>
    </div>
    <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
      <div class="flex items-center justify-start">
        <button id="actionButton3" class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out cursor-pointer">
          Consultar
        </button>
        <button id="closeButton3" class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out cursor-pointer" style="display: none;">
          Cerrar
        </button>
      </div>
    </div>
  </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const actionButton3 = document.getElementById('actionButton3');
    const closeButton3 = document.getElementById('closeButton3');
    const curriculaTableBody = document.getElementById('curriculaTableBody');
    const tableHeader3 = document.getElementById('tableHeader3');

    function loadPage3(page) {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'connection/fetch_consulta3.php?page=' + page, true);
        xhr.onload = function() {
            if (this.status === 200) {
                curriculaTableBody.innerHTML = this.responseText;
                // Añadir eventos a los nuevos botones de paginación
                addPaginationEvents3();
            }
        };
        xhr.send();
    }

    function addPaginationEvents3() {
        const paginationButtons = document.querySelectorAll('.pagination-button');
        paginationButtons.forEach(button => {
            button.addEventListener('click', function() {
                const page = this.getAttribute('data-page');
                loadPage3(page);
            });
        });
    }

    actionButton3.addEventListener('click', function() {
        loadPage3(1);
        actionButton3.style.display = 'none';
        closeButton3.style.display = 'inline-block';
        tableHeader3.style.display = 'table-header-group';
    });

    closeButton3.addEventListener('click', function() {
        curriculaTableBody.innerHTML = '';
        closeButton3.style.display = 'none';
        actionButton3.style.display = 'inline-block';
        tableHeader3.style.display = 'none';
    });
});
</script>
