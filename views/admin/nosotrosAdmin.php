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
    <link rel="stylesheet" href="../css/nosotros.css">
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

        <div class="titulo">
            <h1 class="titulo__nombre">Nosotros</h1>
        </div>

        <div class="nosotros__contenido">
            <img class="nosotros__img" src="../img/MiMundoImg.jpg" alt="">

            <div class="nosotros__info">
                <h2>Acerca de Nosotros</h2>
                <p>Tienda de ropa de alta calidad principamente enfocada a la
                    venta de ropa infanitil </p>

                <h2>Nos Ubicamos</h2>
                <p>Santa Ana Maya Michoacan</p>
                <p>Calle Benito Juarez #365, Centro </p>

                <h2>Horario</h2>
                <p>Lunes a Sabado: 10:00am a 8:00pm</p>
                <p>Domingo: 10:00am a 3:00pm</p>

                <h2>Contacto</h2>
                <p>Correo123@correo.com</p>
            </div>

        </div>

    </main>
 
    <?php
        // footer
        require('../components/footer.php');
    ?>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="../js/cerrarSesionAdmin.js"></script>

</body>

</html>

















