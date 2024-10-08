<?php
session_start();
include('../../Conexion/conexion.php');

$id_cliente = intval($_GET['id_cliente']);
$id_contratacion = intval($_GET['id_contratacion']);

$consultaTablero = "
    SELECT 
        Clientes.Direccion,
        Clientes.Telefono,
        U1.Nombre AS Nombre_Cliente,
        U1.Apellido AS Apellido_Cliente,
        Servicios.tipo_paquete,
        Servicios.precio,
        Servicios.descripcion_servicio,
        Servicios.numero_entrega,
        Servicios.numero_revisiones,
        Pagos.metodo_pago,
        Pagos.fecha_transaccion,
        Pagos.estado AS estado_pago,
        Programadores.especialidad,
        Programadores.localidad,
        Programadores.link_github,
        U2.Nombre AS Nombre_Programador,
        U2.Apellido AS Apellido_Programador
    FROM 
        Pagos
    JOIN 
        Contrataciones ON Pagos.id_contratacion = Contrataciones.id_contratacion
    JOIN 
        Clientes ON Contrataciones.id_cliente = Clientes.id_cliente
    JOIN 
        Servicios ON Contrataciones.id_servicio = Servicios.id_servicio
    JOIN 
        Programadores ON Servicios.id_programador = Programadores.id_programador
    JOIN 
        Usuarios AS U1 ON Clientes.id_usuario = U1.id_usuario
    JOIN 
        Usuarios AS U2 ON Programadores.id_usuario = U2.id_usuario
    WHERE 
        Clientes.id_cliente = '$id_cliente' AND 
        Contrataciones.id_contratacion = '$id_contratacion';
";


$resultadoTablero = $conexion->query($consultaTablero);
if ($resultadoTablero && $resultadoTablero->num_rows > 0) {
    $datosTablero = $resultadoTablero->fetch_assoc();
} else {
    echo '<script>alert("No se encontraron detalles para esta contratación.")</script>';
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Tablero de Cliente</title>
</head>
<body>
    <div class="tablero-cliente">
        <h1>Bienvenido <?php echo htmlspecialchars($datosTablero['Nombre_Cliente']) . ' ' . htmlspecialchars($datosTablero['Apellido_Cliente']); ?></h1>
        <h2>Detalles del Servicio</h2>
        <p><strong>Paquete:</strong> <?php echo htmlspecialchars($datosTablero['tipo_paquete']); ?></p>
        <p><strong>Precio:</strong> $<?php echo htmlspecialchars($datosTablero['precio']); ?></p>
        <p><strong>Descripción:</strong> <?php echo htmlspecialchars($datosTablero['descripcion_servicio']); ?></p>
        <p><strong>Entrega:</strong> Se hara entrega del proyecto en <?php echo htmlspecialchars($datosTablero['numero_entrega']); ?> dias</p>
        <p><strong>Revisiones:</strong> <?php echo htmlspecialchars($datosTablero['numero_revisiones']); ?></p>

        <h2>Detalles del Pago</h2>
        <p><strong>Método de Pago:</strong> <?php echo htmlspecialchars($datosTablero['metodo_pago']); ?></p>
        <p><strong>Fecha de Transacción:</strong> <?php echo htmlspecialchars($datosTablero['fecha_transaccion']); ?></p>
        <p><strong>Estado del Pago:</strong> <?php echo htmlspecialchars($datosTablero['estado_pago']); ?></p>

        <h2>Programador Asignado</h2>
        <p><strong>Nombre Completo: </strong><?php echo htmlspecialchars($datosTablero['Nombre_Programador'])  . ' ' . htmlspecialchars($datosTablero['Apellido_Programador'])?></p>
        <p><strong>Especialidad:</strong> <?php echo htmlspecialchars($datosTablero['especialidad']); ?></p>
        <p><strong>Localidad:</strong> <?php echo htmlspecialchars($datosTablero['localidad']); ?></p>
        <?php if (!empty($datosTablero['link_github'])): ?>
            <p><strong>GitHub:</strong> <a href="<?php echo htmlspecialchars($datosTablero['link_github']); ?>" class="link">Ver Perfil</a></p>
        <?php endif; ?>
        <p id="estado_proyecto">Estado del proyecto: </p>
        <a class ="link" href="../VistaCliente/Cliente.php?id_cliente=<?php echo $id_cliente; ?>">Regresar</a>
    </div>
    <script src="./js/index.js"></script>
</body>
</html>
