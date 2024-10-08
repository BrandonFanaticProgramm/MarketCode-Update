// Función para limpiar el localStorage (solo cuando sea necesario)
function LimpialocalStorage() {
    localStorage.clear(); // Limpia el localStorage
}

// No llamamos a la función de limpieza automáticamente, puedes llamarla en un evento específico si es necesario
// Ejemplo: LimpialocalStorage(); // Si deseas limpiar en algún momento específico

document.addEventListener('DOMContentLoaded', () => {
    // Obtener el estado del proyecto desde el localStorage
    let estadoProyecto = localStorage.getItem('estadoProyecto');

    // Si no existe o tiene un valor no válido, asignar un valor por defecto
    if (!estadoProyecto) {
        estadoProyecto = "Pendiente"; // Valor por defecto
        localStorage.setItem('estadoProyecto', estadoProyecto); // Guardar el valor por defecto
    }

    // Asignar el estado del proyecto al texto del elemento en el DOM
    const texto_estado = document.querySelector('#estado_proyecto');
    
    if (texto_estado) {
        texto_estado.textContent = `Estado del proyecto: ${estadoProyecto}`; // Muestra el estado
    }
});
