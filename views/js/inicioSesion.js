/* Globales */
let expCorreo = /^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/g;
let bool = false;

/* Codigo de validaciones */
document.addEventListener("DOMContentLoaded", () => {

    // Validar el correo con keyUp
    document.querySelector("#txtCorreo").onkeyup = (e) => {
        
        // La validacion no aplica cuando se utiliza la tecla Tab
        if (e.code == "Tab") return;

        // Capturamos el elemento que desencadenó el evento
        let txt = e.target;

        // Aplicamos la validacion de la exprecion regular
        if (txt.value.trim().match(expCorreo)) {

            // Quitamos el mensaje de setCustomValidity
            txt.setCustomValidity("");

            // Se agrega la clase valido al txtCorreo
            txt.classList.add("valido");

            // Se quita la clase novalido al txtCorreo
            txt.classList.remove("novalido");

        } else {

             // Agregamos el mensaje de setCustomValidity
            txt.setCustomValidity("Correo no válido");

            // Se quita la clase valido al txtCorreo
            txt.classList.remove("valido");

            // Se agrega la clase novalido al txtCorreo
            txt.classList.add("novalido");
        }
    }

    // Validar contrasenia
    document.getElementById("txtPassword").onkeyup = e => {
        revisarControl(e, 8, 50);
    }



    // Boton inicio de sesion
    document.querySelector("#btnIniciarSesion").addEventListener("click", (e) => {

    })



})

/* Funciones */
/* function revisarEntrada(e, min, max){
    if (e.code == "Tab") return;
    txt = e.target;
    txt.setCustomValidity("");
    txt.classList.remove("valido");
    txt.classList.remove("novalido");
    if (txt.value.trim().length <= min ||
        txt.value.trim().length >= max) {
        txt.setCustomValidity("Campo no válido");
        txt.classList.add("novalido");
        return false;
    } else {
        txt.classList.add("valido");
        return true;
    }
} */

/* ------------------------- */

// Arreglar esto a un icono colocando un boleano para true o false
/* document.querySelector("#buttonVer").addEventListener("click", (e) => {
    let span = document.querySelector("#span")
    if (bool == true) {
        span.innerHTML = `<ion-icon name="eye-off-outline"></ion-icon>`
        document.getElementById("txtPassword").type = 'text';
        bool = false;
    } else {
        span.innerHTML = `<ion-icon name="eye-outline"></ion-icon>`
        document.getElementById("txtPassword").type = 'password';
        bool = true
    }

}); */