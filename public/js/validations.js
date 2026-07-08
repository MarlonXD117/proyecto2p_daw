// Validar formularios cuando la pagina carga
document.addEventListener("DOMContentLoaded", function () {

    // Buscar todos los formularios
    const formularios = document.querySelectorAll("form");

    formularios.forEach(function (formulario) {
        formulario.addEventListener("submit", function (evento) {

            // Revisar campos obligatorios
            const campos = formulario.querySelectorAll("[required]");
            let todoBien = true;

            campos.forEach(function (campo) {
                if (campo.value.trim() === "") {
                    todoBien = false;
                    campo.style.border = "2px solid #0ea5e9";
                } else {
                    campo.style.border = "1px solid #bae6fd";
                }
            });

            if (!todoBien) {
                evento.preventDefault();
                alert("Por favor llena todos los campos obligatorios.");
            }
        });
    });

    // Confirmar antes de eliminar
    const botonesEliminar = document.querySelectorAll(".btn-delete");

    botonesEliminar.forEach(function (boton) {
        boton.addEventListener("click", function (evento) {
            const confirmar = confirm("¿Seguro que deseas eliminar este registro?");
            if (!confirmar) {
                evento.preventDefault();
            }
        });
    });

});
