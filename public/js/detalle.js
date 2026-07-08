// Abrir la ventana con el detalle de la pelicula
function abrirDetalle(id) {
    const datos = document.getElementById("detalle-" + id);
    const ventana = document.getElementById("ventana-detalle");
    const contenido = document.getElementById("contenido-detalle");

    contenido.innerHTML = datos.innerHTML;
    ventana.style.display = "flex";
}

// Cerrar la ventana
function cerrarDetalle() {
    document.getElementById("ventana-detalle").style.display = "none";
}
