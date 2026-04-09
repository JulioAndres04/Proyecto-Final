<?php
// Pagina de Libros - Libreria Online
// Aqui mostramos todos los libros con su autor usando JOIN

include 'includes/header.php';
require 'config/database.php';

// Arreglo para traducir los tipos de libro al español
$tiposEspanol = array(
    'business'      => 'Negocios',
    'mod_cook'      => 'Cocina Moderna',
    'popular_comp'  => 'Computación',
    'psychology'    => 'Psicología',
    'trad_cook'     => 'Cocina Tradicional',
    'UNDECIDED'     => 'Sin clasificar'
);

try {
    // Hacemos el JOIN entre titulos, titulo_autor y autores
    $sql = "SELECT t.id_titulo, t.titulo, t.tipo, t.precio, t.total_ventas, 
            t.fecha_pub, a.nombre, a.apellido 
            FROM titulos t 
            LEFT JOIN titulo_autor ta ON t.id_titulo = ta.id_titulo 
            LEFT JOIN autores a ON ta.id_autor = a.id_autor";

    $query = $conexion->query($sql);
    $libros = $query->fetchAll();

    // Contamos el total de libros
    $totalLibros = count($libros);

} catch (PDOException $e) {
    echo "Error al obtener los libros: " . $e->getMessage();
    $libros = [];
    $totalLibros = 0;
}
?>

<div class="container">
    <h2 class="titulo-seccion"><i class="bi bi-journal-text"></i> Catálogo de Libros</h2>

    <!-- Mostramos el total -->
    <div class="alert alert-info">
        <i class="bi bi-info-circle"></i> Se encontraron <strong><?php echo $totalLibros; ?></strong> libros en total.
    </div>

    <!-- Tabla con los libros -->
    <div class="table-responsive">
        <table class="table table-striped tabla-libros">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Tipo</th>
                    <th>Precio</th>
                    <th>Autor</th>
                    <th>Total Ventas</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Recorremos todos los libros con foreach
                foreach ($libros as $libro) {
                    // Traducimos el tipo al español, si no esta en el arreglo dejamos el original
                    $tipo = isset($tiposEspanol[$libro['tipo']]) ? $tiposEspanol[$libro['tipo']] : $libro['tipo'];

                    // Armamos el nombre completo del autor
                    $autor = trim($libro['nombre'] . ' ' . $libro['apellido']);
                    if (empty(trim($autor))) {
                        $autor = 'Sin autor';
                    }

                    // Formateamos el precio
                    $precio = ($libro['precio'] != null) ? '$' . number_format($libro['precio'], 2) : 'N/A';
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($libro['id_titulo']); ?></td>
                    <td><?php echo htmlspecialchars($libro['titulo']); ?></td>
                    <td><span class="badge bg-secondary badge-tipo"><?php echo $tipo; ?></span></td>
                    <td><?php echo $precio; ?></td>
                    <td><?php echo htmlspecialchars($autor); ?></td>
                    <td><?php echo $libro['total_ventas'] ?? 0; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include 'includes/footer.php';
?>
