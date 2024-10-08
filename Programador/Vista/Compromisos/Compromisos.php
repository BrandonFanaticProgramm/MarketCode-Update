<?php


session_start();
error_reporting(E_ALL);
include('../../../Conexion/conexion.php');
ini_set('display_errors', 1);

$id_programador = intval($_GET['id_programador']);

$consultaCompromisos = "SELECT 
    Programadores.id_programador,
    Programadores.especialidad,
    Servicios.tipo_paquete, 
    Servicios.descripcion_servicio, 
    Servicios.numero_entrega, 
    Servicios.numero_revisiones,
    Servicios.Detalle_1,
    Servicios.Detalle_2,
    Servicios.Detalle_3,
    Servicios.Detalle_4,
    Servicios.Detalle_5,
    Clientes.id_cliente,
    Clientes.Direccion,
    Clientes.Telefono,
    Usuarios.Nombre AS Nombre_Cliente,
    Usuarios.Apellido AS Apellido_Cliente,
    Contrataciones.fecha_contratacion
FROM 
    Contrataciones
JOIN 
    Servicios ON Contrataciones.id_servicio = Servicios.id_servicio
JOIN 
    Programadores ON Servicios.id_programador = Programadores.id_programador
JOIN 
    Clientes ON Contrataciones.id_cliente = Clientes.id_cliente
JOIN 
    Usuarios ON Clientes.id_usuario = Usuarios.id_usuario
WHERE 
    Programadores.id_programador = '$id_programador';";

$resultadoCompromisos = $conexion->query($consultaCompromisos);
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Compromisos con Boxicons</title>
    <link rel="stylesheet" href="../assets/scss/styles.css">
    <link rel="shortcut icon" href="../../../landing-page/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
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
                    <a href="../VistaProgramador.php?id_programador=<?php echo $id_programador; ?>" class="nav__link">
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
                    <a href="/MarketCode/Programador/Vista/Cartera/Cartera.php?id_programador=<?php echo $id_programador; ?>" class="nav__link">
                        <i class='bx bx-wallet nav__icon'></i>
                        <span class="nav__text">Cartera</span>
                    </a>

                    <a href="/MarketCode/Programador/Vista/Compromisos/Compromisos.php?id_programador=<?php echo $id_programador; ?>" class="nav__link active">
                        <i class='bx bx-task nav__icon'></i>
                        <span class="nav__text">Compromisos</span>
                    </a>
                </ul>
            </div>
            <a href="../logout.php"" class=" nav__link">
                <i class='bx bx-log-out-circle nav__icon'></i>
                <span class="nav__text">Cerrar Sesion</span>
            </a>
        </nav>
    </div>

    <h1>Mis Compromisos</h1>

    <div class="compromisos-lista">

        <?php
        if ($resultadoCompromisos) {
            if ($resultadoCompromisos->num_rows > 0) {
                while ($fila = $resultadoCompromisos->fetch_assoc()) {
                    $descripcion_servicio = $fila['descripcion_servicio'];
                    $tipo_plan = $fila['tipo_paquete'];
                    $revisiones = $fila['numero_revisiones'];
                    $diasEntrega = $fila['numero_entrega'];

                    $detalle_1 = $fila['Detalle_1'];
                    $detalle_2 = $fila['Detalle_2'];
                    $detalle_3 = $fila['Detalle_3'];
                    $detalle_4 = $fila['Detalle_4'];
                    $detalle_5 = $fila['Detalle_5'];

                    // Tarjeta de compromiso
                    echo '<div class="compromiso-item">';
                    echo '<h2>' . htmlspecialchars($descripcion_servicio) . '</h2>';
                    echo '<p><span class="resaltado">Paquete:</span> ' . htmlspecialchars($tipo_plan) . '</p>';
                    echo '<p><span class="resaltado">Detalles del servicio:</span></p>';
                    echo '<ul>';

                    // Imprimir detalles si no están vacíos o nulos
                    if (!empty($detalle_1)) {
                        echo '<li><i class="bx bx-check"></i> ' . htmlspecialchars($detalle_1) . '</li>';
                    }
                    if (!empty($detalle_2)) {
                        echo '<li><i class="bx bx-check"></i> ' . htmlspecialchars($detalle_2) . '</li>';
                    }
                    if (!empty($detalle_3)) {
                        echo '<li><i class="bx bx-check"></i> ' . htmlspecialchars($detalle_3) . '</li>';
                    }
                    if (!empty($detalle_4)) {
                        echo '<li><i class="bx bx-check"></i> ' . htmlspecialchars($detalle_4) . '</li>';
                    }
                    if (!empty($detalle_5)) {
                        echo '<li><i class="bx bx-check"></i> ' . htmlspecialchars($detalle_5) . '</li>';
                    }

                    echo '</ul>';
                    echo '<p><span class="resaltado">Fecha de entrega:</span> ' . htmlspecialchars($diasEntrega) . ' días restantes</p>';
                    echo '<p><span class="resaltado">Revisiones permitidas:</span> ' . htmlspecialchars($revisiones) . '</p>';
                    echo '<a class="btn-completo" href="#">Marcar como completado</a>';
                    echo '</div>'; // Cierra la tarjeta de compromiso
                }
            } else {
                echo '<p>No hay compromisos disponibles.</p>';
            }
        } else {
            echo '<p>Error en la consulta.</p>';
        }


        ?>
    </div>

    <script src="../assets/js/main.js"></script>
    <script src="./js/index.js" type="module"></script>
</body>

</html>