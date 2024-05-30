<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Mundo</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Slabo+13px&family=Slabo+27px&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/apartados.css">
</head>
<body>
    <?php
        // Incluye el menú de administrador
        require('../components/menuAdmin.php');

        // Incluye el header
        require('../components/header.php');
    ?>
    <!-- Sección de imagen principal -->
    <section class="contenedor">
        <div class="imagen__principal"></div>
    </section>

    <!-- Sección principal -->
    <main class="contenedor main">

        <div class="table">

            <section class="table__header">
                <h1 class="nosotros__titulo__nombre">Apartados</h1>
                <!-- Barra de búsqueda -->
                <div class="input-group">
                    <input class="buscar" type="text" placeholder="Filtrar">
                    <ion-icon class="buscador__icono" name="search-outline"></ion-icon>
                </div>
            </section>
            <section class="table__body">
                <table>
                    <thead>
                    <div class="agregar">
                    <a href="agregarUsuarioAdmin.php" class="agregar__boton">
                    <ion-icon class="link__icono link__icono__ch " name="cube-outline"></ion-icon>
                    Agregar</a>
                    </div>
                        <tr>
                            <th> id </th>
                            <th> Usuario </th>
                            <th> Apellido P</th>
                            <th> Apellido M </th>
                            <th> Email </th>
                            <th> Genero </th>
                            <th> Roll </th>
                            <th> Accion </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Incluye la conexión a la base de datos y los modelos necesarios
                            require_once '../../data/conexion.php'; 
                            require_once '../../model/Usuario.php';
                            require_once '../../data/DAOUsuario.php';

                            // Instancia el DAOUsuario para interactuar con la base de datos
                            $daoUsuario = new DAOUsuario();
                            // Obtiene todos los usuarios de la base de datos
                            $usuarios = $daoUsuario->obtenerTodos();

                            // Recorre la lista de usuarios y genera una fila para cada uno
                            foreach ($usuarios as $usuario) {
                                echo "<tr>";
                                echo "<td>{$usuario->id}</td>";
                                echo "<td>{$usuario->nombre}</td>";
                                echo "<td>{$usuario->apellido1}</td>";
                                echo "<td>{$usuario->apellido2}</td>";
                                echo "<td>{$usuario->email}</td>";
                                echo "<td>{$usuario->genero}</td>";
                                echo "<td>{$usuario->rol}</td>";
                                echo "<td>
                                     <div class='d-flex flex-column'>
                                          <form method='GET' action='editarUsuarioAdmin.php'>
                                               <input type='hidden' name='id' value='{$usuario->id}'>
                                              <button type='submit' class='btn btn-primary btn-sm mb-1'>Editar</button>
                                            </form>
                                        <form method='POST' action='eliminarUsuarioAdmin.php'>
                                            <input type='hidden' name='id' value='{$usuario->id}'>
                                            <button type='submit' class='btn btn-danger btn-sm'>Eliminar</button>
                                        </form>
                                    </div>
                                     </td>";
                                echo "</tr>";

                            }
                        ?>
                    </tbody>
                </table>
            </section>
        </div>
    </main>

    <?php
        // Incluye el footer
        require('../components/footer.php');
    ?>

    <!-- Ionicons Script -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- Custom Scripts -->
    <script src="../js/mensajesAdmin.js"></script>
    <script src="../js/cerrarSesionAdmin.js"></script>
</body>
</html>
