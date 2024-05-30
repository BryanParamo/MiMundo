document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('crearCuentaForm');
    const togglePassword = document.getElementById('togglePassword');
    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
    const password = document.getElementById('contrasena');
    const confirmPassword = document.getElementById('confirmarContrasena');

    togglePassword.addEventListener('click', function() {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
    });

    toggleConfirmPassword.addEventListener('click', function() {
        const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
        confirmPassword.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
    });

    form.addEventListener('submit', function(event) {
        event.preventDefault();
        let isValid = true;

        // Limpiar mensajes de error previos
        document.querySelectorAll('.error-message').forEach(el => el.textContent = '');

        // Validar nombre
        const nombre = document.getElementById('nombre');
        if (nombre.value.trim() === '') {
            isValid = false;
            mostrarError('errorNombre', 'El nombre es requerido.');
        }

        // Validar apellido paterno
        const apellidoPaterno = document.getElementById('apellidoPaterno');
        if (apellidoPaterno.value.trim() === '') {
            isValid = false;
            mostrarError('errorApellidoPaterno', 'El apellido paterno es requerido.');
        }

        // Validar correo
        const correo = document.getElementById('correo');
        if (correo.value.trim() === '') {
            isValid = false;
            mostrarError('errorCorreo', 'El correo es requerido.');
        } else if (!validarCorreo(correo.value)) {
            isValid = false;
            mostrarError('errorCorreo', 'El formato del correo no es válido.');
        }

        // Validar contraseña
        const contrasena = document.getElementById('contrasena');
        const confirmarContrasena = document.getElementById('confirmarContrasena');
        if (contrasena.value.trim() === '') {
            isValid = false;
            mostrarError('errorContrasena', 'La contraseña es requerida.');
        }

        // Validar confirmar contraseña
        if (confirmarContrasena.value.trim() === '') {
            isValid = false;
            mostrarError('errorConfirmarContrasena', 'Confirmar contraseña es requerido.');
        } else if (contrasena.value !== confirmarContrasena.value) {
            isValid = false;
            mostrarError('errorConfirmarContrasena', 'Las contraseñas no coinciden.');
        }

        // Validar género
        const genero = document.getElementById('genero');
        if (genero.value.trim() === '') {
            isValid = false;
            mostrarError('errorGenero', 'El género es requerido.');
        }

        // Si el formulario es válido, enviar los datos
        if (isValid) {
            form.submit();
        }
    });

    function mostrarError(id, mensaje) {
        const errorElement = document.getElementById(id);
        errorElement.textContent = mensaje;
    }

    function validarCorreo(correo) {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(correo);
    }
});
