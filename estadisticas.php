





<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas de Partidos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php
session_start();
include('header.php');

// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fubol";

// Crear conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}



// Consultar estadísticas de partidos
$sql_select_estadisticas = "SELECT equipos.nombre AS equipo, partidos.partidos_jugados, partidos.partidos_ganados, partidos.partidos_perdidos, partidos.partidos_empatados
                            FROM equipos
                            JOIN partidos ON equipos.id = partidos.equipo_id";
$result_estadisticas = $conn->query($sql_select_estadisticas);

// Mostrar resultados
if ($result_estadisticas->num_rows > 0) {
    echo "<h2>Estadísticas de Partidos:</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Equipo</th><th>Partidos Jugados</th><th>Victorias</th><th>Derrotas</th><th>Empates</th></tr>";
    while ($row = $result_estadisticas->fetch_assoc()) {
        echo "<tr><td>{$row['equipo']}</td><td>{$row['partidos_jugados']}</td><td>{$row['partidos_ganados']}</td><td>{$row['partidos_perdidos']}</td><td>{$row['partidos_empatados']}</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p>No hay estadísticas disponibles.</p>";
}
 
// Cerrar la conexión a la base de datos
$conn->close();
?>

</body>
</html>







