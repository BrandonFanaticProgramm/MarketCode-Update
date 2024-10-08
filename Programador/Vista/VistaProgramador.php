<?php

session_start();
error_reporting(E_ALL);
include('../../Conexion/conexion.php');
ini_set('display_errors', 1);


$id_programador = intval($_GET['id_programador']);

$Nombre_programador = "";
$Apellido_Programador = "";

$consultaProgramador = "SELECT Usuarios.Nombre,Usuarios.Apellido
FROM Usuarios
JOIN Programadores ON Programadores.id_usuario = Usuarios.id_usuario WHERE id_programador = '$id_programador'";

$resultadoConsulta = $conexion -> query($consultaProgramador);

if($resultadoConsulta) {

    while($fila = $resultadoConsulta -> fetch_assoc()) {

        $Nombre_programador = $fila['Nombre'];
        $Apellido_Programador = $fila['Apellido'];
    }
}


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Programador MarketCode</title>
    <link rel="shortcut icon" href="../../../landing-page/images/logo.png" type="image/x-icon">
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
                    <a href="../VistaProgramador.php?id_programador=<?php echo $id_programador; ?>" class="nav__link active">
                        <i class='bx bx-grid-alt nav__icon'></i>
                        <span class="nav__text">Inicio</span>
                    </a>
                    <a href="/MarketCode/Programador/Vista/Perfil/Perfil.php?id_programador=<?php echo $id_programador; ?>" class="nav__link">
                        <i class='bx bx-user nav__icon'></i>
                        <span class="nav__text">Perfil</span>
                    </a>
                    <a href="/MarketCode/Programador/Vista/Notificaciones/Notificaciones.php?id_programador=<?php echo $id_programador; ?>" class="nav__link ">
                        <i class='bx bx-bell nav__icon'></i>
                        <span class="nav__text">Notificaciones</span>
                    </a>
                    <a href="/MarketCode/Programador/Vista/Proyectos/Proyectos.php?id_programador=<?php echo $id_programador; ?>" class="nav__link">
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
            <a href="./logout.php" class="nav__link">
                <i class='bx bx-log-out-circle nav__icon'></i>
                <span class="nav__text">Cerrar Sesion</span>
            </a>
        </nav>
    </div>
    <h1 class="__titulo">Bienvenido <span class="resaltado"><?php echo $Nombre_programador . ' ' . $Apellido_Programador?></span></h1>
    <p>¡Bienvenido a <span class="resaltado">MarketCode</span>, el espacio donde los programadores no solo encuentran oportunidades, sino que se sumergen en proyectos desafiantes y bien recompensados! 🎉

        Nos emociona que hayas iniciado sesión y hayas dado el primer paso para formar parte de esta innovadora plataforma de contratación. Aquí, no solo eres contratado, también se te valora por tu trabajo y se te conecta con proyectos que realmente importan.</p> <br>

    <h2 class="__titulo">¿Qué te ofrece <span class="resaltado">MarketCode</span> como programador contratado?</h2>

    <ul>
        <li>💼 <span class="__subtitulos">Contrataciones directas y transparentes</span>: En <span class="resaltado">MarketCode</span>, cuando eres seleccionado para un proyecto, las cosas son claras desde el principio. Sabes exactamente las expectativas del trabajo, los plazos y, lo más importante, la compensación que recibirás por tu experiencia y esfuerzo. Aquí no hay confusiones ni sorpresas, solo una relación profesional justa y directa.</li> <br>

        <li>
            💰 <span class="__subtitulos">Pago asegurado y justo</span>: Cuando eres contratado a través de <span class="resaltado">MarketCode</span>, puedes estar tranquilo sabiendo que serás pagado de manera oportuna y justa por cada tarea cumplida. Nuestra plataforma está diseñada para garantizar que cada programador reciba la compensación acordada al finalizar sus entregas. Es una experiencia laboral que valora tu tiempo y esfuerzo, como debe ser.
        </li> <br>

        <li>
            🛠️ <span class="__subtitulos">Tareas claras y orientadas a resultados</span>: Tu talento es lo que las empresas necesitan, y aquí recibirás tareas detalladas y objetivos bien definidos para cada proyecto en el que trabajes. Nos aseguramos de que tanto las expectativas como los plazos sean realistas y alcanzables, para que puedas enfocarte en lo que mejor sabes hacer: programar.
        </li> <br>

        <li>
            🚀 <span class="__subtitulos">Crecimiento profesional en cada proyecto</span>: Al ser contratado a través de <span class="resaltado">MarketCode</span>, no solo estás completando tareas, sino también construyendo un portafolio que destaca tu capacidad para resolver problemas reales y entregar soluciones de calidad. Cada tarea que completes será una muestra de tu habilidad y compromiso, lo que te abrirá aún más puertas en la plataforma y más allá.
        </li> <br>
    </ul>
    <script src="./assets/js/main.js"></script>
</body>


</html>