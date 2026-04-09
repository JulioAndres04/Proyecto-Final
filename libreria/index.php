<?php
// Mostrar errores para depuracion
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Pagina principal - Libreria Online
// Aqui mostramos las estadisticas generales (total de libros y autores)

// Incluimos el header con el menu
include 'includes/header.php';
// Incluimos la conexion a la base de datos
require 'config/database.php';

try {
    // Consultamos cuantos libros hay en total
    $queryLibros = $conexion->query("SELECT COUNT(*) as total FROM titulos");
    $totalLibros = $queryLibros->fetch();

    // Consultamos cuantos autores hay
    $queryAutores = $conexion->query("SELECT COUNT(*) as total FROM autores");
    $totalAutores = $queryAutores->fetch();

} catch (PDOException $e) {
    echo "Error al consultar los datos: " . $e->getMessage();
}
?>

<!-- Banner principal -->
<div class="hero-section">
    <div class="container">
        <h1><i class="bi bi-book"></i> Librería Online</h1>
        <p>Tu biblioteca digital favorita. Explora nuestro catálogo de libros y autores.</p>
    </div>
</div>

<div class="container">
    <!-- Seccion de estadisticas -->
    <h3 class="titulo-seccion"><i class="bi bi-bar-chart"></i> Estadísticas Generales</h3>

    <div class="row justify-content-center">
        <!-- Card de total de libros -->
        <div class="col-md-5 mb-4">
            <div class="card card-stats text-center">
                <div class="card-body">
                    <i class="bi bi-journal-text"></i>
                    <h2><?php echo $totalLibros['total']; ?></h2>
                    <p class="text-muted mb-0">Libros en nuestro catálogo</p>
                    <a href="libros.php" class="btn btn-outline-dark mt-3">Ver Libros</a>
                </div>
            </div>
        </div>

        <!-- Card de total de autores -->
        <div class="col-md-5 mb-4">
            <div class="card card-stats text-center">
                <div class="card-body">
                    <i class="bi bi-people"></i>
                    <h2><?php echo $totalAutores['total']; ?></h2>
                    <p class="text-muted mb-0">Autores registrados</p>
                    <a href="autores.php" class="btn btn-outline-dark mt-3">Ver Autores</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Seccion informativa -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card card-stats">
                <div class="card-body text-center">
                    <h4>Bienvenido a nuestra Librería</h4>
                    <p class="text-muted">
                        Aquí podrás consultar nuestro catálogo completo de libros, conocer a los autores
                        y ponerte en contacto con nosotros. Navega usando el menú de arriba.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Incluimos el footer
include 'includes/footer.php';
?>
