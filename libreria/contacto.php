<?php
// Pagina de Contacto - Libreria Online
// Formulario para que los usuarios nos escriban
// Los datos se guardan en la tabla 'contacto' de la base de datos

include 'includes/header.php';
require 'config/database.php';

$mensaje = '';
$tipoMensaje = '';

// Verificamos si se envio el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Recibimos los datos del formulario con $_POST
    $nombre = $_POST['nombre'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $asunto = $_POST['asunto'] ?? '';
    $comentario = $_POST['comentario'] ?? '';

    // Verificamos que no esten vacios
    if (!empty($nombre) && !empty($correo) && !empty($asunto) && !empty($comentario)) {

        try {
            // Preparamos la consulta con prepared statements para seguridad
            $sql = "INSERT INTO contacto (fecha, correo, nombre, asunto, comentario) 
                    VALUES (NOW(), :correo, :nombre, :asunto, :comentario)";

            $stmt = $conexion->prepare($sql);

            // Ejecutamos con los datos
            $stmt->execute(array(
                ':correo' => $correo,
                ':nombre' => $nombre,
                ':asunto' => $asunto,
                ':comentario' => $comentario
            ));

            $mensaje = '¡Mensaje enviado correctamente! Gracias por contactarnos.';
            $tipoMensaje = 'success';

            // Limpiamos las variables para que el formulario quede vacio
            $nombre = '';
            $correo = '';
            $asunto = '';
            $comentario = '';

        } catch (PDOException $e) {
            $mensaje = 'Error al guardar el mensaje: ' . $e->getMessage();
            $tipoMensaje = 'danger';
        }

    } else {
        $mensaje = 'Por favor, completa todos los campos.';
        $tipoMensaje = 'warning';
    }
}
?>

<div class="container">
    <h2 class="titulo-seccion"><i class="bi bi-envelope"></i> Contáctanos</h2>

    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- Mostramos mensaje de exito o error si hay -->
            <?php if (!empty($mensaje)) { ?>
                <div class="alert alert-<?php echo $tipoMensaje; ?> alert-dismissible fade show">
                    <?php echo htmlspecialchars($mensaje); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php } ?>

            <!-- Formulario de contacto -->
            <div class="form-contacto">
                <form id="formContacto" method="POST" action="contacto.php">

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                               value="<?php echo htmlspecialchars($nombre ?? ''); ?>"
                               placeholder="Escribe tu nombre">
                    </div>

                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="correo" name="correo"
                               value="<?php echo htmlspecialchars($correo ?? ''); ?>"
                               placeholder="ejemplo@correo.com">
                    </div>

                    <div class="mb-3">
                        <label for="asunto" class="form-label">Asunto</label>
                        <input type="text" class="form-control" id="asunto" name="asunto"
                               value="<?php echo htmlspecialchars($asunto ?? ''); ?>"
                               placeholder="¿De qué se trata?">
                    </div>

                    <div class="mb-3">
                        <label for="comentario" class="form-label">Comentario</label>
                        <textarea class="form-control" id="comentario" name="comentario"
                                  rows="5" placeholder="Escribe tu mensaje aquí..."><?php echo htmlspecialchars($comentario ?? ''); ?></textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-enviar">
                            <i class="bi bi-send"></i> Enviar Mensaje
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<?php
include 'includes/footer.php';
?>
