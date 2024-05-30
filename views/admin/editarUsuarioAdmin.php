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
    // Incluye los archivos necesarios para la conexión a la base de datos y los modelos
    require_once '../../data/conexion.php'; 
    require_once '../../model/Usuario.php';
    require_once '../../data/DAOUsuario.php';

    // Crea una instancia del DAOUsuario
    $daoUsuario = new DAOUsuario();

    // Verifica si la solicitud es GET y contiene un ID de usuario
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $usuario = $daoUsuario->obtenerUno($id); // Obtiene los datos del usuario con el ID proporcionado
        if ($usuario) {
            // Si el usuario existe, se muestra el formulario con los datos del usuario
        } else {
            echo "Usuario no encontrado"; // Mensaje de error si el usuario no se encuentra
        }

    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Crea una instancia del usuario
        $usuario = new Usuario();

        // Recoge los datos del formulario
        $usuario->id = $_POST['id'];
        $usuario->nombre = $_POST['nombre'];
        $usuario->apellido1 = $_POST['apellido1'];
        $usuario->apellido2 = $_POST['apellido2'];
        $usuario->email = $_POST['email'];
        $usuario->genero = $_POST['genero'];
        $usuario->rol = $_POST['rol'];

        // Verifica si se ha marcado el checkbox para editar la contraseña
        if (isset($_POST['editar_contrasenia']) && $_POST['editar_contrasenia'] === 'on') {
            $usuario->contrasenia = $_POST['contrasenia'];
        } else {
            // Si no se ha marcado, mantiene la contraseña actual del usuario
            $usuarioExistente = $daoUsuario->obtenerUno($usuario->id);
            $usuario->contrasenia = $usuarioExistente->contrasenia;
        }

        // Intenta actualizar los datos del usuario en la base de datos
        if ($daoUsuario->editar($usuario)) {
            header("Location: usuariosAdmin.php?mensaje=Usuario actualizado"); // Redirige con un mensaje de éxito
        } else {
            header("Location: usuariosAdmin.php?mensaje=Error al actualizar usuario"); // Redirige con un mensaje de error
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
            <h1 class="titulo__nombre">Editar Usuarios</h1>
        </div>
        <div class="subir-producto">
            <img class="subir-producto__img" src="../img/MiMundoImg.jpg" alt="">
            <div class="subir-producto__formulario">
                
                <h2>Usuarios</h2>
                <!-- Formulario de edición de usuario -->
                <form method="POST" action="editarUsuarioAdmin.php" id="formulario">
                    <div>
                        <input type="hidden" name="id" value="<?php echo $usuario->id; ?>"> <!-- Campo oculto para el ID del usuario -->
                    </div>
                    <div>
                        <label for="txtNombre">Nombre</label>
                        <input type="text" name="nombre" id="txtNombre" value="<?php echo $usuario->nombre; ?>" required> <!-- Campo para el nombre -->
                    </div>
                    <div>
                        <label for="txtApellidoP">Apellido P</label>
                        <input type="text" name="apellido1" id="txtApellidoP" value="<?php echo $usuario->apellido1; ?>" required> <!-- Campo para el apellido paterno -->
                    </div>
                    <div>
                        <label for="txtApellidoM">Apellido M</label>
                        <input type="text" name="apellido2" id="txtApellidoM" value="<?php echo $usuario->apellido2; ?>" required> <!-- Campo para el apellido materno -->
                    </div>
                    <div>
                        <label for="editarContraseniaCheckbox">Editar Contraseña
                        <input type="checkbox" id="editarContraseniaCheckbox" name="editar_contrasenia"></label> <!-- Checkbox para habilitar edición de contraseña -->
                    </div>
                    <div class="password-container">
                        <label for="txtContrasenia">Contraseña</label>
                        <input type="password" name="contrasenia" id="txtContrasenia" minlength="9" maxlength="20" disabled> <!-- Campo para la contraseña, inicialmente deshabilitado -->
                        <span class="toggle-password" onclick="togglePasswordVisibility('txtContrasenia')">👁️</span> <!-- Ícono para mostrar/ocultar contraseña -->
                    </div>
                    <div class="password-container">
                        <label for="txtContraseniaConf">Confirmar Contraseña</label>
                        <input type="password" id="txtContraseniaConf" minlength="9" maxlength="20" disabled> <!-- Campo para confirmar la contraseña, inicialmente deshabilitado -->
                        <span class="toggle-password" onclick="togglePasswordVisibility('txtContraseniaConf')">👁️</span> <!-- Ícono para mostrar/ocultar contraseña -->
                    </div>
                    <div>
                        <label for="txtCorreo">Correo</label>
                        <input type="email" name="email" id="txtCorreo" value="<?php echo $usuario->email; ?>" required> <!-- Campo para el correo electrónico -->
                    </div>
                    <div>
                        <label for="txtGenero">Genero</label>
                        <input type="text" name="genero" id="txtGenero" value="<?php echo $usuario->genero; ?>" required> <!-- Campo para el género -->
                    </div>
                    <div>
                        <label for="txtRol">Rol</label>
                        <input type="text" name="rol" id="txtRol" value="<?php echo $usuario->rol; ?>" required> <!-- Campo para el rol -->
                    </div>
                    <div>
                        <button type="submit">Guardar cambios</button> <!-- Botón para enviar el formulario -->
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
    <script src="../js/editarUsuarioAdmin.js"></script> <!-- Incluye el archivo JavaScript para la funcionalidad del formulario -->
</body>
</html>


