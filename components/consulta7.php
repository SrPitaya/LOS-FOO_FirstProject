<?php
include 'config/db.php';
?>
<div class="container mx-auto flex flex-wrap pb-12">
  <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
    <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
      <a class="flex flex-wrap no-underline hover:no-underline">
        <p class="w-full text-gray-600 text-xs md:text-sm px-6 mt-4">
          Séptima consulta
        </p>
        <div class="w-full font-bold text-xl text-gray-800 px-6">
          Lista de los 10 mejores profesores (mejores promedios).
        </div>
        <p class="text-gray-800 text-base px-6 mb-5">
          <table class="w-full border-collapse rounded-lg bg-white shadow-lg overflow-hidden ml-6 mr-6">
            <thead id="tableHeader7" style="display: none;">
              <tr class="bg-gray-800 text-white text-left">
                <th class="p-4">Nombre del Profesor</th>
                <th class="p-4">Total_Alumnos</th>
                <th class="p-4">Promedios</th>
              </tr>
            </thead>
            <tbody class="text-black" id="profesorTableBody7">
              <!-- Data will be inserted here via AJAX -->
            </tbody>
          </table>
        </p>
      </a>
    </div>
    <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
      <div class="flex items-center justify-start">
        <button id="actionButton7" class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out cursor-pointer">
          Consultar
        </button>
        <button id="closeButton7" class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out cursor-pointer" style="display: none;">
          Cerrar
        </button>
      </div>
    </div>
  </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const actionButton7 = document.getElementById('actionButton7');
    const closeButton7 = document.getElementById('closeButton7');
    const profesorTableBody7 = document.getElementById('profesorTableBody7');
    const tableHeader7 = document.getElementById('tableHeader7');

    function loadPage7() {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'connection/fetch_consulta7.php', true);
        xhr.onload = function() {
            if (this.status === 200) {
                profesorTableBody7.innerHTML = this.responseText;
            }
        };
        xhr.send();
    }

    actionButton7.addEventListener('click', function() {
        loadPage7();
        actionButton7.style.display = 'none';
        closeButton7.style.display = 'inline-block';
        tableHeader7.style.display = 'table-header-group';
    });

    closeButton7.addEventListener('click', function() {
        profesorTableBody7.innerHTML = '';
        closeButton7.style.display = 'none';
        actionButton7.style.display = 'inline-block';
        tableHeader7.style.display = 'none';
    });
});
</script>