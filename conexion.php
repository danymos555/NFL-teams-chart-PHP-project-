<?php
// Declaración de las variables para la conexión con la BD
$db = 'fubol'; // nombre de la BD
$host = 'localhost'; // nombre del servidor
$pw = ""; // contraseña
$user = 'root';

// Conexión con la BD
$con = mysqli_connect($host, $user, $pw, $db) or die('No se pudo autenticar con la BD');
mysqli_select_db($con, $db) or die('No se pudo conectar a la BD');
?>
