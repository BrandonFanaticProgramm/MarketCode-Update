<?php
session_start();
error_reporting(E_ALL);
include('../../../Conexion/conexion.php');
ini_set('display_errors', 1);

$id_programador = intval($_GET['id_programador']);

$consultaProyectos = "SELECT * FROM Proyectos WHERE id_programador = '$id_programador'";

$resultadosProyectos = $conexion -> query($consultaProyectos);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="../assets/scss/styles.css">
    <link rel="shortcut icon" href="../../../landing-page/images/logo.png" type="image/x-icon">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>

<body id="body">
    <div class="l-navbar" id="navbar">
        <nav class="nav">
            <div>
                <a href="../VistaProgramador.php" class="nav__logo">
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
                    <a href="/MarketCode/Programador/Vista/Perfil/Perfil.php?id_programador=<?php echo $id_programador; ?>" class="nav__link">
                        <i class='bx bx-user nav__icon'></i>
                        <span class="nav__text">Perfil</span>
                    </a>
                    <a href="/MarketCode/Programador/Vista/Notificaciones/Notificaciones.php?id_programador=<?php echo $id_programador; ?>" class="nav__link">
                        <i class='bx bx-bell nav__icon'></i>
                        <span class="nav__text">Notificaciones</span>
                    </a>
                    <a href="/MarketCode/Programador/Vista/Proyectos/Proyectos.php?id_programador=<?php echo $id_programador; ?>" class="nav__link active">
                        <i class='bx bx-briefcase nav__icon'></i>
                        <span class="nav__text">Proyectos</span>
                    </a>
                    <a href="/MarketCode/Programador/Vista/Cartera/Cartera.php?id_programador=<?php echo $id_programador; ?>" class="nav__link">
                        <i class='bx bx-wallet nav__icon'></i>
                        <span class="nav__text">Cartera</span>
                    </a>

                    <a href="/MarketCode/Programador/Vista/Compromisos/Compromisos.php?id_programador=<?php echo $id_programador; ?>" class="nav__link">
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

    <h1>Mis Proyectos</h1>

    <div class="proyectos-container">


        <?php
        if ($resultadosProyectos) {
            if ($resultadosProyectos->num_rows > 0) {
                while ($fila = $resultadosProyectos->fetch_assoc()) {
                    // Escapar datos para evitar problemas de seguridad
                    $nombre_proyecto = htmlspecialchars($fila['nombre_proyecto']);
                    $descripcion_proyecto = htmlspecialchars($fila['descripcion_proyecto']);
                    $img_proyecto = htmlspecialchars($fila['img_proyecto']);
                    $link_proyecto = htmlspecialchars($fila['link_proyecto']);

                    echo '<div class="proyecto">';
                    echo '<img src="../../../uploads_proyectos/' . $img_proyecto . '" alt="Imagen del Proyecto">';
                    echo '<h3>' . $nombre_proyecto . '</h3>';
                    echo '<p>' . $descripcion_proyecto . '</p>';
                    echo '<a href="' . $link_proyecto . '">Ver Proyecto</a>';
                    echo '</div>';
                }
            } else {
                echo '<p>No hay proyectos disponibles.</p>';
            }
        } else {
            echo '<p>Error al obtener los proyectos.</p>';
        }
    ?>
    </div>
    <script src="../assets/js/main.js"></script>
</body>
</html>