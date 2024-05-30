const buscar = document.querySelector(".buscar"),
    cartas = document.querySelectorAll('.carta__nombre');

buscar.addEventListener("input", buscarTabla);


function buscarTabla(){
    cartas.forEach( (row, i) => {
        let datosTabla = row.textContent.toLowerCase(),
            buscarTabla = buscar.value.toLowerCase();

            row.classList.toggle('hiden', datosTabla.indexOf(buscarTabla) < 0);

        })

        /* document.querySelectorAll('carta__nombre:not(.hiden)').forEach((visible_row, i) => {
            visible_row.style.backgroundColor = (i % 2 == 0) ? 'transparent' : 'var(--grisTabla)' 
        }) */
}