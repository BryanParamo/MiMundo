/* -------------------------------------------------------------------------------------------- */
/* Inicialindo los datos */
function inicializarDatos() {
    let productos = localStorage.getItem("productos");
    if (!productos) {
        productos = [
            {
                img: "ruta",
                nombre: "Sueter",
                descripcion: "Sueter de osito bonito color negro, calientito para el tiempo de frio",
                talla: "3M",
                precio: 200,
                temporada: "Invierno",
                categoria: "Sueter",
                apartado: false,
                favoritos: false
            },
            {
                img: "ruta",
                nombre: "Pantalon",
                descripcion: "Pantalon color cafe para invierno, perfecto para cubir de los frescos vientos",
                talla: "6M",
                precio: 200,
                temporada: "Invierno",
                categoria: "Pantalon",
                apartado: false,
                favoritos: false
            },
            {
                img: "ruta",
                nombre: "Blusa",
                descripcion: "Ligera y colorida con la que podras pasar fresca entos tiempos de calor",
                talla: "9M",
                precio: 200,
                temporada: "Verano",
                categoria: "Blusa",
                apartado: false,
                favoritos: false
            },
            {
                img: "ruta",
                nombre: "Falda",
                descripcion: "Comoda y bonita para que combienes con algo ligero y puedas pasar estas calores fresca",
                talla: "9M",
                precio: 200,
                temporada: "Verano",
                categoria: "Faldas",
                apartado: false,
                favoritos: false
            }
        ];
        productos.push();
        localStorage.setItem('productos', JSON.stringify(productos));
    }
}

/* -------------------------------------------------------------------------------------------- */
/* Cargando Productos */
function cargarTabla() {
    let productos = JSON.parse(localStorage.getItem('productos'));
    //debugger;


    productos.forEach(producto => {

        // Contenedor de cartas
        let cartas = document.querySelector(".cartas");
        cartas.classList.add("cartas")

        // Contenedor Carta
        let carta = document.createElement("DIV");
        carta.classList.add("carta")

        // Imagen
        let divImagen = document.createElement("DIV")
        let imagen = document.createElement("div")
        imagen.classList.add("carta__imagen")
        imagen.innerHTML = producto.img;
        divImagen.appendChild(imagen)
        carta.appendChild(divImagen)

        // Carta informacion
        let cartaInfo = document.createElement("DIV")
        cartaInfo.classList.add("carta__info")

        // Parrafo nombre 
        let pNombre = document.createElement("P")
        pNombre.classList.add("carta__nombre");
        pNombre.innerHTML = producto.nombre
        cartaInfo.appendChild(pNombre)

        // Carta Talla Precio
        let cartaTallaPrecio = document.createElement("DIV")
        cartaTallaPrecio.classList.add("carta__talla-precio")

        // Carta talla
        let cartaTalla = document.createElement("DIV")
        cartaTalla.classList.add("carta__talla")

        let pTallaTexto = document.createElement("P")
        pTallaTexto.innerText = "Talla:"
        cartaTalla.appendChild(pTallaTexto)

        let pTalla = document.createElement("P")
        pTalla.classList.add("carta__texto")
        pTalla.innerText = producto.talla
        cartaTalla.appendChild(pTalla)

        cartaTallaPrecio.appendChild(cartaTalla)

        // Carta precio
        let cartaPrecio = document.createElement("DIV")
        cartaPrecio.classList.add("carta__precio")

        let pPrecioTexto = document.createElement("P")
        pPrecioTexto.innerText = "Precio:"
        cartaPrecio.appendChild(pPrecioTexto)

        let pPrecio = document.createElement("P")
        pPrecio.classList.add("carta__texto")
        pPrecio.innerText = producto.precio
        cartaPrecio.appendChild(pPrecio)

        cartaTallaPrecio.appendChild(cartaPrecio)

        cartaInfo.appendChild(cartaTallaPrecio)


        // Div boton editar
        let divEditar = document.createElement("DIV")

        let aEditar = document.createElement("A")
        aEditar.classList.add("carta__apartar")
        aEditar.href = ""
        aEditar.innerHTML = `<ion-icon class="link__icono link__icono__ch " name="cube-outline"></ion-icon> Editar` 

        divEditar.appendChild(aEditar)

        cartaInfo.appendChild(divEditar)

        //Div boton eliminar
        let divEliminar = document.createElement("DIV")

        let aEliminar = document.createElement("A")
        aEliminar.classList.add("carta__apartar")
        aEliminar.href = "" ;
        aEliminar.innerHTML = `<ion-icon class="link__icono link__icono__ch " name="cube-outline"></ion-icon> Eliminar`

        divEliminar.appendChild(aEliminar)

        cartaInfo.appendChild(divEliminar)

        carta.appendChild(cartaInfo)

        cartas.appendChild(carta);
    });
}

document.addEventListener("DOMContentLoaded", () => {
    //inicializarDatos();
    //cargarTabla();

}) 