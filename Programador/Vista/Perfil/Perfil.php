<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/scss/styles.css">
    <title>Bootstrap demo</title>
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../assets/scss/styles.css">
    <link rel="stylesheet" href="style.css">
</head>

<body id="body">
    <div class="l-navbar" id="navbar">
        <nav class="nav">
            <div>
                <a href="../../../main.php" class="nav__logo">
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
                    <a href="/MarketCode/Programador/Vista/Perfil/Perfil.php" class="nav__link active">
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

                    <a href="/MarketCode/Programador/Vista/Cartera/Cartera.php" class="nav__link">
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

    <div class="container">
        <div class="img-programador"></div>

        <div class="container-name">
            <h1>Brandon Alexis Quintero</h1>
            <p class="sobre-mi"><span class="resaltado">Sobre mi: </span>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nostrum quia perferendis et, incidunt nam accusamus magni corporis explicabo non neque vitae natus quae beatae error ut ducimus voluptatum, ratione nobis.</p>
            <p class="disponibilidad"><span class="resaltado">Disponibilidad: </span><span>Disponible</span></p>
            <p class="mi-experiencia"><span class="resaltado">Experiencia:</span> 10 Años</p>
            <p class="pais"><span class="resaltado">PAIS: </span>CO</p>
            <P class="mi-github"><span class="resaltado">GITHUB: </span> <a href="#">github/brandon</a> <br>

            <ul class="tecnologias">
                <h2 class="resaltado">Tecnologías que manejo</h2>
                <li>SQL</li>
                <li>Python</li>
                <li>Java</li>
            </ul>
        </div>
        <a href="#" class="btn-editar">Editar</a>
    </div>


    <script src="../assets/js/main.js"></script>
</body>


</html>