
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

// Verificar si se ha seleccionado un equipo
if (isset($_GET['equipo_id'])) {
    $equipo_id = $_GET['equipo_id'];

    // Establecer una cookie que recuerde el último equipo seleccionado
    setcookie('ultimo_equipo', $equipo_id, time() + (86400 * 30), "/"); // Cookie válida por 30 días
} elseif (isset($_COOKIE['ultimo_equipo'])) {
    $equipo_id = $_COOKIE['ultimo_equipo'];
} else {
    // Si no hay equipo seleccionado y no hay cookie, puedes establecer un valor predeterminado
    $equipo_id = 0;
}

// Consultar equipos
$sql_select_equipos = "SELECT * FROM equipos";
$result_equipos = $conn->query($sql_select_equipos);

// Mostrar resultados
if ($result_equipos->num_rows > 0) {
    echo "<h2>Equipos Insertados:</h2>";
    echo "<ul>";

    while ($row = $result_equipos->fetch_assoc()) {
        echo "<li><span data-id='{$row['id']}'>{$row['id']}</span> Nombre: " . $row["nombre"] . ", Estado: " . $row["estado"] . ", Año de Fundación: " . $row["año_fundacion"];
        if ($row['id'] == $equipo_id) {
            echo " (Seleccionado)";
        }
        echo "</li>";
        echo "<li><a href='jugadores.php?equipo_id={$row['id']}' class='jugadores-link'>Ver más información</a></li>";
    }
    





   
    echo "</ul>";
} else {
    echo "<p>No hay equipos disponibles.</p>";
}

echo "<h3 class='button-container'><a href='nuevoequipo.php' class='agregar-equipo-button'>Agregar Nuevo Equipo</a>";
echo "<a href='estadisticas.php' class='agregar-equipo-button'>Ver Estadísticas</a></h3>";

// Cerrar la conexión a la base de datos
$conn->close();
?>




<script>
// Script JavaScript para manejar la cookie
document.addEventListener('DOMContentLoaded', function() {
    // Obtener la lista de elementos de equipos
    var equipos = document.querySelectorAll('ul li span');

    // Agregar un evento de clic a cada elemento de equipo
    equipos.forEach(function(equipo) {
        equipo.addEventListener('click', function() {
            // Obtener el ID del equipo haciendo clic
            var equipoId = this.getAttribute('data-id');

            // Establecer una cookie que recuerde el último equipo seleccionado
            document.cookie = 'ultimo_equipo=' + equipoId + '; expires=' + new Date(new Date().getTime() + (86400 * 30 * 1000)).toUTCString() + '; path=/';

            // Recargar la página para reflejar el cambio en el último equipo seleccionado
            location.reload();
        });
    });
});
</script>


