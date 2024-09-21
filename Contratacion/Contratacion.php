<?php
error_reporting(E_ALL);
include('../Conexion/conexion.php');
ini_set('display_errors', 1);

// Obtener y validar parámetros GET
$id_cliente = isset($_GET['id_cliente']) ? intval($_GET['id_cliente']) : 0;
$id_programador = isset($_GET['id_programador']) ? intval($_GET['id_programador']) : 0;
$id_servicio = isset($_GET['id_servicio']) ? intval($_GET['id_servicio']) : 0;
$boton_confirmacion = isset($_POST['confirmar-contratacion']) ? true : false;

// Crear un objeto DateTime con la fecha y hora actual
$fecha_actual = new DateTime();
$fecha_contratacion = $fecha_actual->format('Y-m-d'); // Formato adecuado para MySQL

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $boton_confirmacion) {
    // Instrucción SQL para insertar los datos en la base de datos
    $insertDatosContratacion = "INSERT INTO Contrataciones (id_cliente, id_servicio, id_programador, fecha_contratacion) 
                                VALUES ($id_cliente, $id_servicio, $id_programador, '$fecha_contratacion')";

    // Ejecutar la consulta
    if ($conexion->query($insertDatosContratacion)) {
        // Obtener el ID de la contratación recién insertada
        $id_contratacion = $conexion->insert_id;

        // Enviar las variables a JavaScript para redirigir
        echo "<script>
                const id_cliente = " . json_encode($id_cliente) . ";
                const id_contratacion = " . json_encode($id_contratacion) . ";
                console.log('id_cliente:', id_cliente);
                console.log('id_contratacion:', id_contratacion);

                // Redirigir después de 2 segundos
                setTimeout(() => {
                    window.location.href = '../Pagos/Pagos.php?id_cliente=' + id_cliente + '&id_contratacion=' + id_contratacion;
                }, 2000);
              </script>";
    } else {
        echo "Error al insertar el registro: " . $conexion->error;
    }
}
?>









<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Contratación</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        .container {
            width: 80%;
            max-width: 800px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
        }

        h2 {
            color: #6A0DAD;
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.2em;
            margin: 20px 0;
            line-height: 1.5;
        }

        .highlight {
            color: #6A0DAD;
            font-weight: bold;
        }

        .instructions {
            margin-top: 20px;
            padding: 15px;
            background-color: #f5e6ff;
            border-radius: 10px;
            border: 1px solid #e1d5ff;
        }

        .instructions h3 {
            color: #6A0DAD;
            font-size: 1.5em;
        }

        .instructions ul {
            list-style: none;
            padding: 0;
        }

        .instructions ul li {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        button {
            padding: 12px;
            font-size: 18px;
            color: #fff;
            background-color: #6A0DAD;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 30px;
            transition: background-color 0.3s;
            display: inline-block;
        }

        button:hover {
            background-color: #5a0b8e;
        }

        .loading-animation {
            display: block;
            margin: 20px auto;
            border: 4px solid rgba(0, 0, 0, 0.1);
            border-radius: 50%;
            border-left-color: #6A0DAD;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Sección de bienvenida -->
        <h2>¡Estás a punto de completar tu contratación!</h2>
        <p>Estamos emocionados de que hayas decidido elegirnos. Antes de finalizar el proceso, te presentamos un resumen de los detalles que has seleccionado:</p>

        <!-- Instrucciones y resumen -->
        <div class="instructions">
            <h3>¿Qué hacer a continuación?</h3>
            <ul>
                <li><strong>Revisa los detalles:</strong> Asegúrate de que toda la información proporcionada sea correcta.</li>
                <li><strong>Confirma tu contratación:</strong> Haz clic en el botón de abajo para proceder al pago y completar la contratación.</li>
                <li><strong>¡Listo!</strong> Una vez confirmado, tu pago le llegará una notificación al programador.</li>
            </ul>
        </div>

        <!-- Botón de confirmación -->
        <form action="" method="POST">
            <button id="confirm-button" name="confirmar-contratacion">Confirmar y proceder al pago</button>
        </form>

        <!-- Animación de carga -->
        <div id="loading" class="loading-animation" style="display: none;"></div>
    </div>

    <script src="./script.js"></script>
</body>
</html>
