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

    // Obtenemos el DAO
    require_once("../../data/DAOProducto.php");

    // Revisamos si llega un id que indica que se quiere eliminar un elemento
    if (isset($_POST["idProducto"]) && is_numeric($_POST["idProducto"])) {

        // Relizamos una instancia del DAO
        $dao = new DAOProducto();

        // Se realiza la condicio para eliminar
        if ($dao->eliminar($_POST["idProducto"])) {
            echo "Eliminado";
            //$_SESSION["msg"]="alert-success--Usuario eliminado exitósamente";
        } else {
            echo "No Eliminado";
            //$_SESSION["msg"]="alert-danger--No se ha podido eliminar al usuario seleccionado debido a que tiene procesos relacionados";
        }
    }

    ?>

    <!-- imagen principal -->
    <section class="contenedor">
        <div class="imagen__principal"></div>
    </section>

    <!-- main -->
    <main class="contenedor">

        <div class="agregar">
            <a href="agregarProductoAdmin.php" class="agregar__boton">
                <ion-icon class="link__icono link__icono__ch " name="cube-outline"></ion-icon>
                Agregar</a>
        </div>

        <!-- seccion -->
        <section>
            <!-- cartas -->
            <div class="cartas">

                <!-- carta -->
                <!-- <div class="carta">
                    <div>
                        <img class="carta__imagen" src="../img/ropita1.jpg" alt="ropa infantil">
                    </div>
                    <div class="carta__info">
                        <p class="carta__nombre">Sueter de osito</p>
                        <div class="carta__talla-precio">
                            <div class="carta__talla">
                                <p>Talla:</p>
                                <p class="carta__texto">6M</p>
                            </div>
                            <div class="carta__precio">
                                <p>Precio:</p>
                                <p class="carta__texto">$200</p>
                            </div>
                        </div>
                        <div>   
                            <a class="carta__apartar" href="">
                                <ion-icon class="link__icono link__icono__ch " name="cube-outline"></ion-icon>
                                Editar
                            </a>
                        </div>
                        <div>
                            <a class="carta__apartar" href="">
                                <ion-icon class="link__icono link__icono__ch " name="cube-outline"></ion-icon>
                                Eliminar
                            </a>
                        </div>

                    </div>
                </div> -->

                <?php
                require_once("../../data/DAOProducto.php");

                $lista = (new DAOProducto())->obtenerTodos();
                foreach ($lista as $producto) {
                    echo "<div class=\"carta\">

                                <div>
                                    <img class=\"carta__imagen\" src=\"../img/ropita1.jpg\" alt=\"ropa infantil\">
                                </div>

                                <div class=\"carta__info\">
                                    <p class=\"carta__nombre\">$producto->producto</p>

                                    <div class=\"carta__talla-precio\">

                                        <div class=\"carta__talla\">
                                            <p>Talla:</p>
                                            <p class=\"carta__texto\">$producto->talla</p>
                                        </div>

                                        <div class=\"carta__precio\">
                                            <p>Precio:</p>
                                            <p class=\"carta__texto\">$$producto->precio</p>
                                        </div>

                                    </div>

                                    <div>   
                                        <a class=\"carta__apartar\" href=\"agregarProductoAdmin.php?idProducto=$producto->idProducto\">
                                            <ion-icon class=\"link__icono link__icono__ch \" name=\"cube-outline\"></ion-icon>
                                            Editar
                                        </a>
                                    </div>

                                    <div>

                                        <form method='post' action='indexAdmin.php'>
                                            <input type='hidden' name='idProducto' value='$producto->idProducto'>
                                            <button type='submit' class='carta__eliminar' name='$producto->idProducto' id='btnEliminar'>
                                                <ion-icon class='link__icono link__icono__ch' name='cube-outline'></ion-icon>
                                                Eliminar
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            </div>";
                }
                ?>

        </section>
    </main>

    <?php
    // footer
    require('../components/footer.php');
    ?>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/cerrarSesionAdmin.js"></script>

</body>

</html>