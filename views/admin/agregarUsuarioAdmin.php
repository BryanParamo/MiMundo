<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Mundo</title>

    <!-- Fuentes y hojas de estilo -->
    <link href="https://fonts.googleapis.com/css2?family=Slabo+13px&family=Slabo+27px&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/agregarProductos.css">
</head>

<body>
    <?php
        // Requiere los archivos necesarios para la lógica de negocio y el modelo de datos
        require_once("../../data/DAOUsuario.php");
        require_once("../../model/Usuario.php");

        // Crear una instancia del objeto Usuario
        $usuario = new Usuario();

        // Verifica si el formulario fue enviado mediante el método POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Recoge los datos del formulario
            $correo = $_POST['correo'];
            $nombre = $_POST['nombre'];
            $apellido1 = $_POST['apellido1'];
            $apellido2 = $_POST['apellido2'];
            $contrasenia = $_POST['contrasenia'];
            $genero = $_POST['genero'];
            $rol = $_POST['rol']; // Recoger el rol ingresado
            
            // Asigna los datos al objeto Usuario
            $usuario->email = $correo;
            $usuario->nombre = $nombre;
            $usuario->apellido1 = $apellido1;
            $usuario->apellido2 = $apellido2;
            $usuario->contrasenia = $contrasenia;
            $usuario->genero = $genero;
            $usuario->rol = $rol; // Asigna el rol ingresado

            // Crear una instancia del objeto DAOUsuario
            $dao = new DAOUsuario();

            // Intenta agregar el usuario a la base de datos
            if ($dao->agregar($usuario) > 0) {
                // Redirige al administrador si la inserción es exitosa
                header("Location: usuariosAdmin.php");
            } else {
                // Muestra un mensaje de error si falla la inserción
                $error = 'Error al agregar usuario';
            }
        }

        // Incluye los componentes del menú y del encabezado
        require('../components/menuAdmin.php');
        require('../components/header.php');
    ?>

    <section class="contenedor">
        <div class="imagen__principal"></div>
    </section>

    <main class="contenedor">
        <div class="titulo">
            <h1 class="titulo__nombre">Agregar Usuarios</h1>
        </div>
        <div class="subir-producto">
            <img class="subir-producto__img" src="../img/MiMundoImg.jpg" alt="">
            <div class="subir-producto__formulario">
                <h2>Descripcion</h2>
                <!-- Formulario para agregar un usuario -->
                <form action="agregarUsuarioAdmin.php" method="POST" id="formulario">
                    <div>
                        <label for="txtCorreo">Correo</label>
                        <input type="email" name="correo" id="txtCorreo" required>
                        <p class="mensajeInf">Ingresa el correo del usuario</p>
                    </div>
                    <div>
                        <label for="txtNombre">Nombre</label>
                        <input type="text" name="nombre" id="txtNombre" minlength="3" maxlength="20" required>
                        <p class="mensajeInf">Ingresa el nombre del usuario</p>
                    </div>
                    <div>
                        <label for="txtApellidoP">Apellido P</label>
                        <input type="text" name="apellido1" id="txtApellidoP" minlength="3" maxlength="20" required>
                        <p class="mensajeInf">Ingresa el apellido paterno del usuario</p>
                    </div>
                    <div>
                        <label for="txtApellidoM">Apellido M</label>
                        <input type="text" name="apellido2" id="txtApellidoM" minlength="3" maxlength="20" required>
                        <p class="mensajeInf">Ingresa el apellido materno del usuario</p>
                    </div>
                    <div class="password-container">
                        <label for="txtContrasenia">Contraseña</label>
                        <input type="password" name="contrasenia" id="txtContrasenia" minlength="9" maxlength="20" required>
                        <span class="toggle-password" onclick="togglePasswordVisibility('txtContrasenia')">👁️</span>
                        <p class="mensajeInf">Ingresa la contraseña</p>
                    </div>
                    <div class="password-container">
                        <label for="txtContraseniaConf">Confirmar Contraseña</label>
                        <input type="password" id="txtContraseniaConf" minlength="9" maxlength="20" required>
                        <span class="toggle-password" onclick="togglePasswordVisibility('txtContraseniaConf')">👁️</span>
                        <p class="mensajeInf">Confirma la contraseña</p>
                    </div>
                    <div>
                        <label for="selectGenero">Genero</label>
                        <select name="genero" id="selectGenero" required>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                        <p class="mensajeInf">Seleccione un género</p>
                    </div>
                    <div>
                        <label for="selectRol">Rol</label>
                        <select name="rol" id="selectRol">
                            <option value="user">Usuario</option>
                            <option value="admin">Administrador</option>
                        </select>
                        <p class="mensajeInf">Ingrese el rol</p>
                    </div>
                    <div>
                        <button type="submit" id="btnAgregar">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <?php 
    require('../components/footer.php'); // Incluye el pie de página
    ?>

    <!-- Scripts necesarios -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="../js/cerrarSesionAdmin.js"></script>
    <script src="../js/agregarUsuariosAdmin.js"></script> <!-- Incluye el archivo JavaScript para la funcionalidad del formulario -->
</body>
</html>

