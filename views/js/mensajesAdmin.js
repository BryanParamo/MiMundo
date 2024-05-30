const buscar = document.querySelector(".buscar"),
    filas = document.querySelectorAll('tbody tr');

buscar.addEventListener("input", buscarTabla);

function buscarTabla(){
    filas.forEach( (row, i) => {
        let datosTabla = row.textContent.toLowerCase(),
            buscarTabla = buscar.value.toLowerCase();

            row.classList.toggle('hiden', datosTabla.indexOf(buscarTabla) < 0);

        })

        document.querySelectorAll('tbody tr:not(.hiden)').forEach((visible_row, i) => {
            visible_row.style.backgroundColor = (i % 2 == 0) ? 'transparent' : 'var(--grisTabla)' 
        })
}
