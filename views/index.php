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
    <link rel="stylesheet" href="css/cartas.css">
    
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

        <!-- seccion -->
        <section>
            <!-- cartas -->
            <div class="cartas">
                <!-- carta -->
                <div class="carta">
                    <img class="carta__imagen" src="img/ropita1.jpg" alt="ropa infantil">
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
                            <a class="carta__apartar" href="">
                                <ion-icon class="link__icono link__icono__ch " name="cube-outline"></ion-icon>
                                Apartar
                            </a>
                        </div>

                        <div class="carta__botones">
                            <a class="carta__boton" href="favoritos.php">
                                <ion-icon class="" name="star-outline"></ion-icon>
                            </a>
                            <a class="carta__boton" href="detallesProducto.php">
                                <ion-icon class="" name="information-circle-outline"></ion-icon>
                            </a>
                        </div>
                    </div>
                </div>
            </div>    
        </section>
    </main>
 
    <?php
        // footer
        require("components/footer.php")
    ?>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="js/script.js"></script>
    <script src="js/cerrarSesion.js"></script>
</body>

</html>