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
                    <a href="/MarketCode/Programador/Vista/Notificaciones/Notificaciones.php" class="nav__link active">
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

                    <a href="/MarketCode/Programador/Vista/Compromisos/Compromisos.php" class="nav__link">
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

    <div class="notificaciones-container">
        <h2>Notificaciones de Contrataciones</h2>

        <!-- Si no hay notificaciones, mostrar esto -->
        <p class="no-notificaciones">No tienes contrataciones recientes.</p>

        <!-- Ejemplo de notificación de contratación -->
        <!-- <div class="notificacion">
            <p><span>Servicio:</span> <span class="servicio">Desarrollo de Aplicación Web</span></p>
            <p><span>Cliente:</span> <span class="cliente">Juan Pérez</span></p>
            <p class="fecha"><span class="fecha-contratacion">Fecha de Contratación:</span> 12 de septiembre, 2023</p>
        </div>

        <div class="notificacion">
            <p><span>Servicio:</span> <span class="servicio">Mantenimiento de Base de Datos</span></p>
            <p><span>Cliente:</span> <span class="cliente">María Gómez</span></p>
            <p class="fecha"><span class="fecha-contratacion">Fecha de Contratación:</span> 15 de septiembre, 2023</p>
        </div>

        <div class="notificacion">
            <p><span>Servicio:</span> <span class="servicio">Consultoría en Machine Learning</span></p>
            <p><span>Cliente:</span> <span class="cliente">Carlos López</span></p>
            <p class="fecha"><span class="fecha-contratacion">Fecha de Contratación:</span> 20 de septiembre, 2023</p>
        </div> -->

    </div>

    <script src="../assets/js/main.js"></script>
</body>
</html>