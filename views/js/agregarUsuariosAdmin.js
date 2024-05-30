// Añade un evento que se dispara cuando se envía el formulario
document.getElementById('formulario').addEventListener('submit', function(event) {
    var contrasenia = document.getElementById('txtContrasenia').value; // Obtiene el valor del campo de contraseña
    var confirmarContrasenia = document.getElementById('txtContraseniaConf').value; // Obtiene el valor del campo de confirmar contraseña
    var mensajeError = ''; // Inicializa una variable para el mensaje de error

    // Validación de contraseñas
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

