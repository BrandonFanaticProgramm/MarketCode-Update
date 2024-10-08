<?php
session_start();
error_reporting(E_ALL);
include('../../../Conexion/conexion.php');
ini_set('display_errors', 1);

$saldoProgramador = 0;
$id_programador = intval($_GET['id_programador']);

$consultaSaldo = "SELECT 
    P.pago_id,
    C.id_contratacion,
    S.precio AS Precio_Servicio,
    P.metodo_pago,
    P.fecha_transaccion,
    P.estado
FROM 
    Pagos P
JOIN 
    Contrataciones C ON P.id_contratacion = C.id_contratacion
JOIN 
    Servicios S ON C.id_servicio = S.id_servicio
WHERE 
    C.id_programador = '$id_programador'";

$resultadoSaldo = $conexion -> query($consultaSaldo);

if($resultadoSaldo) {

    if($resultadoSaldo -> num_rows > 0) {

        while($fila = $resultadoSaldo -> fetch_assoc()) {

            $saldoProgramador += $fila['Precio_Servicio'];
        }
    }
}


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
                    <a href="/MarketCode/Programador/Vista/Cartera/Cartera.php?id_programador=<?php echo $id_programador; ?>" class="nav__link active">
                        <i class='bx bx-wallet nav__icon'></i>
                        <span class="nav__text">Cartera</span>
                    </a>

                    <a href="/MarketCode/Programador/Vista/Compromisos/Compromisos.php?id_programador=<?php echo $id_programador; ?>" class="nav__link">
                        <i class='bx bx-task nav__icon'></i>
                        <span class="nav__text">Compromisos</span>
                    </a>
                </ul>
            </div>
            <a href="../logout.php" class="nav__link">
                <i class='bx bx-log-out-circle nav__icon'></i>
                <span class="nav__text">Cerrar Sesion</span>
            </a>
        </nav>
    </div>

    <div class="saldo-container">
        <h2>Saldo Total Ganado</h2>

        <!-- Muestra el saldo total ganado -->
        <p class="saldo-total">$<?php echo $saldoProgramador; ?> USD</p>



        <!-- Detalles adicionales sobre el saldo -->
        <p class="detalle-saldo">Saldo total generado por los pagos de los usuarios en MarketCode</p>

    </div>
    <script src="../assets/js/main.js"></script>
</body>

</html>