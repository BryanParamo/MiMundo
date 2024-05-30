<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Mundo</title>

    <link href="https://fonts.googleapis.com/css2?family=Slabo+13px&family=Slabo+27px&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/mensajes.css">
</head>

<body>
    <?php
        // menu
        require("components/menu.php");

        // header
        require("components/header.php");
    ?>

    <!-- imagen principal -->
    <section class="contenedor">
        <div class="imagen__principal"></div>
    </section>

    <!-- main -->
    <main class="contenedor">

        <div class="titulo">
            <h1 class="titulo__nombre">Mensajes</h1>
        </div>

        <div class="contenedor__formulario">
            <form action="" class="formulario">
                <div class="formulario__mensajes">
                </div>
                <div class="formulario__input-boton">
                    <input class="formulario__input" type="text">
                    <button class="formulario__boton">
                        <ion-icon class="link__icono" name="send"></ion-icon>
                    </button>
                </div>
            </form>
        </div>

    </main>

    <?php
        // footer
        require('components/footer.php')
    ?>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="js/script.js"></script>
    <script src="js/cerrarSesion.js"></script>
</body>

</html>

