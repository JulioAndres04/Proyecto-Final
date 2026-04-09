<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librería Online</title>
    <!-- Bootstrap 5 desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Iconos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Nuestro CSS personalizado -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Barra de navegacion -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <i class="bi bi-book"></i> Librería Online
        </a>
        <!-- Boton hamburguesa para celulares -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Links del menu -->
        <div class="collapse navbar-collapse" id="menuPrincipal">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php"><i class="bi bi-house"></i> Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="libros.php"><i class="bi bi-journal-text"></i> Libros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="autores.php"><i class="bi bi-people"></i> Autores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contacto.php"><i class="bi bi-envelope"></i> Contacto</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Espacio para que el contenido no quede debajo del navbar -->
<div style="margin-top: 70px;"></div>
