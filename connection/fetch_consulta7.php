<?php
include '../config/db.php';

// Consulta para obtener los registros
$query = "SELECT  
            CONCAT(profesor.nombre, ' ', profesor.apellido1, ' ', profesor.apellido2) AS Nombre, 
            COUNT(matricula.nota) AS Total_alumnos, 
            AVG(matricula.nota) AS Promedios 
          FROM profesor 
          JOIN impartir ON impartir.idProfesor = profesor.idProfesor 
          JOIN matricula ON matricula.idAsignatura = impartir.idAsignatura 
          GROUP BY profesor.idProfesor 
          ORDER BY Promedios DESC 
          LIMIT 10";
$result = mysqli_query($conn, $query);

// Generar las filas de la tabla
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr class='border-b hover:bg-gray-100 transition'>";
    echo "<td class='p-4'>" . $row['Nombre'] . "</td>";
    echo "<td class='p-4'>" . $row['Total_alumnos'] . "</td>";
    echo "<td class='p-4'>" . $row['Promedios'] . "</td>";
    echo "</tr>";
}
?>