const verPerfil = document.getElementById('boton-perfil')
const perfilDetallado = document.getElementById('carta-perfil')
const cerrarPerfil = document.getElementById('cerrar-perfil')
const fondo = document.getElementById('fondo')


verPerfil.addEventListener('click', function(){
    perfilDetallado.style.display = 'block';
    fondo.style.display = 'block';
});

cerrarPerfil.addEventListener('click', function(){
    perfilDetallado.style.display = 'none';
    fondo.style.display = 'none'
});