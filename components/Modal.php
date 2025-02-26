<!-- Modal -->
<div id="modalComponent" class="fixed inset-0 z-10 w-screen overflow-y-auto hidden bg-gray-900 bg-opacity-50 backdrop-blur-sm cursor-pointer disable-scroll">
  <div id="modalOverlay" class="flex min-h-full items-center justify-center p-4 text-center sm:items-center sm:p-0 cursor-pointer">
    <!-- Panel del modal -->
    <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-2xl lg:max-w-4xl modal-content">
      <!-- Contenido del modal -->
      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="sm:flex sm:items-start">
          <!-- Icono de información -->
          <div class="">
            <img src="img/payaso.png" alt="Icono" class="size-15 filter-black">
          </div>
          <!-- Título del modal -->
          <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
            <h3 class="text-base font-semibold text-gray-900" id="modal-title">Nuestro Equipo</h3>
            <div class="mt-2">
              <p class="text-sm text-gray-500">Conoce a los miembros de nuestro equipo:</p>
            </div>
          </div>
        </div>
        <!-- Sección del equipo -->
        <div class="mt-6">
          <div class="mt-2 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Miembro 1 -->
            <div class="flex flex-col items-center">
              <img class="w-24 h-24 rounded-full" src="https://randomuser.me/api/portraits/men/50.jpg" alt="Miembro 1">
              <p class="mt-2 text-sm text-gray-700">Alan Coral</p>
              <p class="text-xs text-gray-500">Desarrollador</p>
            </div>
            <!-- Miembro 2 -->
            <div class="flex flex-col items-center">
              <img class="w-24 h-24 rounded-full" src="https://randomuser.me/api/portraits/men/80.jpg" alt="Miembro 2">
              <p class="mt-2 text-sm text-gray-700">Axel Mis</p>
              <p class="text-xs text-gray-500">Diseñador</p>
            </div>
            <!-- Miembro 3 -->
            <div class="flex flex-col items-center">
              <img class="w-24 h-24 rounded-full" src="https://randomuser.me/api/portraits/men/25.jpg" alt="Miembro 3">
              <p class="mt-2 text-sm text-gray-700">Erick Mora</p>
              <p class="text-xs text-gray-500">Gerente de Proyecto</p>
            </div>
            <!-- Miembro 4 -->
            <div class="flex flex-col items-center">
              <img class="w-24 h-24 rounded-full" src="https://randomuser.me/api/portraits/men/69.jpg" alt="Miembro 4">
              <p class="mt-2 text-sm text-gray-700">Emmanuel Tuz</p>
              <p class="text-xs text-gray-500">Analista de Datos</p>
            </div>
          </div>
        </div>
      </div>
      <!-- Botón de salida -->
      <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
        <button type="button" id="closeModal" class="inline-flex w-full justify-center rounded-md bg-gray-300 px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs ring-1 ring-gray-300 ring-inset hover:bg-gray-200 sm:ml-3 sm:w-auto cursor-pointer">Salir</button>
      </div>
    </div>
  </div>
</div>

<script>
  document.getElementById('modalOverlay').addEventListener('click', function(event) {
    if (event.target === this) {
      document.getElementById('modalComponent').classList.add('hidden');
    }
  });

  document.getElementById('closeModal').addEventListener('click', function() {
    document.getElementById('modalComponent').classList.add('hidden');
  });
</script>
