// Se asegura de que el DOM esté completamente cargado antes de ejecutar el script
document.addEventListener('DOMContentLoaded', function() {
    // Añade un evento que se dispara cuando se cambia el estado del checkbox "Editar Contraseña"
    document.getElementById('editarContraseniaCheckbox').addEventListener('change', function(event) {
        var isChecked = event.target.checked; // Verifica si el checkbox está marcado
        var contrasenia = document.getElementById('txtContrasenia'); // Obtiene el campo de contraseña
        var confirmarContrasenia = document.getElementById('txtContraseniaConf'); // Obtiene el campo de confirmar contraseña

        // Habilita o deshabilita los campos de contraseña según el estado del checkbox
        if (isChecked) {
            contrasenia.disabled = false;
            confirmarContrasenia.disabled = false;
        } else {
            contrasenia.disabled = true;
            confirmarContrasenia.disabled = true;
        }
    });

    // Añade un evento que se dispara cuando se envía el formulario
    document.getElementById('formulario').addEventListener('submit', function(event) {
        var contrasenia = document.getElementById('txtContrasenia').value; // Obtiene el valor del campo de contraseña
        var confirmarContrasenia = document.getElementById('txtContraseniaConf').value; // Obtiene el valor del campo de confirmar contraseña
        var email = document.getElementById('txtCorreo').value; // Obtiene el valor del campo de correo electrónico
        var mensajeError = ''; // Inicializa una variable para el mensaje de error

        // Validación de correo electrónico
        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/; // Patrón regex para un correo electrónico válido
        if (!emailPattern.test(email)) { // Comprueba si el correo electrónico no es válido
            mensajeError = 'El correo electrónico no es válido.'; // Establece un mensaje de error
        }

        // Validación de contraseñas si el campo no está deshabilitado
        if (!document.getElementById('txtContrasenia').disabled) {
            if (contrasenia !== confirmarContrasenia) { // Comprueba si las contraseñas no coinciden
                mensajeError = 'Las contraseñas no coinciden.'; // Establece un mensaje de error
            } else if (!contrasenia.match(/[A-Z]/)) { // Comprueba si la contraseña no tiene al menos una letra mayúscula
                mensajeError = 'La contraseña debe contener al menos una letra mayúscula.'; // Establece un mensaje de error
            } else if (!contrasenia.match(/[a-z]/)) { // Comprueba si la contraseña no tiene al menos una letra minúscula
                mensajeError = 'La contraseña debe contener al menos una letra minúscula.'; // Establece un mensaje de error
            } else if (!contrasenia.match(/[0-9]/)) { // Comprueba si la contraseña no tiene al menos un número
                mensajeError = 'La contraseña debe contener al menos un número.'; // Establece un mensaje de error
            } else if (contrasenia.length < 9) { // Comprueba si la contraseña no tiene al menos 9 caracteres
                mensajeError = 'La contraseña debe tener al menos 9 caracteres.'; // Establece un mensaje de error
            }
        }

        // Si hay algún mensaje de error, evita que el formulario se envíe y muestra el mensaje de error
        if (mensajeError !== '') {
            event.preventDefault(); // Evita que el formulario se envíe
            alert(mensajeError); // Muestra el mensaje de error
        }
    });

    // Función para alternar la visibilidad de la contraseña
    function togglePasswordVisibility(id) {
        var input = document.getElementById(id); // Obtiene el campo de entrada por su ID
        if (input.type === "password") { // Si el tipo de entrada es "password"
            input.type = "text"; // Cambia el tipo de entrada a "text" para mostrar la contraseña
        } else {
            input.type = "password"; // Cambia el tipo de entrada a "password" para ocultar la contraseña
        }
    }

    // Hace que la función togglePasswordVisibility esté disponible globalmente
    window.togglePasswordVisibility = togglePasswordVisibility;
});
