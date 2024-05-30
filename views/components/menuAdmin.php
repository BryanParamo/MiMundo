<?php
    /* Mantenemos la sesion activa */
    session_start();

    //echo $_SESSION["correo"];
    if($_SESSION["rol"] !="admin"){
        header("Location: ../index.php");
    }elseif (!(isset($_SESSION["correo"]) && strlen($_SESSION["correo"]) > 0)) {
        header("Location: ../log/inicioSesion.php");
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
    <a class="boton" href="mensajesAdmin.php">
        <ion-icon class="boton__icono" name="add-outline"></ion-icon>
        <span class="boton__span">Inbox</span>
    </a>

    <!-- navegacion -->
    <nav class="nav">
        <ul>
            <li class="nav__item">
                <a class="link" href="indexAdmin.php">
                    <ion-icon class="link__icono" name="home-outline"></ion-icon>
                    <span class="link__span">Inicio</span>
                </a>
            </li>
            <li class="nav__item">
                <a class="link" href="categoriasAdmin.php">
                    <ion-icon class="link__icono " name="shirt-outline"></ion-icon>
                    <span class="link__span">Categorias</span>
                </a>
            </li>
            <li class="nav__item">
                <a class="link" href="apartadosAdmin.php">
                    <ion-icon class="link__icono " name="cube-outline"></ion-icon>
                    <span class="link__span">Apartados</span>
                </a>
            </li>
            <li class="nav__item">
                <a class="link" href="favoritosAdmin.php">
                    <ion-icon class="link__icono " name="star-outline"></ion-icon>
                    <span class="link__span">Favoritos</span>
                </a>
            </li>
            <li class="nav__item">
                <a class="link" href="mensajesAdmin.php">
                    <ion-icon class="link__icono" name="mail-outline"></ion-icon>
                    <span class="link__span">Mensajes</span>
                </a>
            </li>
            <li class="nav__item">
                <a class="link" href="nosotrosAdmin.php">
                    <ion-icon class="link__icono" name="information-circle-outline"></ion-icon>
                    <span class="link__span">Nosotros</span>
                </a>
            </li>
            <li class="nav__item">
                <a class="link" href="usuariosAdmin.php">
                    <ion-icon class="link__icono" name="Person-outline"></ion-icon>
                    <span class="link__span">Usuarios</span>
                </a>
            </li>
        </ul>
    </nav>

    <!-- linea -->
    <div class="linea"></div>

    <!-- usuario login -->
    <div class="usuario">
        <ion-icon class="usuario__icono" name="person-circle-outline"></ion-icon>
        <div class="usuario__info">
            <div class="usuario__nombre-email">
                <?php
                echo '<div class="usuario__nombre">' . $_SESSION["nombre"] . '</div>
                    <div class="usuario__email">' . $_SESSION["correo"] . '</div>'
                ?>
            </div>
            <!-- <ion-icon name="ellipsis-vertical-outline"></ion-icon> -->
        </div>
    </div>
    <div>
        <button type="button" class="boton__cerrar" id="botonCerrar">
            <ion-icon class="boton__icono" name="close-outline"></ion-icon>
            <span class="boton__span">Cerrar Sesion</span>
        </button>
    </div>

</div>