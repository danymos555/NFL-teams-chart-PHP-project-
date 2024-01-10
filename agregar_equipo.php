


<?php
session_start();

// Verificar si el usuario está autenticado para agregar información
if (isset($_SESSION["usuario_autenticado"]) && $_SESSION["usuario_autenticado"] === true) {
    // Verificar si se recibieron datos del formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

        // Obtener datos del formulario
        $nombre = $_POST["nombre"];
        $estado = $_POST["estado"];
        $fundacion = $_POST["fundacion"];
        $partidos_jugados = $_POST["partidos_jugados"];
        $victorias = $_POST["victorias"];
        $derrotas = $_POST["derrotas"];
        $empates = $_POST["empates"];
        // Información del jugador
        $nombre_jugador = $_POST['nombre_jugador'];
        $numero_jugador = $_POST['numero_jugador'];
        $posicion_jugador = $_POST['posicion_jugador'];

        // Insertar nuevo equipo en la base de datos
        $sql_insert_equipo = "INSERT INTO equipos (nombre, estado, año_fundacion) VALUES ('$nombre', '$estado', $fundacion)";
        $conn->query($sql_insert_equipo);

        // Obtener el ID del equipo recién insertado
        $equipo_id = $conn->insert_id;
        $sql_insert_jugador = "INSERT INTO jugadores (equipo_id, nombre, numero, posicion) VALUES ($equipo_id, '$nombre_jugador', $numero_jugador, '$posicion_jugador')";
        $conn->query($sql_insert_jugador);

        // Insertar datos del partido para el nuevo equipo
        $sql_insert_partido = "INSERT INTO partidos (equipo_id, partidos_jugados, partidos_ganados, partidos_perdidos, partidos_empatados) VALUES ($equipo_id, $partidos_jugados, $victorias, $derrotas, $empates)";
        $conn->query($sql_insert_partido);

        // Cerrar la conexión a la base de datos
        $conn->close();

        // Redireccionar a la página principal u otra página
        header("Location: index.php");
        exit();
    }
    // Si no está autenticado, redirigir a la página de inicio de sesión
    header("Location: index.php");
    exit();
}

 else {
    // Si no está autenticado, redirigir a la página de inicio de sesión
    header("Location: login.php");
    exit();
}



?>

