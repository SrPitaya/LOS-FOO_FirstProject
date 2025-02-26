<?php
include 'config/db.php';
?>
<div class="container mx-auto flex flex-wrap pb-12">
  <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
    <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
      <a class="flex flex-wrap no-underline hover:no-underline">
        <p class="w-full text-gray-600 text-xs md:text-sm px-6 mt-4">
          Quinta consulta
        </p>
        <div class="w-full font-bold text-xl text-gray-800 px-6">
          Lista de categorías con el número de profesores que existen en ella.
        </div>
        <p class="text-gray-800 text-base px-6 mb-5">
          <table class="w-full border-collapse rounded-lg bg-white shadow-lg overflow-hidden ml-6 mr-6">
            <thead id="tableHeader5" style="display: none;">
              <tr class="bg-gray-800 text-white text-left">
                <th class="p-4">Categorías</th>
                <th class="p-4">Número de Profesores</th>
              </tr>
            </thead>
            <tbody class="text-black" id="categoriaTableBody">
              <!-- Data will be inserted here via AJAX -->
            </tbody>
          </table>
        </p>
      </a>
    </div>
    <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
      <div class="flex items-center justify-start">
        <button id="actionButton5" class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out cursor-pointer">
          Consultar
        </button>
        <button id="closeButton5" class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out cursor-pointer" style="display: none;">
          Cerrar
        </button>
      </div>
    </div>
  </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const actionButton5 = document.getElementById('actionButton5');
    const closeButton5 = document.getElementById('closeButton5');
    const categoriaTableBody = document.getElementById('categoriaTableBody');
    const tableHeader5 = document.getElementById('tableHeader5');

    function loadPage5(page) {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'connection/fetch_consulta5.php?page=' + page, true);
        xhr.onload = function() {
            if (this.status === 200) {
                categoriaTableBody.innerHTML = this.responseText;
                // Añadir eventos a los nuevos botones de paginación
                addPaginationEvents5();
            }
        };
        xhr.send();
    }

    function addPaginationEvents5() {
        const paginationButtons = document.querySelectorAll('.pagination-button');
        paginationButtons.forEach(button => {
            button.addEventListener('click', function() {
                const page = this.getAttribute('data-page');
                loadPage5(page);
            });
        });
    }

    actionButton5.addEventListener('click', function() {
        loadPage5(1);
        actionButton5.style.display = 'none';
        closeButton5.style.display = 'inline-block';
        tableHeader5.style.display = 'table-header-group';
    });

    closeButton5.addEventListener('click', function() {
        categoriaTableBody.innerHTML = '';
        closeButton5.style.display = 'none';
        actionButton5.style.display = 'inline-block';
        tableHeader5.style.display = 'none';
    });
});
</script>
