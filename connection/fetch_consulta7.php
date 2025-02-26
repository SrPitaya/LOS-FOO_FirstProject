<?php
include '../config/db.php';

// Consulta para obtener los registros
$query = "SELECT 
            CONCAT(profesor.nombre, ' ', profesor.apellido1, ' ', profesor.apellido2) AS Nombre_Profesor, 
            COUNT(CASE WHEN matricula.nota = 10 THEN 1 END) AS Mejores_Promedios 
          FROM profesor 
          JOIN impartir ON impartir.idProfesor = profesor.idProfesor 
          JOIN matricula ON matricula.idAsignatura = impartir.idAsignatura 
          GROUP BY Nombre_Profesor 
          ORDER BY Mejores_Promedios DESC 
          LIMIT 10";
$result = mysqli_query($conn, $query);

// Generar las filas de la tabla
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr class='border-b hover:bg-gray-100 transition'>";
    echo "<td class='p-4'>" . $row['Nombre_Profesor'] . "</td>";
    echo "<td class='p-4'>" . $row['Mejores_Promedios'] . "</td>";
    echo "</tr>";
}
?>