 // Función para mostrar la animación de carga y redirigir después de 2 segundos
 function showLoadingAnimation() {
    document.getElementById('confirm-button').style.display = 'none';
    document.getElementById('loading').style.display = 'block';

    // Redirigir después de 2 segundos
    setTimeout(() => {
        if (typeof id_cliente !== 'undefined' && typeof id_contratacion !== 'undefined') {
            window.location.href = "../Pagos/Pagos.php?id_cliente=" + id_cliente + "&id_contratacion=" + id_contratacion;
        } else {
            console.error('Las variables id_cliente o id_contratacion no están definidas.');
        }
    }, 2000);

    return false; // Evitar el envío del formulario
}

//Asignar el evento de carga al envío del formulario
document.querySelector('form').onsubmit = showLoadingAnimation;