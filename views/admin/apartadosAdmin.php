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
    <link rel="stylesheet" href="../css/apartados.css">
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
                <h1 class="nosotros__titulo__nombre">Apartados</h1>
                <div class="input-group">
                    <input class="buscar" type="text" placeholder="Filtrar">
                    <ion-icon class="buscador__icono" name="search-outline"></ion-icon>
                </div>
            </section>
            <section class="table__body">
                <table>
                    <thead>
                        <tr>
                            <th> id </th>
                            <th> Imagen </th>
                            <th> Usuario </th>
                            <th> Producto </th>
                            <th> descripcion </th>
                            <th> Precio </th>
                            <th> Estado </th>
                            <th> Fecha </th>
                            <th> Accion </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> 1 </td>
                            <td>
                                <img class="" src="../img/ropita1.jpg" alt="Imagen Producto">
                            </td>
                            <td> Dennis </td>
                            <td> Sueter </td>
                            <td>
                                <p>Sueter de osito</p>
                            </td>
                            <td> <strong>$200</strong> </td>
                            <td>
                                <p class="estatus disponible">
                                    Disponible
                                </p>
                            </td>
                            <td> 17 Dec, 2024 </td>
                            <td> Eliminar </td>
                            
                        </tr>
                        <tr>
                            <td> 1 </td>
                            <td>
                                <img class="" src="../img/ropita1.jpg" alt="Imagen Producto">
                            </td>
                            <td> Ruben </td>
                            <td> Playera </td>
                            <td>
                                <p>Playera roja</p>
                            </td>
                            <td> <strong>$200</strong> </td>
                            <td>
                                <p class="estatus cancelado">
                                    Cancelado
                                </p>
                            </td>
                            <td> 24 Agu, 2024 </td>
                            <td> Eliminar </td>
                        </tr>
                        <tr>
                            <td> 1 </td>
                            <td>
                                <img class="" src="../img/ropita1.jpg" alt="Imagen Producto">
                            </td>
                            <td> Kimberly </td>
                            <td> Short </td>
                            <td>
                                <p>Short corto</p>
                            </td>
                            <td> <strong>$200</strong> </td>
                            <td>
                                <p class="estatus pendiente">
                                    Pendiente
                                </p>
                            </td>
                            <td> 18 Feb, 2024 </td>
                            <td> Eliminar </td>
                        </tr>
                        <tr>
                            <td> 1 </td>
                            <td>
                                <img class="" src="../img/ropita1.jpg" alt="Imagen Producto">
                            </td>
                            <td> Rosa </td>
                            <td> Gorra </td>
                            <td>
                                <p>Gorra de niño</p>
                            </td>
                            <td> <strong>$200</strong> </td>
                            <td>
                                <p class="estatus apartado">
                                    Apartado
                                </p>
                            </td>
                            <td> 01 Sep, 2024 </td>
                            <td> Eliminar </td>
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

















