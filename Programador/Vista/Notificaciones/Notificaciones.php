<?php

session_start();
error_reporting(E_ALL);
include('../../../Conexion/conexion.php');
ini_set('display_errors', 1);

$id_programador = intval($_GET['id_programador']);
$consultaNotificaciones = "SELECT 
    C.id_contratacion,
    U.Nombre AS Nombre_Cliente,
    U.Apellido AS Apellido_Cliente,
    S.tipo_paquete AS Tipo_Paquete,
    S.precio AS Precio,
    S.descripcion_servicio AS Descripcion_Servicio,
    C.fecha_contratacion AS Fecha_Contratacion,
    P.metodo_pago AS Metodo_Pago,
    P.fecha_transaccion AS Fecha_Transaccion,
    P.estado AS Estado_Pago,
    R.calificacion AS Calificacion,
    R.comentario AS Comentario
FROM 
    Contrataciones C
JOIN 
    Clientes Cl ON C.id_cliente = Cl.id_cliente
JOIN 
    Usuarios U ON Cl.id_usuario = U.id_usuario  -- Ahora se une a Usuarios para obtener el nombre del cliente
JOIN 
    Servicios S ON C.id_servicio = S.id_servicio
JOIN 
    Pagos P ON C.id_contratacion = P.id_contratacion
LEFT JOIN 
    Resenas R ON C.id_contratacion = R.id_contratacion
WHERE 
    C.id_programador = '$id_programador'
";

$resultadoConsulta = $conexion->query($consultaNotificaciones);


?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="../assets/scss/styles.css">
    <link rel="stylesheet" href="style.css">
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
                    <a href="../VistaProgramador.php" class="nav__link">
                        <i class='bx bx-grid-alt nav__icon'></i>
                        <span class="nav__text">Inicio</span>
                    </a>
                    <a href="/MarketCode/Programador/Vista/Perfil/Perfil.php?id_programador=<?php echo $id_programador; ?>" class="nav__link">
                        <i class='bx bx-user nav__icon'></i>
                        <span class="nav__text">Perfil</span>
                    </a>
                    <a href="/MarketCode/Programador/Vista/Notificaciones/Notificaciones.php?id_programador=<?php echo $id_programador; ?>" class="nav__link active">
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

    <div class="notificaciones-container">
        <h2>Notificaciones de Contrataciones</h2>

        <!-- Si no hay notificaciones, mostrar esto -->
        <?php

        if ($resultadoConsulta && $resultadoConsulta->num_rows > 0) {
            while ($fila = $resultadoConsulta->fetch_assoc()) {
                // Convertir la fecha al formato deseado
                $fecha_contratacion = date('d \d\e F, Y', strtotime($fila['Fecha_Contratacion']));

                echo '<div class="notificacion">';
                echo '<p><span>Servicio:</span> <span class="servicio">' . htmlspecialchars($fila['Descripcion_Servicio']) . '</span></p>';
                echo '<p><span>Cliente:</span> <span class="cliente">' . htmlspecialchars($fila['Nombre_Cliente']) . ' ' . htmlspecialchars($fila['Apellido_Cliente']) . '</span></p>';
                echo '<p class="fecha"><span class="fecha-contratacion">Fecha de Contratación:</span> ' . $fecha_contratacion . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p class="no-notificaciones">No hay notificaciones de contrataciones disponibles.</p>';
        }
        ?>
    </div>

    <script src="../assets/js/main.js"></script>
</body>

</html>