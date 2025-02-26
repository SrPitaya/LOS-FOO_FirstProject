<?php
include '../config/db.php';

// Consulta para obtener los registros
$query = "SELECT 
            COUNT(alumno.idAlumno) AS Cantidad_Alumnos, 
            (SELECT COUNT(alumno.beca) FROM alumno WHERE beca = 'si') AS Cantidad_Becados, 
            CONCAT((SELECT COUNT(alumno.beca) FROM alumno WHERE beca = 'si') * 100 / COUNT(alumno.idAlumno), '%') AS Porcentaje_Becado 
          FROM alumno";
$result = mysqli_query($conn, $query);

// Generar las filas de la tabla
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr class='border-b hover:bg-gray-100 transition'>";
    echo "<td class='p-4'>" . $row['Cantidad_Alumnos'] . "</td>";
    echo "<td class='p-4'>" . $row['Cantidad_Becados'] . "</td>";
    echo "<td class='p-4'>" . $row['Porcentaje_Becado'] . "</td>";
    echo "</tr>";
}
?>