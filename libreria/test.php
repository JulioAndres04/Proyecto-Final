<?php
// Archivo de prueba para verificar que PHP funciona
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>PHP funciona correctamente</h1>";
echo "<p>Version de PHP: " . phpversion() . "</p>";

// Probar conexion a la base de datos
echo "<h2>Probando conexion a la base de datos...</h2>";

try {
    $conexion = new PDO(
        "mysql:host=sql305.infinityfree.com;dbname=if0_41615523_db_libreria;charset=utf8",
        "if0_41615523",
        "nP1WMt2QQJyfR5"
    );
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p style='color:green;'>Conexion exitosa!</p>";

    // Ver tablas
    $tablas = $conexion->query("SHOW TABLES")->fetchAll();
    echo "<p>Tablas encontradas: " . count($tablas) . "</p>";
    foreach ($tablas as $t) {
        echo "<li>" . array_values($t)[0] . "</li>";
    }
} catch (PDOException $e) {
    echo "<p style='color:red;'>Error: " . $e->getMessage() . "</p>";
}
?>
