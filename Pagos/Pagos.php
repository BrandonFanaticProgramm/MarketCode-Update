<?php

error_reporting(E_ALL);
include('../Conexion/conexion.php');
ini_set('display_errors', 1);

$id_contratacion = isset($_GET['id_contratacion']) ? intval($_GET['id_contratacion']) : 0;
$id_cliente = isset($_GET['id_cliente']) ? intval($_GET['id_cliente']) : 0;

// Consultar el cliente para mostrar el mensaje de bienvenida
$consultaCliente = "SELECT U.Nombre, U.Apellido
                    FROM Clientes C
                    JOIN Usuarios U ON C.id_usuario = U.id_usuario
                    WHERE C.id_cliente = $id_cliente";
$nombre_usuario = "";
$apellido_usuario = "";

$resultadoCliente = $conexion->query($consultaCliente);
if ($resultadoCliente) {
    while ($fila = $resultadoCliente->fetch_assoc()) {
        $nombre_usuario = $fila['Nombre'];
        $apellido_usuario = $fila['Apellido'];
    }
}

// Mostrar mensaje de bienvenida
echo "<script>
        const nombre_usuario = " . json_encode($nombre_usuario) . ";
        const apellido_usuario = " . json_encode($apellido_usuario) . ";
        alert('Hola ' + nombre_usuario + ' ' + apellido_usuario + ', te damos las gracias por confiar en nuestra plataforma MarketCode.');
    </script>";

// Comprobar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Crear objeto DateTime para la fecha y hora actuales
    $fecha_actual = new DateTime();
    $fecha_pago = $fecha_actual->format('Y-m-d H:i:s'); // Formato adecuado para DATETIME

    // Instrucción SQL para insertar el pago
    $ConsultaPagos = "INSERT INTO Pagos (id_contratacion, metodo_pago, fecha_transaccion, estado) 
                      VALUES ($id_contratacion, 'Tarjeta de credito', '$fecha_pago', 'Aceptado')";

    // Ejecutar consulta
    if ($conexion->query($ConsultaPagos)) {
        echo '<h1>Pago efectuado correctamente</h1>';
    } else {
        echo 'Error en el pago: ' . $conexion->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="container">
        <form action="" method="POST">
            <div class="row">
                <div class="col">
                    <h3 class="title">Pagos MarketCode</h3>

                    <div class="inputBox">
                        <span>Tarjetas Aceptadas :</span>
                        <img src="img/card_img.png" alt="">
                    </div>
                    <div class="inputBox">
                        <span>Nombre en la tarjeta :</span>
                        <input type="text" name="nombre_tarjeta" placeholder="Mr. John Doe">
                    </div>
                    <div class="inputBox">
                        <span>Número de tarjeta :</span>
                        <input type="text" name="numero_tarjeta" placeholder="1111-2222-3333-4444">
                    </div>
                    <div class="inputBox">
                        <span>EXP MES :</span>
                        <input type="text" name="exp_mes" placeholder="January">
                    </div>
                    <div class="flex">
                        <div class="inputBox">
                            <span>EXP AÑO :</span>
                            <input type="number" name="exp_anio" placeholder="2022">
                        </div>
                        <div class="inputBox">
                            <span>CVV :</span>
                            <input type="text" name="cvv" placeholder="1234">
                        </div>
                    </div>
                </div>
            </div>

            <input type="submit" value="Proceder al pago" class="submit-btn">
        </form>
    </div>
</body>
</html>
