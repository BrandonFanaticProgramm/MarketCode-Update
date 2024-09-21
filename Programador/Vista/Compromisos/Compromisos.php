<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="../assets/scss/styles.css">
    <link rel="stylesheet" href="style.css">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./assets/scss/styles.css">
</head>

<body id="body">
    <div class="l-navbar" id="navbar">
        <nav class="nav">
            <div>
                <a href="#" class="nav__logo">
                    <img src="assets/icons/logo.svg" alt="" class="nav__logo-icon">
                    <span class="nav__logo-text">MarketCode</span>
                </a>

                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-chevron-right'></i>
                </div>

                <ul class="nav__list">
                    <a href="../VistaProgramador.php" class="nav__link">
                        <i class='bx bx-grid-alt nav__icon'></i>
                        <span class="nav__text">Inicio</span>
                    </a>
                    <a href="/MarketCode/Programador/Vista/Perfil/Perfil.php" class="nav__link">
                        <i class='bx bx-user nav__icon'></i>
                        <span class="nav__text">Perfil</span>
                    </a>
                    <a href="/MarketCode/Programador/Vista/Notificaciones/Notificaciones.php" class="nav__link ">
                        <i class='bx bx-bell nav__icon'></i>
                        <span class="nav__text">Notificaciones</span>
                    </a>
                    <a href="/MarketCode/Programador/Vista/Proyectos/Proyectos.php" class="nav__link">
                        <i class='bx bx-briefcase nav__icon'></i>
                        <span class="nav__text">Proyectos</span>
                    </a>
                    <a href="/MarketCode/Programador/Vista/Cartera/Cartera.php" class="nav__link">
                        <i class='bx bx-wallet nav__icon'></i>
                        <span class="nav__text">Cartera</span>
                    </a>

                    <a href="/MarketCode/Programador/Vista/Compromisos/Compromisos.php" class="nav__link active">
                        <i class='bx bx-task nav__icon'></i>
                        <span class="nav__text">Compromisos</span>
                    </a>
                </ul>
            </div>
            <a href="#" class="nav__link">
                <i class='bx bx-log-out-circle nav__icon'></i>
                <span class="nav__text">Cerrar Sesion</span>
            </a>
        </nav>
    </div>

    <h1>Mis Compromisos</h1>

    <div class="compromisos-lista">
        <!-- Compromiso 1 -->
        <div class="compromiso-item">
            <h2>Desarrollo de Página Web</h2>
            <p><span class="resaltado">Paquete:</span> Estándar</p>
            <p><span class="resaltado">Descripción:</span> Crear una página web para una empresa.</p>
            <p><span class="resaltado">Fecha de entrega:</span> 7 días restantes</p>
            <p><span class="resaltado">Revisiones permitidas:</span> 3</p>
        </div>

        <!-- Compromiso 2 -->
        <div class="compromiso-item">
            <h2>Desarrollo de Aplicación Móvil</h2>
            <p><span class="resaltado">Paquete:</span> Premium</p>
            <p><span class="resaltado">Descripción:</span> Desarrollar una aplicación móvil para un e-commerce.</p>
            <p><span class="resaltado">Fecha de entrega:</span> 14 días restantes</p>
            <p><span class="resaltado">Revisiones permitidas:</span> 5</p>
        </div>

        <!-- Compromiso 3 -->
        <div class="compromiso-item">
            <h2>Diseño de Logo Corporativo</h2>
            <p><span class="resaltado">Paquete:</span> Básico</p>
            <p><span class="resaltado">Descripción:</span> Crear un logo moderno para una startup.</p>
            <p><span class="resaltado">Fecha de entrega:</span> 5 días restantes</p>
            <p><span class="resaltado">Revisiones permitidas:</span> 2</p>
        </div>
    </div>

    <script src="../assets/js/main.js"></script>
</body>

</html>