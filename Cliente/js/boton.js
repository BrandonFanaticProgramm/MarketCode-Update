document.addEventListener('DOMContentLoaded', function() {
    const verPerfilButtons = document.querySelectorAll('.ver-perfil');
    const perfilDetallado = document.getElementById('carta-perfil');
    const cerrarPerfil = document.getElementById('cerrar-perfil');
    const fondo = document.getElementById('fondo');
    const contratar = document.querySelector('.btn-contrato');
    let userId;


    function getQueryParam(param) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(param);
    }


    const id_cliente = getQueryParam('id_cliente');

    // Función para cargar la información del perfil
    function cargarPerfil(programadorId) {
        fetch(`../js/obtenerPerfil.php?id_programador=${programadorId}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Asignar los valores del perfil al HTML
                    document.querySelector('#carta-perfil .foto').style.backgroundImage = `url('../../uploads/${data.data.foto_perfil}')`;
                    document.querySelector('#carta-perfil .nombre').textContent = `${data.data.Nombre} ${data.data.Apellido}`;
                    document.querySelector('#carta-perfil .nacionalidad').textContent = `Pais: ${data.data.localidad}`;
                    document.querySelector('#carta-perfil .descripcion').textContent = data.data.sobre_mi;
                    document.querySelector('#carta-perfil .especialidad').textContent = data.data.especialidad;

                    //Manejo de lenguajes
                    document.querySelector('.tecnologias-programador').innerHTML = "";
                    let lenguajes = data.data.lenguajes.split(',');
                    lenguajes.forEach(lenguaje => {
                        const lenguajeInterfaz = document.createElement('li');
                        lenguajeInterfaz.textContent = lenguaje;
                        document.querySelector('.tecnologias-programador').appendChild(lenguajeInterfaz);
                    })
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
                userId = button.getAttribute('data-id');
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

    contratar.addEventListener("click",() => {

        contratar.setAttribute('href',`../../Programador/plan-pagos/Servicios.php?id_programador=${userId}&id_cliente=${id_cliente}`); // AGREGANDO ATRIBUTO DINAMICAMENTE AL BOTON PARA REDIRIGIR CON EL ID CORRECTO
    });
});
