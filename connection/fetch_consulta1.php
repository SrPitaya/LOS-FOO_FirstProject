<?php
include '../config/db.php';

// Número de registros por página
$limit = 10;

// Obtener el número de página actual desde la solicitud AJAX
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Consulta para obtener los registros de la página actual
$query = "SELECT CONCAT(profesor.nombre, ' ', profesor.apellido1, ' ', profesor.apellido2) AS 'Nombre del Profesor', tlfcontactoprof.telefono, asignatura.nombre AS 'asignatura', profesor.categoria
          FROM profesor
          INNER JOIN impartir ON impartir.idProfesor = profesor.idProfesor
          INNER JOIN asignatura ON impartir.idAsignatura = asignatura.idAsignatura
          INNER JOIN tlfcontactoprof ON profesor.idProfesor = tlfcontactoprof.idProfesor
          ORDER BY profesor.categoria
          LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn, $query);

// Consulta para obtener el total de registros
$totalQuery = "SELECT COUNT(*) as total FROM profesor
               INNER JOIN impartir ON impartir.idProfesor = profesor.idProfesor
               INNER JOIN asignatura ON impartir.idAsignatura = asignatura.idAsignatura
               INNER JOIN tlfcontactoprof ON profesor.idProfesor = tlfcontactoprof.idProfesor";
$totalResult = mysqli_query($conn, $totalQuery);
$totalRow = mysqli_fetch_assoc($totalResult);
$total = $totalRow['total'];

// Calcular el número total de páginas
$totalPages = ceil($total / $limit);

// Generar las filas de la tabla
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr class='border-b hover:bg-gray-100 transition'>";
    echo "<td class='p-4'>" . $row['Nombre del Profesor'] . "</td>";
    echo "<td class='p-4'>" . $row['telefono'] . "</td>";
    echo "<td class='p-4'>" . $row['asignatura'] . "</td>";
    echo "<td class='p-4 font-semibold'>" . $row['categoria'] . "</td>";
    echo "</tr>";
}

// Generar los botones de paginación
echo "<tr><td colspan='4' class='p-4'>";
echo "<div class='flex justify-center space-x-2'>";

$maxButtons = 5;
$startPage = max(1, $page - floor($maxButtons / 2));
$endPage = min($totalPages, $startPage + $maxButtons - 1);

if ($startPage > 1) {
    echo "<button class='pagination-button cursor-pointer px-4 py-2 rounded bg-gray-200 text-gray-700 hover:bg-gray-300' data-page='1'>1</button>";
    if ($startPage > 2) {
        echo "<span class='px-4 py-2'>...</span>";
    }
}

for ($i = $startPage; $i <= $endPage; $i++) {
    echo "<button class='pagination-button cursor-pointer px-4 py-2 rounded ";
    if ($i == $page) {
        echo "bg-gray-800 text-white";
    } else {
        echo "bg-gray-200 text-gray-700 hover:bg-gray-300";
    }
    echo "' data-page='$i'>$i</button>";
}

if ($endPage < $totalPages) {
    if ($endPage < $totalPages - 1) {
        echo "<span class='px-4 py-2'>...</span>";
    }
    echo "<button class='pagination-button cursor-pointer px-4 py-2 rounded bg-gray-200 text-gray-700 hover:bg-gray-300' data-page='$totalPages'>$totalPages</button>";
}

echo "</div>";
echo "</td></tr>";
?>
