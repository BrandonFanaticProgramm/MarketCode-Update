<?php
error_reporting(E_ALL);
include('../../Conexion/conexion.php');
ini_set('display_errors', 1);

$id_programador = intval($_GET['id_programador']);  // Asegúrate de convertirlo a entero para mayor seguridad
$id_cliente = intval($_GET['id_cliente']);

echo $id_cliente;
// Consulta para obtener información del programador
$consulta = "SELECT Programadores.id_programador, Usuarios.Nombre, Usuarios.Apellido
             FROM Programadores 
             INNER JOIN Usuarios 
             ON Usuarios.id_usuario = Programadores.id_usuario 
             WHERE Programadores.id_programador = $id_programador";

$resultado = $conexion->query($consulta);

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $Nombre = $fila['Nombre'];
        $Apellido = $fila['Apellido'];
    }
} else {
    echo 'No encontrado';
    exit;
}

// Consulta para obtener los planes del programador
$consultaPlanes = "SELECT id_servicio,id_programador,tipo_paquete, precio, descripcion_servicio, numero_entrega, numero_revisiones, Detalle_1, Detalle_2, Detalle_3, Detalle_4, Detalle_5, Titulo_Servicio
                   FROM Servicios 
                   WHERE id_programador = $id_programador";  // Consulta corregida

$planBasico = [];
$planEstandar = [];
$planPremium = [];

$resultadoPlanes = $conexion->query($consultaPlanes);

if ($resultadoPlanes->num_rows > 0) {

    
    while ($plan = $resultadoPlanes->fetch_assoc()) {

        $detalle_plan = [
            'id_servicio' => $plan['id_servicio'],
            'tipo_paquete' => $plan['tipo_paquete'],
            'precio' => $plan['precio'],
            'descripcion_servicio' => $plan['descripcion_servicio'],
            'numero_entrega' => $plan['numero_entrega'],
            'numero_revisiones' => $plan['numero_revisiones'],
            'detalle_1' => $plan['Detalle_1'],
            'detalle_2' => $plan['Detalle_2'],
            'detalle_3' => $plan['Detalle_3'],
            'detalle_4' => $plan['Detalle_4'],
            'detalle_5' => $plan['Detalle_5'],
            'titulo_servicio' => $plan['Titulo_Servicio']
        ];

        if ($plan['tipo_paquete'] === 'Básico') {
            $planBasico[] = $detalle_plan;
            
        }

        if ($plan['tipo_paquete'] === 'Estándar') {
            $planEstandar[] = $detalle_plan;
        }

        if ($plan['tipo_paquete'] === 'Premium') {  // Corregido de 'Basico' a 'Premium'
            $planPremium[] = $detalle_plan;
        }

    }
} else {
    echo 'No hay planes disponibles para este programador.';
}


$precio = "";
$descripcion_servicio = "";
$numero_entrega = "";
$numero_revisiones = "";
$detalle_1 = "";
$detalle_2 = "";
$detalle_3 = "";
$detalle_4 = "";
$detalle_5 = "";
$titulo_servicio = "";

// Inicializar variables de id_servicio para cada plan
$id_servicio_basico = null;
$id_servicio_estandar = null;
$id_servicio_premium = null;

// Verificar si hay al menos un plan en la categoría "Básico"
if (!empty($planBasico)) {
    $id_servicio_basico = $planBasico[0]['id_servicio'];
}

// Verificar si hay al menos un plan en la categoría "Estándar"
if (!empty($planEstandar)) {
    $id_servicio_estandar = $planEstandar[0]['id_servicio'];
}

// Verificar si hay al menos un plan en la categoría "Premium"
if (!empty($planPremium)) {
    $id_servicio_premium = $planPremium[0]['id_servicio'];
}


function añadirPlanes($plan, &$precio, &$descripcion_servicio, &$numero_entrega, &$numero_revisiones, &$detalle_1, &$detalle_2, &$detalle_3, &$detalle_4, &$detalle_5,&$titulo_servicio)
{
    foreach ($plan as $valoresPlan) {
        $precio = $valoresPlan['precio'];
        $descripcion_servicio = $valoresPlan['descripcion_servicio'];
        $numero_entrega = $valoresPlan['numero_entrega'];
        $numero_revisiones = $valoresPlan['numero_revisiones'];
        $detalle_1 = $valoresPlan['detalle_1'];
        $detalle_2 = $valoresPlan['detalle_2'];
        $detalle_3 = $valoresPlan['detalle_3'];
        $detalle_4 = $valoresPlan['detalle_4'];
        $detalle_5 = $valoresPlan['detalle_5'];
        $titulo_servicio = $valoresPlan['titulo_servicio'];
    }
}

