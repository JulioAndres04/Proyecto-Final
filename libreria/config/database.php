<?php
// Conexion a la base de datos usando PDO
// Datos del servidor local (XAMPP)

$host = 'sql305.infinityfree.com';
$dbname = 'if0_41615523_db_libreria';
$usuario = 'if0_41615523';
$password = 'nP1WMt2QQJyfR5';

try {
    // Creamos la conexion con PDO
    $conexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $password);
    // Para que nos muestre los errores si algo sale mal
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Si no se puede conectar, mostramos el error
    die("Error al conectar con la base de datos: " . $e->getMessage());
}
?>
