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
    <link rel="stylesheet" href="../css/cartas.css">
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
    <main class="contenedor">

        <!-- favoritos -->
        <section>
            <!-- cartas de favoritos -->
            <div class="cartas">
                <!-- carta de favoritos-->
                <div class="carta">
                    <div class="div">
                        <img class="carta__imagen" src="../img/ropita1.jpg" alt="ropa infantil">
                    </div>
                    <div class="carta__info">
                        <p class="carta__nombre">Sueter de osito</p>
                        <div class="carta__talla-precio">
                            <div class="carta__talla">
                                <p>Talla:</p>
                                <p class="carta__texto">3M</p>
                            </div>
                            <div class="carta__precio">
                                <p>Precio:</p>
                                <p class="carta__texto">$200</p>
                            </div>
                        </div>

                        <div>
                            En favoritos:
                            5 personas 
                        </div>

                    </div>
                </div>
                
                
            </div>
        </section>

    </main>

    <?php
        // footer
        require('../components/footer.php')
    ?>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="js/script.js"></script>
    <script src="../js/cerrarSesionAdmin.js"></script>
</body>

</html>

