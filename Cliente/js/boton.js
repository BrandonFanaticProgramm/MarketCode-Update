document.addEventListener('DOMContentLoaded', function() {
    const verPerfilButtons = document.querySelectorAll('.ver-perfil');
    const perfilDetallado = document.getElementById('carta-perfil');
    const cerrarPerfil = document.getElementById('cerrar-perfil');
    const fondo = document.getElementById('fondo');

    // Función para cargar la información del perfil
    function cargarPerfil(userId) {
        fetch(`../js/obtenerPerfil.php?id_usuario=${userId}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Asignar los valores del perfil al HTML
                    document.querySelector('#carta-perfil .foto').style.backgroundImage = `url('../../uploads/${data.data.foto_perfil}')`;
                    document.querySelector('#carta-perfil .nombre').textContent = `${data.data.Nombre} ${data.data.Apellido}`;
                    document.querySelector('#carta-perfil .nacionalidad').textContent = `Pais: ${data.data.localidad}`;
                    document.querySelector('#carta-perfil .descripcion').textContent = data.data.sobre_mi;
                } else {
                    // Manejo de errores
                    console.error('Error al cargar el perfil:', data.message);
                }
            })
            .catch(error => console.error('Error al cargar el perfil:', error));
    }

    if (verPerfilButtons.length > 0 && perfilDetallado && cerrarPerfil) {
        verPerfilButtons.forEach(button => {
            button.addEventListener('click', function() {
                const userId = button.getAttribute('data-id');
                cargarPerfil(userId); // Cargar la información del perfil
                perfilDetallado.style.display = 'block';
                if (fondo) {
                    fondo.style.display = 'block'; // Si usas un fondo de overlay
                }
            });
        });

        cerrarPerfil.addEventListener('click', function() {
            perfilDetallado.style.display = 'none';
            if (fondo) {
                fondo.style.display = 'none'; // Si usas un fondo de overlay
            }
        });
    }
});
