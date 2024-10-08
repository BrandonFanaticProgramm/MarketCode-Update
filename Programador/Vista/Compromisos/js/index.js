// Esperar a que el DOM esté completamente cargado
document.addEventListener('DOMContentLoaded', () => {
    // Verifica si hay un estado guardado en localStorage
    let estadoProyecto = localStorage.getItem('estadoProyecto') || "Pendiente";

    // Muestra el estado inicial en la vista del cliente
    const texto_estado = document.querySelector('#estado_proyecto');
    
    // Verifica que el elemento #estado_proyecto exista antes de manipularlo
    if (texto_estado) {
        texto_estado.textContent = `Estado del proyecto: ${estadoProyecto}`;
    }

    // Selecciona todos los botones que marcan un compromiso como completado
    const botonesCompletado = document.querySelectorAll('.btn-completo');

    // Verifica si existen botones en la página
    if (botonesCompletado.length > 0) {
        botonesCompletado.forEach(boton => {
            boton.addEventListener('click', (e) => {
                e.preventDefault();
                const compromisoItem = boton.closest('.compromiso-item');
                
                if (compromisoItem) {
                    // Elimina el elemento de compromiso de la interfaz
                    compromisoItem.remove();

                    // Verificar si quedan elementos de compromiso
                    const quedanCompromisos = document.querySelectorAll('.compromiso-item').length > 0;

                    // Si ya no quedan compromisos, cambia el estado del proyecto a "Completado"
                    if (!quedanCompromisos) {
                        estadoProyecto = 'Completado';
                    } else {
                        estadoProyecto = 'Pendiente';
                    }

                    // Actualiza el texto en la interfaz para reflejar el cambio
                    if (texto_estado) {
                        texto_estado.textContent = `Estado del proyecto: ${estadoProyecto}`;
                    }

                    // Guarda el estado actualizado en localStorage
                    localStorage.setItem('estadoProyecto', estadoProyecto);

                    // Confirmación en consola de que el estado ha sido guardado
                    console.log(`Estado guardado en localStorage: ${estadoProyecto}`);
                }
            });
        });
    }
});
