


<?php
session_start();
// Verificar si el usuario está autenticado para agregar información
if (isset($_SESSION["usuario_autenticado"]) && $_SESSION["usuario_autenticado"] === true) {
  include('header.php');
  echo "<div class='formulario-equipo'>";
  echo "<h2>Agregar Nuevo Equipo:</h2>";
  echo "<form action='agregar_equipo.php' method='post'>
          <label for='nombre'>Nombre:</label>
          <input type='text' name='nombre' id='nombre' required><br>
  
          <label for='estado'>Estado:</label>
          <input type='text' name='estado' id='estado' required><br>
  
          <label for='fundacion'>Año de Fundación:</label>
          <input type='text' name='fundacion' id='fundacion' required><br>
  
          <label for='partidos_jugados'>Partidos Jugados:</label>
          <input type='number' name='partidos_jugados' id='partidos_jugados' required><br>
  
          <label for='victorias'>Victorias:</label>
          <input type='number' name='victorias' id='victorias' required><br>
  
          <label for='derrotas'>Derrotas:</label>
          <input type='number' name='derrotas' id='derrotas' required><br>
  
          <label for='empates'>Empates:</label>
          <input type='number' name='empates' id='empates' required><br>
          <h3>Información del Jugador</h3>
          Nombre del Jugador: <input type='text' name='nombre_jugador' required><br>
          Número del Jugador: <input type='number' name='numero_jugador' required><br>
          Posición del Jugador: <input type='text' name='posicion_jugador' required><br>
          
  
          <input type='submit' value='Agregar Equipo'>
        </form>";
  echo "</div>";
} else {
  header("Location: login.php");
  exit();
 
}


?>



