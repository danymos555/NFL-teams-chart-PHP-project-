<?php
session_start();

// Verificar si el usuario ya está autenticado
if (isset($_SESSION["usuario_autenticado"]) && $_SESSION["usuario_autenticado"] === true) {
    // Si ya está autenticado, redirigir a la página principal
    header("Location: index.php");
    exit();
}

// Verificar si se enviaron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar las credenciales
    $nombre_usuario = "usuario";
    $contrasena = "password";

    // Verificar si las credenciales coinciden
    if ($_POST["nombre_usuario"] == $nombre_usuario && $_POST["contrasena"] == $contrasena) {
        // Iniciar sesión y establecer el marcador de autenticación
        $_SESSION["usuario_autenticado"] = true;

        // Redirigir a la página principal
        header("Location: index.php");
        exit();
    } else {
        // Credenciales incorrectas, mostrar mensaje de error
        $mensaje_error = "Nombre de usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php include('header.php'); ?>

<div class="formulario-login">
    <h2>Iniciar Sesión</h2>
    
    <?php if (isset($mensaje_error)) : ?>
        <p class="error"><?php echo $mensaje_error; ?></p>
    <?php endif; ?>

    <form action="login.php" method="post">
        <label for="nombre_usuario">Nombre de Usuario:</label>
        <input type="text" name="nombre_usuario" id="nombre_usuario" required><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" id="contrasena" required><br>

        <input type="submit" value="Iniciar Sesión">
    </form>
</div>

</body>
</html>

