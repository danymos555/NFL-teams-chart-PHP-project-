<?php
session_start();

// Cerrar sesión y redirigir a la página de inicio
session_unset();
session_destroy();
header("Location: index.php");
exit();
?>
