<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Mundo</title>

    <link href="https://fonts.googleapis.com/css2?family=Slabo+13px&family=Slabo+27px&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/mensajesAdmin.css">
</head>

<body>
    <?php
        // menu
        require('../components/menuAdmin.php');

        // header
        require('../components/header.php');
    ?>

    <!-- imagen principal -->
    <section class="contenedor">
        <div class="imagen__principal"></div>
    </section>

    <!-- main -->
    <main class="contenedor main">

        <div class="table">

            <section class="table__header">
                <h1 class="nosotros__titulo__nombre">Mensajes</h1>
                <div class="input-group">
                    <input class="buscar" type="text" placeholder="Filtrar">
                    <ion-icon class="buscador__icono" name="search-outline"></ion-icon>
                </div>
            </section>
            <section class="table__body">
                <table>
                    <thead>
                        <tr>
                            <th> Usuario </th>
                            <th> Mensaje </th>
                            <th> Estado </th>
                            <th> Fecha </th>
                            <th> Accion </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> Dennis </td>
                            <td> Aun estara disponible el sueter </td>
                            <td>
                                <p class="estatus disponible">
                                    Disponible
                                </p>
                            </td>
                            <td> 17 Dec, 2024 </td>
                            <td> Ver </td>
                            
                        </tr>
                        <tr>
                            <td> Rosa </td>
                            <td> Tienes gorra cafe? </td>
                            <td>
                                <p class="estatus apartado">
                                    Apartado
                                </p>
                            </td>
                            <td> 01 Sep, 2024 </td>
                            <td> Ver </td>
                        </tr>
                        <tr>
                            <td> Ruben </td>
                            <td> Aun tienes los pantalones cafes? </td>
                            <td>
                                <p class="estatus apartado">
                                    Apartado
                                </p>
                            </td>
                            <td> 13 May, 2024 </td>
                            <td> Ver </td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </div>

    </main>

    <?php
        // footer
        require('../components/footer.php')
    ?>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="../js/mensajesAdmin.js"></script>
    <script src="../js/cerrarSesionAdmin.js"></script>

</body>

</html>

















