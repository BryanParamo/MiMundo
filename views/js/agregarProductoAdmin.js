
/* function validacionKeyUp(element){
    txt = element.target;
}  */

document.addEventListener("DOMContentLoaded", () => {
    let txtProducto =  document.querySelector("#txtProducto")
    let tallaInput = document.querySelector("#txtTalla")
    let precioInput = document.querySelector("#txtPrecio")

    /* txtProducto.addEventListener("input", e => {
        let expProducto = /^[a-zA-Z]{5,40}$/;
        //console.log(e.target.value)
        if(txtProducto.value == " "){
            expProducto.setCustomValidity("ah")
        }else{
            expProducto.setCustomValidity("oh")
        }
    }) */


    //document.querySelector("#txtProducto").onkeyup = e => validacionKeyUp(e);
    //document.querySelector("#txtProducto").onkeyup = e => validacionKeyUp(e);

    

    formulario.addEventListener("submit", e => {

        //e.preventDefault();

        if(productoInput.value === "" || tallaInput.value === "" ||
        precioInput.value === ""){
            alert("Hola")
        }else{
            producto.id = Date.now()
            producto.nombre = precioInput.value;
            producto.talla = tallaInput.value;

            agregarProducto();
        }
    })

    function agregarProducto (){
        listaProductos.push({...producto});

        mostrarProductos();
    }
})