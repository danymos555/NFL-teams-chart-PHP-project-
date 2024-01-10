<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipos de Fútbol Americano</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
    <div class = 'header-content'>
        <img src="nfl.png" alt="Logo" class="logo"> 
            <h1>Equipos de Fútbol Americano</h1>
    </div>

    <nav>
        <ul class="navbar-ul">
            <!-- ... Otras opciones de navegación ... -->
            
            <?php if (isset($_SESSION["usuario_autenticado"]) && $_SESSION["usuario_autenticado"] === true) : ?>
                <li class="navbar-li"><a href="logout.php" class="navbar-a">Cerrar Sesión</a></li>
                <nav>
            <ul class="navbar-ul">
                <li class="navbar-li"><a class="navbar-a" href="index.php">Inicio</a></li>
                <li class="navbar-li"><a class="navbar-a" href="nuevoequipo.php">Agregar Nuevo Equipo</a></li>
                <li class="navbar-li"><a class="navbar-a" href="estadisticas.php">Ver estadísticas</a></li>
            </ul>
        </nav>
            <?php else : ?>
                <li class="navbar-li"><a href="login.php" class="navbar-a">Iniciar Sesión</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
        



  