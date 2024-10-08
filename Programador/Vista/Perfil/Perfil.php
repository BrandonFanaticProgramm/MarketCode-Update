<?php
session_start();
error_reporting(E_ALL);
include('../../../Conexion/conexion.php');
ini_set('display_errors', 1);

$id_programador = intval($_GET['id_programador']);

$consultaProgramador = "
    SELECT 
        Usuarios.Nombre,
        Usuarios.Apellido,
        Programadores.sobre_mi,
        Programadores.disponibilidad,
        Programadores.experiencia,
        Programadores.localidad,
        Programadores.link_github,
        Programadores.foto_perfil,
        GROUP_CONCAT(Lenguajes_Programadores.nombre SEPARATOR ', ') AS lenguajes
    FROM 
        Usuarios
    JOIN 
        Programadores ON Programadores.id_usuario = Usuarios.id_usuario
    LEFT JOIN 
        Programador_Lenguaje ON Programador_Lenguaje.id_programador = Programadores.id_programador
    LEFT JOIN 
        Lenguajes_Programadores ON Lenguajes_Programadores.id_lenguaje = Programador_Lenguaje.id_lenguaje
    WHERE 
        Programadores.id_programador = $id_programador
    GROUP BY 
        Usuarios.id_usuario, Programadores.id_programador";

$resultado = $conexion->query($consultaProgramador);
$programador = $resultado->fetch_assoc();

if (!$programador) {
    echo "Programador no encontrado.";
    exit;
}

?>




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
                    <a href="../VistaProgramador.php?id_programador=<?php echo $id_programador; ?>" class="nav__link">
                        <i class='bx bx-grid-alt nav__icon'></i>
                        <span class="nav__text">Inicio</span>
                    </a>
                    <a href="/MarketCode/Programador/Vista/Perfil/Perfil.php?id_programador=<?php echo $id_programador; ?>" class="nav__link active">
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
                    <a href="/MarketCode/Programador/Vista/Cartera/Cartera.php?id_programador=<?php echo $id_programador; ?>" class="nav__link">
                        <i class='bx bx-wallet nav__icon'></i>
                        <span class="nav__text">Cartera</span>
                    </a>

                    <a href="/MarketCode/Programador/Vista/Cartera/Cartera.php?id_programador=<?php echo $id_programador; ?>" class="nav__link">
                        <i class='bx bx-task nav__icon'></i>
                        <span class="nav__text">Compromisos</span>
                    </a>
                </ul>
            </div>
            <a href="../logout.php"" class="nav__link">
                <i class='bx bx-log-out-circle nav__icon'></i>
                <span class="nav__text">Cerrar Sesion</span>
            </a>
        </nav>
    </div>

    <div class="container">
        <div class="img-programador" style="background-image: url('../../../uploads/<?php echo $programador['foto_perfil']; ?>');"></div>



        <div class="container-name">
            <h1><?php echo $programador['Nombre'] . ' ' . $programador['Apellido'] ?></h1>
            <p class="sobre-mi"><span class="resaltado">Sobre mi: </span><?php echo $programador['sobre_mi'] ?></p>
            <p class="disponibilidad"><span class="resaltado">Disponibilidad: </span><span><?php if($programador['disponibilidad']) {
                echo 'Disponible';
            } else {
                echo 'No Disponible';
            } ?></span></p>
            <p class="mi-experiencia"><span class="resaltado">Experiencia:</span> <?php echo $programador['experiencia'] ?> Años</p>
            <p class="pais"><span class="resaltado">PAIS: </span><?php echo $programador['localidad'] ?></p>
            <P class="mi-github"><span class="resaltado">GITHUB: </span> <a href="<?php echo $programador['link_github']; ?>" target="_blank"><?php echo $programador['link_github'] ?></a> <br>

            <ul class="tecnologias">
                <h2 class="resaltado">Tecnologías que manejo</h2>
                <?php

                $lenguajes = explode(',', $programador['lenguajes']);

                foreach ($lenguajes as $lenguaje) {

                    echo "<li>$lenguaje</li>";
                }

                ?>
            </ul>
        </div>
        <a href="#" class="btn-editar">Editar</a> <!---n0 funciona!--->
    </div>


    <script src="../assets/js/main.js"></script>
</body>


</html>