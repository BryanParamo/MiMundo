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
    <link rel="stylesheet" href="../css/agregarProductos.css">
</head>

<body>
    <?php
    // menu


    // Obtenemos el DAO
    require_once("../../data/DAOProducto.php");

    // Instanciamos 
    $producto = new Producto();

    // Inicializamos el error en blanco
    $error = "";

    //var_dump($_POST);
    // Si en la peticion es un get y envian solo el id y es numerico
    // Entonces el usuario quiere editar, por lo que se obtendran los datos del usuario
    // GET 
    if (isset($_GET["idProducto"]) && is_numeric($_GET["idProducto"])) {

        //var_dump($_POST);
        //echo "Va a editar";
        //echo "<br/>";

        // se asigna el objeto a la variable productos
        $producto = (new DAOProducto())->obtenerUno((int) $_GET["idProducto"]);

        // valida que exista el producto
        // que otro admin no lo halla eliminado
        if ($producto == null) {
            header("Location: indexAdmin.php");
        }

        // Si en la peticion es post y es mayor a 0 
        // Entonces agrega 
        // POST hace el envio de datos encriptado sin limite de datos
    } elseif (count($_POST) > 0) {

        //var_dump($_POST);
        //echo "Va a agregar";
        //echo "<br/>";

        // Asignamos el valor introducido al atributo del objeto
        $producto->idProducto = $_POST["idName"];
        $producto->producto = $_POST["productoName"];
        $producto->talla = $_POST["tallaName"];
        $producto->precio = $_POST["precioName"];
        $producto->categoria = $_POST["categoriaName"];
        $producto->temporada = $_POST["temporadaName"];

        // Inicializamos validacion vacia
        $validado = "";

        //Validacion de los datos
        if (
            // producto
            strlen($producto->producto) >= 5 && strlen($producto->producto) <= 40 &&
            // talla
            strlen($producto->talla) >= 1 && strlen($producto->talla) <= 10 &&
            // precio
            strlen($producto->precio) >= 1 && strlen($producto->precio) <= 10 && filter_var($producto->precio, FILTER_VALIDATE_INT) != false &&
            // Revisar las opciones de la categoria coincidan
            ($producto->categoria  == 'Sueter' || $producto->categoria  == 'Camisa' || $producto->categoria  == 'Blusa' ||
                $producto->categoria  == 'Vestido' || $producto->categoria  == 'Pantalon' || $producto->categoria  == 'Short') &&
            // Revisar las opciones de la temporada coincidan
            ($producto->temporada  == 'Primavera' || $producto->temporada  == 'Verano' || $producto->temporada  == 'Otoño' ||
                $producto->temporada  == 'Invierno')
        ) {

            //var_dump($_POST);
            //echo "<br/>";

            // Hacemos instancia del DAOProducto
            $dao = new DAOProducto();

            if ($producto->idProducto == 0) {

                //var_dump($_POST);
                //echo "<br/>";

                //Agregamos
                if ($producto = $dao->agregar($producto) > 0) {
                    header("Location: indexAdmin.php");
                } else {
                    $error = 'Error';
                }
            } else {

                //Editamos
                if ($dao->editar($producto)) {
                    header("Location: indexAdmin.php");
                } else {
                    $error = 'Error';
                }
            }
        } else {
            $validado = "validado";
        }
    }

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

        <div class="titulo">
            <h1 class="titulo__nombre">Agregar Producto</h1>
        </div>

        <div class="subir-producto">

            <img class="subir-producto__img" src="../img/MiMundoImg.jpg" alt="">

            <div class="subir-producto__formulario">

                <h2>Descripcion</h2>

                <!-- Definimos al formilario el methodo a utilizar (post) -->
                <!-- Definimos la accion  -->
                <form id="formulario" method="post" action="agregarProductoAdmin.php">

                    <!-- Elemento oculto para identificar el id -->
                    <input type="hidden" name="idName" value="<?= $producto->idProducto ?>">

                    <!-- Inputs -->
                    <div>
                        <label for="">Producto</label>
                        <input type="text" id="txtProducto" name="productoName" value="<?= $producto->producto ?>" pattern="^[ a-zA-Z0-9]{5,40}$" minlength="5" maxlength="40" required>
                        <p class="mensajeInf">Ingresa el nombre del producto</p>
                    </div>

                    <div>
                        <label for="">Talla / Edad</label>
                        <input type="text" id="txtTalla" name="tallaName" value="<?= $producto->talla ?>" minlength="1" maxlength="10" required>
                        <p class="mensajeInf">Ingresa un formato valido</p>
                    </div>

                    <div>
                        <label for="">Precio</label>
                        <input type="number" id="txtPrecio" name="precioName" value="<?= $producto->precio ?>" minlength="1" maxlength="10" required>
                        <p class="mensajeInf">Ingresa solo numeros</p>
                    </div>

                    <div>
                        <label for="">Temporada</label>
                        <select name="temporadaName">
                            <option value="Primavera" <?= $producto->temporada == 'Primavera' ? 'selected' : '' ?>>Primavera</option>
                            <option value="Verano" <?= $producto->temporada == 'Verano' ? 'selected' : '' ?>>Verano</option>
                            <option value="Otoño" <?= $producto->temporada == 'Otoño' ? 'selected' : '' ?>>Otoño</option>
                            <option value="Invierno" <?= $producto->temporada == 'Invierno' ? 'selected' : '' ?>>Invierno</option>
                        </select>
                    </div>

                    <div>
                        <label for="">Categoria</label>
                        <select name="categoriaName" id="">
                            <option value="Sueter" <?= $producto->temporada == 'Sueter' ? 'selected' : '' ?>>Sueter</option>
                            <option value="Camisa" <?= $producto->temporada == 'Caminsa' ? 'selected' : '' ?>>Camisa</option>
                            <option value="Blusa" <?= $producto->temporada == 'Blusa' ? 'selected' : '' ?>>Blusa</option>
                            <option value="Vestido" <?= $producto->temporada == 'Vestido' ? 'selected' : '' ?>>Vestido</option>
                            <option value="Pantalon" <?= $producto->temporada == 'Pantalon' ? 'selected' : '' ?>>Pantalon</option>
                            <option value="Short" <?= $producto->temporada == 'Short' ? 'selected' : '' ?>>Short</option>
                        </select>
                    </div>

                    <div>
                        <button type="submit" id="btnAgregar" href="indexAdmin.html">Agregar</button>
                    </div>

                </form>

            </div>

        </div>

    </main>

    <?php
    // footer
    require('../components/footer.php')
    ?>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="../js/agregarProductoAdmin.js"></script>
    <script src="../js/cerrarSesionAdmin.js"></script>
</body>

</html>