?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>

    <section class="pagos-principal">

        <header class="barra-superior">
            <a href="../landing-page/main.html"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z" />
                    <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z" />
                </svg>
            </a>

            <div class="titulo">
                <h1>Plan de <?php echo $Nombre . ' ' . $Apellido; ?></h1>
            </div>
        </header>

        <div class="planes">

            <div class="cartas">
                <div class="tipo-plan">
                    <label>Básico</label>
                </div>

                <div class="contenido">

                    <?php

                    añadirPlanes($planBasico, $precio, $descripcion_servicio, $numero_entrega, $numero_revisiones, $detalle_1, $detalle_2, $detalle_3, $detalle_4, $detalle_5,$titulo_servicio);

                    ?>

                    <div class="descripcion-plan">

                        <header class="titulo-plan">
                            <h3>
                                <b><?php echo $titulo_servicio?> </b>
                                <div class="precio">
                                    <p>$<?php echo $precio ?></p>
                                </div>
                            </h3>
                            <p class="texto"><?php echo $descripcion_servicio ?></p>
                        </header>

                        <article class="detalles">

                            <div class="dias-revisiones">

                                <div class="dias">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0" />
                                    </svg>

                                    <p><?php echo $numero_entrega ?> -day delivery</p>
                                </div>


                                <div class="revisiones">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                        <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41m-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9" />
                                        <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5 5 0 0 0 8 3M3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9z" />
                                    </svg>

                                    <p>Revisions: <?php echo $numero_revisiones ?></p>
                                </div>
                            </div>

                            <ul class="caracteristicas">
                                <li><?php echo $detalle_1 ?></li>
                                <li><?php echo $detalle_2 ?></li>
                                <li><?php echo $detalle_3 ?></li>
                                <li><?php echo $detalle_4 ?></li>
                                <li><?php echo $detalle_5 ?></li>
                            </ul>
                        </article>
                    </div>

                    <footer class="btn-comprar">
                        <div class="boton">
                        <a href="../../Contratacion/Contratacion.php?id_cliente=<?php echo $id_cliente; ?>&id_programador=<?php echo $id_programador; ?>&id_servicio=<?php echo $id_servicio_basico; ?>" class="btn-comprar">Comprar</a>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                            </svg>
                        </div>
                    </footer>
                </div>
            </div>



            <!-- SEGUNDO PLAN -->


            <div class="cartas">
                <div class="tipo-plan">
                    <label>Estándar</label>
                </div>

                <div class="contenido">

                    <?php
                    añadirPlanes($planEstandar, $precio, $descripcion_servicio, $numero_entrega, $numero_revisiones, $detalle_1, $detalle_2, $detalle_3, $detalle_4, $detalle_5,$titulo_servicio);
                    ?>

                    <div class="descripcion-plan">

                        <header class="titulo-plan">
                            <h3>
                                <b><?php echo $titulo_servicio?> </b>
                                <div class="precio">
                                    <p>$<?php echo $precio ?></p>
                                </div>
                            </h3>
                            <p class="texto"><?php echo $descripcion_servicio ?></p>
                        </header>

                        <article class="detalles">

                            <div class="dias-revisiones">

                                <div class="dias">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0" />
                                    </svg>

                                    <p><?php echo $numero_entrega ?> -day delivery</p>
                                </div>


                                <div class="revisiones">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                        <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41m-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9" />
                                        <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5 5 0 0 0 8 3M3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9z" />
                                    </svg>

                                    <p>Revisions: <?php echo $numero_revisiones ?></p>
                                </div>
                            </div>

                            <ul class="caracteristicas">
                                <li><?php echo $detalle_1 ?></li>
                                <li><?php echo $detalle_2 ?></li>
                                <li><?php echo $detalle_3 ?></li>
                                <li><?php echo $detalle_4 ?></li>
                                <li><?php echo $detalle_5 ?></li>
                            </ul>
                        </article>
                    </div>

                    <footer class="btn-comprar">
                        <div class="boton">
                        <a href="../../Contratacion/Contratacion.php?id_cliente=<?php echo $id_cliente; ?>&id_programador=<?php echo $id_programador; ?>&id_servicio=<?php echo $id_servicio_estandar; ?>" class="btn-comprar">Comprar</a>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                            </svg>
                        </div>
                    </footer>
                </div>
            </div>



            <!-- TERCER PLAN -->



            <div class="cartas">
                <div class="tipo-plan">
                    <label>Premium</label>
                </div>

                <div class="contenido">

                    <?php

                    añadirPlanes($planPremium, $precio, $descripcion_servicio, $numero_entrega, $numero_revisiones, $detalle_1, $detalle_2, $detalle_3, $detalle_4, $detalle_5,$titulo_servicio);

                    ?>

                    <div class="descripcion-plan">

                        <header class="titulo-plan">
                            <h3>
                                <b><?php echo $titulo_servicio?> </b>
                                <div class="precio">
                                    <p>$<?php echo $precio ?></p>
                                </div>
                            </h3>
                            <p class="texto"><?php echo $descripcion_servicio ?></p>
                        </header>

                        <article class="detalles">

                            <div class="dias-revisiones">

                                <div class="dias">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0" />
                                    </svg>

                                    <p><?php echo $numero_entrega ?> day delivery</p>
                                </div>


                                <div class="revisiones">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                        <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41m-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9" />
                                        <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5 5 0 0 0 8 3M3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9z" />
                                    </svg>

                                    <p>Revisions: <?php echo $numero_revisiones ?></p>
                                </div>
                            </div>

                            <ul class="caracteristicas">
                                <li><?php echo $detalle_1 ?></li>
                                <li><?php echo $detalle_2 ?></li>
                                <li><?php echo $detalle_3 ?></li>
                                <li><?php echo $detalle_4 ?></li>
                                <li><?php echo $detalle_5 ?></li>
                            </ul>
                        </article>
                    </div>

                    <footer class="btn-comprar">
                        <div class="boton">
                        <a href="../../Contratacion/Contratacion.php?id_cliente=<?php  echo $id_cliente; ?>&id_programador=<?php echo $id_programador; ?>&id_servicio=<?php echo $id_servicio_premium; ?>" class="btn-comprar">Comprar</a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                        </svg>
                    </div>
                    </footer>
                </div>
            </div>
        </div>
    </section>
</body>

</html>