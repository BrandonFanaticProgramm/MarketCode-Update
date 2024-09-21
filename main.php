<?php
include('Conexion/conexion.php');

// Consulta para obtener los primeros 4 programadores
$consulta = "SELECT Programadores.id_programador, Usuarios.Nombre, Usuarios.Apellido, Programadores.foto_perfil, Programadores.localidad, Programadores.sobre_mi 
             FROM Programadores 
             INNER JOIN Usuarios 
             ON Usuarios.id_usuario = Programadores.id_usuario 
             LIMIT 4";

$resultado = $conexion->query($consulta);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MarketCode</title>
    <link rel="stylesheet" href="landing-page/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;700&display=swap" rel="stylesheet">
</head>

<body>

    <section class="principal">
        <header class="header">
            <nav class="botones-navegacion">
                <div class="logo"></div>
                <ul class="btns-izquierda">
                    <li><a href="#">Ver Perfiles</a></li>
                    <li><a href="#">Contáctanos</a></li>
                </ul>
                <ul class="btns-derecha">
                    <li class="btn-login"><a href="Sesion-Registro/Iniciar-Sesion/index.php">Inicia Sesión</a></li>
                    <li class="btn-registrar"><a href="Sesion-Registro/Registrarse/signUp.php">Registrarse</a></li>
                    <li class="btn-registrar"><a href="Admin/Principal.php">Administrador</a></li>
                </ul>
            </nav>
        </header>

        <main class="contenido">
            <article class="introduccion">
                <h1>Tu marketplace de soluciones digitales.</h1>
                <p>Compra y vende páginas web de alta calidad.
                    Navega fácilmente y encuentra soluciones diseñadas para tus necesidades
                    en un marketplace intuitivo y eficiente.
                </p>
                <div class="boton-vermas">
                    <a href="#">Explorar</a>
                </div>
            </article>
            <div class="ilustracion"></div>
        </main>
    </section>

    <!-- ---------SEGUNDA SECCION--------- -->

    <section class="informacion">
        <div class="presentacion">
            <h1>Bienvenidos a <strong>MarketCode</strong>, tu espacio para comprar
                y vender páginas web.
            </h1>
            <p>Este mes, destacamos a nuestros
                programadores estrella:
            </p>
        </div>

        <!-- Tarjetas de perfiles de programadores -->
        <div class="cartas">
            <?php
            if ($resultado->num_rows > 0) {
                while ($programador = $resultado->fetch_assoc()) {
                    echo '
                            <article class="carta">
                <div class="foto" style="background-image: url(\'uploads/' . htmlspecialchars($programador['foto_perfil']) . '\');" alt="Foto de perfil"></div>
                <div class="info">
                    <h5 class="nombre">' . htmlspecialchars($programador['Nombre']) . ' ' . htmlspecialchars($programador['Apellido']) . '</h5>
                    <div class="calificacion">
                        <p class="estrellas">5.0</p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                        </svg>
                    </div>
                    <button id="boton-perfil" class="ver-perfil">Ver mas</button>
                </div>
            </article>';
                }
            } else {
                echo '<p>No se encontraron programadores.</p>';
            }
            ?>
        </div>
    </section>

    <footer class="footer-page">
        <div class="social-media w-100 bg-black p-4 d-flex justify-content-around">
            <p class="text-white text-center my-3">Puedes visitar nuestras redes sociales:</p>
            <a href="#"><i class="fa-brands fa-facebook"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
            <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
            <a href="#"><i class="fa-brands fa-github"></i></a>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded',() => {
            document.querySelectorAll('.ver-perfil').forEach(boton => {

               boton.addEventListener('click', () => {

                window.location.href = 'Sesion-Registro/Registrarse/signUp.php';
               })
            })
        })
    </script>
</body>

</html>