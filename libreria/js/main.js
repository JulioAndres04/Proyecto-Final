// Validacion del formulario de contacto
// Se ejecuta cuando el usuario intenta enviar el formulario

document.addEventListener('DOMContentLoaded', function() {
    // Buscamos el formulario por su id
    var formulario = document.getElementById('formContacto');

    // Solo si existe el formulario en la pagina (o sea, estamos en contacto.php)
    if (formulario) {
        formulario.addEventListener('submit', function(e) {
            // Obtenemos los valores de los campos
            var nombre = document.getElementById('nombre').value.trim();
            var correo = document.getElementById('correo').value.trim();
            var asunto = document.getElementById('asunto').value.trim();
            var comentario = document.getElementById('comentario').value.trim();

            // Verificamos que ningun campo este vacio
            if (nombre === '' || correo === '' || asunto === '' || comentario === '') {
                alert('Por favor, llena todos los campos antes de enviar.');
                e.preventDefault(); // Detenemos el envio
                return;
            }

            // Verificamos que el correo tenga un formato valido con regex
            var regexCorreo = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (!regexCorreo.test(correo)) {
                alert('Por favor, ingresa un correo electrónico válido.');
                e.preventDefault(); // Detenemos el envio
                return;
            }

            // Si todo esta bien, el formulario se envia normalmente
        });
    }
});
