<?php

error_reporting(E_ALL);
include('../../Conexion/conexion.php'); // CONEXION DE LA BASE DE DATOS
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    $id_programador = $_GET['id_programador']; //ID DEL PROGRAMADOR

    $planes = ['Basico', 'Estandar', 'Premium']; // PLANES DEL PROGRAMADOR

    foreach ($planes as $plan) {
        //CICLO FOREACH PARA ITERAR CADA PLAN Y CONCATENARLO
        $precio = $_POST["precio_" . strtolower($plan)];
        $descripcion = $_POST["descripcion_" . strtolower($plan)];
        $numero_entrega = $_POST["numero_entrega_" . strtolower($plan)];
        $numero_revisiones = $_POST["numero_revisiones_" . strtolower($plan)];
        $detalle_1 = $_POST["detalle_1_" . strtolower($plan)];
        $detalle_2 = $_POST["detalle_2_" . strtolower($plan)];
        $detalle_3 = $_POST["detalle_3_" . strtolower($plan)];
        $detalle_4 = $_POST["detalle_4_" . strtolower($plan)] ?? '';
        $detalle_5 = $_POST["detalle_5_" . strtolower($plan)] ?? '';
        $titulo_servicio = $_POST['titulo_servicio_' . strtolower($plan)];


        if (empty($precio) || empty($descripcion) || empty($numero_entrega) || empty($numero_revisiones) || empty($detalle_1) || empty($detalle_2) || empty($detalle_3) || empty($titulo_servicio)) {
            //COMPROBAR SI ALGUNO DE LOS DETALLES Y/O PLANES ESTAN VACIOS
            echo 'Todos los campos de ' . $plan . ' deben ser rellenados';
            exit;
        }

        $detalles = array($detalle_1, $detalle_2, $detalle_3, $detalle_4, $detalle_5);

        if (count(array_filter($detalles)) < 3) {
            //Esta función toma el array $detalles y elimina (filtra) los valores vacíos o falsos

            echo 'El plan ' . $plan . ' debe tener al menos 3 detalles.';
            exit;
        } else {

            $insertarServicios = "INSERT INTO Servicios (id_programador, tipo_paquete, precio, descripcion_servicio, numero_entrega, numero_revisiones, Detalle_1, Detalle_2, Detalle_3, Detalle_4, Detalle_5,Titulo_Servicio)
            VALUES (
                '$id_programador',
                '{$plan}',
                '{$precio}',
                '{$descripcion}',
                '{$numero_entrega}',
                '{$numero_revisiones}',
                '{$detalles[0]}',
                '{$detalles[1]}',
                '{$detalles[2]}',
                '{$detalles[3]}',
                '{$detalles[4]}',
                '{$titulo_servicio}'
            )
        ";

            if ($conexion->query($insertarServicios)) {

                header('location: ../Vista/VistaProgramador.php?id_programador=' . $id_programador);

            } else {

                echo 'Error en la insercion de datos';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Servicios</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="titulo">
        <h2>Registro de Servicios</h2>
    </div>
    <div class="form-container">
        <form action="" method="POST">
            <!-- Plan Básico -->
            <h3>Plan Básico</h3>
            <label for="titulo_servicio_basico">Título Servicio</label>
            <input type="text" name="titulo_servicio_basico" required> <br>
            <label for="precio_basico">Precio:</label>
            <input type="number" name="precio_basico" required><br>
            <label for="descripcion_basico">Descripción:</label>
            <input type="text" name="descripcion_basico" required><br>
            <label for="numero_entrega_basico">Días de Entrega:</label>
            <input type="number" name="numero_entrega_basico" required><br>
            <label for="numero_revisiones_basico">Revisiones:</label>
            <input type="number" name="numero_revisiones_basico" required><br>
            <label for="detalle_1_basico">Detalle 1:</label>
            <input type="text" name="detalle_1_basico" required><br>
            <label for="detalle_2_basico">Detalle 2:</label>
            <input type="text" name="detalle_2_basico" required><br>
            <label for="detalle_3_basico">Detalle 3:</label>
            <input type="text" name="detalle_3_basico" required><br>
            <label for="detalle_4_basico">Detalle 4 (Opcional):</label>
            <input type="text" name="detalle_4_basico"><br>
            <label for="detalle_5_basico">Detalle 5 (Opcional):</label>
            <input type="text" name="detalle_5_basico"><br>

            <!-- Plan Estándar -->
            <h3>Plan Estándar</h3>
            <label for="titulo_servicio_estandar">Título Servicio</label>
            <input type="text" name="titulo_servicio_estandar" required><br>
            <label for="precio_estandar">Precio:</label>
            <input type="number" name="precio_estandar" required><br>
            <label for="descripcion_estandar">Descripción:</label>
            <input type="text" name="descripcion_estandar" required><br>
            <label for="numero_entrega_estandar">Días de Entrega:</label>
            <input type="number" name="numero_entrega_estandar" required><br>
            <label for="numero_revisiones_estandar">Revisiones:</label>
            <input type="number" name="numero_revisiones_estandar" required><br>
            <label for="detalle_1_estandar">Detalle 1:</label>
            <input type="text" name="detalle_1_estandar" required><br>
            <label for="detalle_2_estandar">Detalle 2:</label>
            <input type="text" name="detalle_2_estandar" required><br>
            <label for="detalle_3_estandar">Detalle 3:</label>
            <input type="text" name="detalle_3_estandar" required><br>
            <label for="detalle_4_estandar">Detalle 4 (Opcional):</label>
            <input type="text" name="detalle_4_estandar"><br>
            <label for="detalle_5_estandar">Detalle 5 (Opcional):</label>
            <input type="text" name="detalle_5_estandar"><br>

            <!-- Plan Premium -->
            <h3>Plan Premium</h3>
            <label for="titulo_servicio_premium">Título Servicio</label>
            <input type="text" name="titulo_servicio_premium" required><br>
            <label for="precio_premium">Precio:</label>
            <input type="number" name="precio_premium" required><br>
            <label for="descripcion_premium">Descripción:</label>
            <input type="text" name="descripcion_premium" required><br>
            <label for="numero_entrega_premium">Días de Entrega:</label>
            <input type="number" name="numero_entrega_premium" required><br>
            <label for="numero_revisiones_premium">Revisiones:</label>
            <input type="number" name="numero_revisiones_premium" required><br>
            <label for="detalle_1_premium">Detalle 1:</label>
            <input type="text" name="detalle_1_premium" required><br>
            <label for="detalle_2_premium">Detalle 2:</label>
            <input type="text" name="detalle_2_premium" required><br>
            <label for="detalle_3_premium">Detalle 3:</label>
            <input type="text" name="detalle_3_premium" required><br>
            <label for="detalle_4_premium">Detalle 4 (Opcional):</label>
            <input type="text" name="detalle_4_premium"><br>
            <label for="detalle_5_premium">Detalle 5 (Opcional):</label>
            <input type="text" name="detalle_5_premium"><br>

            <input type="submit" value="Guardar" class="btn">
        </form>
    </div>
</body>
</html>
