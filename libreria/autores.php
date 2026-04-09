<?php
// Pagina de Autores - Libreria Online
// Mostramos todos los autores con su biografia si tienen

include 'includes/header.php';
require 'config/database.php';

try {
    // JOIN entre autores y biografias para obtener toda la info
    $sql = "SELECT a.*, b.biografia 
            FROM autores a 
            LEFT JOIN biografias b ON a.id_autor = b.id_autor";

    $query = $conexion->query($sql);
    $autores = $query->fetchAll();

    // Total de autores usando count()
    $totalAutores = count($autores);

} catch (PDOException $e) {
    echo "Error al obtener los autores: " . $e->getMessage();
    $autores = [];
    $totalAutores = 0;
}
?>

<div class="container">
    <h2 class="titulo-seccion"><i class="bi bi-people"></i> Nuestros Autores</h2>

    <!-- Total de autores -->
    <div class="alert alert-info">
        <i class="bi bi-info-circle"></i> Se encontraron <strong><?php echo $totalAutores; ?></strong> autores registrados.
    </div>

    <!-- Cards de autores -->
    <div class="row">
        <?php
        // Recorremos todos los autores con foreach
        foreach ($autores as $autor) {
            // Nombre completo
            $nombreCompleto = trim($autor['nombre']) . ' ' . trim($autor['apellido']);
        ?>
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card card-autor">
                <div class="card-header">
                    <i class="bi bi-person-circle"></i> <?php echo htmlspecialchars($nombreCompleto); ?>
                </div>
                <div class="card-body">
                    <p><strong><i class="bi bi-geo-alt"></i> Ciudad:</strong> <?php echo htmlspecialchars($autor['ciudad']); ?></p>
                    <p><strong><i class="bi bi-map"></i> Estado:</strong> <?php echo htmlspecialchars($autor['estado']); ?></p>
                    <p><strong><i class="bi bi-globe"></i> País:</strong> <?php echo htmlspecialchars($autor['pais']); ?></p>

                    <?php
                    // Si el autor tiene biografia la mostramos
                    if (!empty($autor['biografia'])) {
                    ?>
                        <hr>
                        <p class="text-muted"><strong>Biografía:</strong><br>
                        <?php echo htmlspecialchars($autor['biografia']); ?></p>
                    <?php } else { ?>
                        <hr>
                        <p class="text-muted fst-italic">No tiene biografía registrada.</p>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<?php
include 'includes/footer.php';
?>
