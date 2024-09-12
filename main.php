<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MarketCode</title>
    <link rel="stylesheet" href="/Maquetacion-MarketCode/landing-page/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" /><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
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
                    <li class="btn-login"><a href="../Sesion-Registro/Iniciar-Sesion/index.php">Inicia Sesión</a></li>
                    <li class="btn-registrar"><a href="../Sesion-Registro/Registrarse/signUp.php">Registrarse</a></li>
                    <li class="btn-registrar"><a href="../Admin/Principal.php">Administrador</a></li>
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
            

        <!-- Presentacion del sitio -->
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
            <article>

                <!-- Foto del programador -->
                <div class="foto"></div>

                <div class="info">
                    <h5 class="nombre">Steven Tobon Londoño</h5>
                    <div class="calificacion">
                        <p class="estrellas">5.0</p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                    </div>
                    <button id="boton-perfil" class="ver-perfil">Ver Perfil</button>
                </div>
            </article>

            <article>
                <div class="foto"></div>

                <div class="info">
                    <h5 class="nombre">Brandon Quintero Alvarez</h5>
                    <div class="calificacion">
                        <p class="estrellas">1.0</p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                    </div>
                    <button id="boton-perfil" class="ver-perfil">Ver Perfil</button>
                </div>
            </article>
            <article>
                <div class="foto"></div>

                <div class="info">
                    <h5 class="nombre">Alonso Cano Hola</h5>
                    <div class="calificacion">
                        <p class="estrellas">2.0</p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                    </div>
                    <button id="boton-perfil" class="ver-perfil">Ver Perfil</button>
                </div>
            </article>
            <article>
                <div class="foto"></div>

                <div class="info">
                    <h5 class="nombre">Juan Henao</h5>
                    <div class="calificacion">
                        <p class="estrellas">10.0</p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                    </div>
                    <button id="boton-perfil" class="ver-perfil">Ver Perfil</button>
                </div>
            </article>
        </div>
    </section>



    <div id="carta-perfil" class="perfil-detallado">

        <div class="info-personal">
            <button id="cerrar-perfil" class="boton-cerrar"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                <path ="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
              </svg>
            </button>
            <div class="foto"></div>

            <div class="datos">
                <p class="nombre">Steven Tobon Londoño</p>
                <p class="edad">Edad 18</p>
                <p class="nacionalidad">Pais Colombia</p>
            </div>
        </div>
        <hr>

        <div class="descripcion-tecnologias">
            <div class="descripcion">Lorem ipsum dolor sit amet 
                consectetur adipisicing elit. Quidem, cum? Molestias 
                eveniet consequuntur fuga quisquam earum deserunt, qui a
                t consequatur qui
                busdam autem hic, ullam illo natus 
                facere fugiat eos expedita?
            </div>

            <div class="tecnologias">
                <hr>
                <h3>Tecnologias</h3>
                <ul>
                    <li>HTML</li>
                    <li>CSS</li>
                    <li>JavaScript</li>
                    <li>PHP</li>
                    <li>MySQL</li>
                </ul>
            </div>
        </div>

        <div class="enlaces">
            <h3>Contactame</h3>
            <div class="contratar">
                <ul>
                    <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                        <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8"/>
                      </svg></a>
                    </li>

                    <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                        <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
                      </svg></a>
                    </li>
                </ul>
                <a class="btn-contrato" href="../plan-pagos/pagos.html">Contratar</a>
            </div>
        </div>
    </div>


    <footer class="footer-page">
        <div class="social-media w-100 bg-black p-4 d-flex justify-content-around">
            <p class="text-white text-center my-3">Puedes visitar nuestras redes sociales:</p>
            <a href="#">
                <i class="fa-brands fa-facebook"></i>
            </a>

            <a href="#">
                <i class="fa-brands fa-instagram"></i>
            </a>

            <a href="#">
                <i class="fa-brands fa-x-twitter"></i>
            </a>

            <a href="#">
                <i class="fa-brands fa-whatsapp"></i>
            </a>

            <a href="#">
                <i class="fa-brands fa-github"></i>
            </a>

        </div>
    </footer>

    <script src="./script.js"></script>
    
</body>
</html>


