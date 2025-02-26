<?php
include '../config/db.php';

// Número de registros por página
$limit = 10;

// Obtener el número de página actual desde la solicitud AJAX
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Consulta para obtener los registros de la página actual
$query = "SELECT asignatura.nombre AS Materia, matricula.nota AS Calificaciones, 
          CONCAT(alumno.nombre, ' ', alumno.apellido1, ' ', alumno.apellido2) AS Lista_de_Alumnos 
          FROM alumno  
          JOIN matricula ON matricula.idAlumno = alumno.idAlumno 
          JOIN asignatura ON matricula.idAsignatura = asignatura.idAsignatura 
          ORDER BY asignatura.idAsignatura, Calificaciones
          LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn, $query);

// Consulta para obtener el total de registros
$totalQuery = "SELECT COUNT(*) as total FROM matricula";
$totalResult = mysqli_query($conn, $totalQuery);
$totalRow = mysqli_fetch_assoc($totalResult);
$total = $totalRow['total'];

// Calcular el número total de páginas
$totalPages = ceil($total / $limit);

// Generar las filas de la tabla
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr class='border-b hover:bg-gray-100 transition'>";
    echo "<td class='p-4'>" . $row['Materia'] . "</td>";
    echo "<td class='p-4'>" . $row['Calificaciones'] . "</td>";
    echo "<td class='p-4'>" . $row['Lista_de_Alumnos'] . "</td>";
    echo "</tr>";
}

// Generar los botones de paginación
echo "<tr><td colspan='3' class='p-4'>";
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
