<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>PeliStream</title>
    <link rel="stylesheet" href="css/style.css?v=4">
</head>
<body>
    <header class="navbar">
        <div class="navbar-brand">
            <a href="?url=peliculas/listar">PeliStream</a>
        </div>
        <nav>
            <ul class="navbar-nav">
                <li><a href="?url=peliculas/listar">Peliculas</a></li>
                <?php if ($_SESSION['usuario_rol'] == 'admin'): ?>
                    <li><a href="?url=generos/listar">Generos</a></li>
                    <li><a href="?url=usuarios/listar">Usuarios</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <div class="nav-user">
            <span>Hola, <?php echo $_SESSION['usuario_nombre']; ?></span>
            <a href="?url=auth/logout" class="btn-logout">Salir</a>
        </div>
    </header>
    <main class="container">
