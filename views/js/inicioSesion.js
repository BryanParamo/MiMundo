/* Globales */
let expCorreo = /^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/g;
let bool = false;

/* Funciones */
function revisarEntrada(e, min, max){
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
}

/* Codigo */
document.addEventListener("DOMContentLoaded", () => {

    // Arreglar esto a un icono colocando un boleano para true o false
    document.querySelector("#buttonVer").addEventListener("click", (e) => {
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

    });

    // Validar el correo con keyUp
    document.querySelector("#txtCorreo").onkeyup = (e) => {
        if (e.code == "Tab") return;
        let txt = e.target;
        if (txt.value.trim().match(expCorreo)) {
            txt.setCustomValidity("");
            txt.classList.add("valido");
            txt.classList.remove("novalido");
        } else {
            txt.setCustomValidity("Campo no válido");
            txt.classList.remove("valido");
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