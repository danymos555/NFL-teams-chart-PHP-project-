

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
// Obtener el ID del equipo de la URL
$equipo_id = $_GET['equipo_id'];


// Consultar jugadores del equipo seleccionado
if ($equipo_id == 0) {
    // Mostrar nuevos jugadores
    $sql_select_jugadores = "SELECT equipos.nombre AS equipo, nuevos_jugadores.nombre, nuevos_jugadores.numero, nuevos_jugadores.posicion
                            FROM nuevos_jugadores
                            INNER JOIN equipos ON nuevos_jugadores.equipo_id = equipos.id";
} else {
    // Mostrar jugadores existentes
    $sql_select_jugadores = "SELECT * FROM jugadores WHERE equipo_id = $equipo_id";
}

$result_jugadores = $conn->query($sql_select_jugadores);

// Mostrar resultados
if ($result_jugadores->num_rows > 0) {
    echo "<h2>Jugadores:</h2>";
    echo "<ul>";
    while ($row = $result_jugadores->fetch_assoc()) {
        echo "<li>";
        echo "Nombre: " . $row["nombre"] . ", Número: " . $row["numero"] . ", Posición: " . $row["posicion"];
        echo "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No hay jugadores registrados para este equipo.</p>";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
