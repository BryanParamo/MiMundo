<?php
    /* Mantenemos la sesion activa */
    session_start();

    //echo $_SESSION["correo"];
    if(isset($_SESSION["correo"])){
        if($_SESSION["rol"] !="user"){
            header("Location: admin/indexAdmin.php");
        }elseif(!(isset($_SESSION["correo"]) && strlen($_SESSION["correo"]) > 0)) {
            header("Location: log/inicioSesion.php");
        }
    }

    //unset($_SESSION['correo']);
?>

<div class="menu">

    <!-- sitio  -->
    <div class="sitio">
        <ion-icon class="sitio__icono" name="earth-outline" id="world"></ion-icon>
        <span class="sitio__span">Mi Mundo</span>
    </div>

    <!-- boton -->
    <a class="boton" href="mensajes.php">
        <ion-icon class="boton__icono" name="add-outline"></ion-icon>
        <span class="boton__span">Inbox</span>
    </a>

    <!-- navegacion -->
    <nav class="nav">
        <ul>
            <li class="nav__item">
                <a class="link" href="index.php">
                    <ion-icon class="link__icono" name="home-outline"></ion-icon>
                    <span class="link__span">Inicio</span>
                </a>
            </li>
            <li class="nav__item">
                <a class="link" href="categorias.php">
                    <ion-icon class="link__icono " name="shirt-outline"></ion-icon>
                    <span class="link__span">Categorias</span>
                </a>
            </li>
            <li class="nav__item">
                <a class="link" href="apartados.php">
                    <ion-icon class="link__icono " name="cube-outline"></ion-icon>
                    <span class="link__span">Apartados</span>
                </a>
            </li>
            <li class="nav__item">
                <a class="link" href="favoritos.php">
                    <ion-icon class="link__icono " name="star-outline"></ion-icon>
                    <span class="link__span">Favoritos</span>
                </a>
            </li>
            <li class="nav__item">
                <a class="link" href="mensajes.php">
                    <ion-icon class="link__icono" name="mail-outline"></ion-icon>
                    <span class="link__span">Mensajes</span>
                </a>
            </li>
            <li class="nav__item">
                <a class="link" href="nosotros.php">
                    <ion-icon class="link__icono" name="information-circle-outline"></ion-icon>
                    <span class="link__span">Nosotros</span>
                </a>
            </li>
        </ul>
    </nav>

    <!-- linea -->
    <div class="linea"></div>

    <!-- usuario -->
    <div class="usuario">
        <ion-icon class="usuario__icono" name="person-circle-outline"></ion-icon>
        <div class="usuario__info">
            <div class="usuario__nombre-email">
                <!-- <div class="usuario__nombre">sldeny</div>
                    <div class="usuario__email">sldeny@gmail.com</div> -->
                <?php
                    if(isset($_SESSION["correo"])){
                        echo '<div class="usuario__nombre">' . $_SESSION["nombre"] . '</div>
                        <div class="usuario__email">' . $_SESSION["correo"] . '</div>';
                    }else{
                        echo '<p> <a href="log/inicioSesion.php" class="boton__InicioSesion">Iniciar Sesion</a></p>';
                    }
                ?>
            </div>
            <!-- <ion-icon name="ellipsis-vertical-outline"></ion-icon> -->
        </div>
    </div>
    <?php

        if(isset($_SESSION["correo"])){
            echo '<div>
                    <button type="button" class="boton__cerrar" id="botonCerrar">
                        <ion-icon class="boton__icono" name="close-outline"></ion-icon>
                        <span class="boton__span">Cerrar Sesion</span>
                    </button>
                </div>';
        }
    ?>
</div>