<?php
session_start();
error_reporting(E_ALL);
include('../../Conexion/conexion.php');
ini_set('display_errors', 1);

$consulta = "SELECT p.especialidad,p.id_programador, u.Nombre, u.Apellido, p.foto_perfil, p.localidad, p.sobre_mi, u.id_usuario, GROUP_CONCAT(l.nombre SEPARATOR ', ') as lenguajes
FROM Usuarios u
INNER JOIN Programadores p ON u.id_usuario = p.id_usuario
LEFT JOIN Programador_Lenguaje pl ON p.id_programador = pl.id_programador
LEFT JOIN Lenguajes_Programadores l ON pl.id_lenguaje = l.id_lenguaje
GROUP BY p.id_programador";

$resultado = $conexion->query($consulta);
$datos = [];

if ($resultado->num_rows > 0) {
    // Recorrer los resultados
    while ($fila = $resultado->fetch_assoc()) {
        $datos[] = $fila;
    }
} else {
    echo "Sin programadores.";
    exit; // Detener la ejecución si no hay datos
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MarketCode</title>
    <link rel="stylesheet" href="ClienteVista.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="shortcut icon" href="../../landing-page/images/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body>
    <section class="contenedor">
        <div class="header-title">
            <div class="btn-volver">
                <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z" />
                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z" />
                    </svg>
                </a>
            </div>
            <h1 class="h1">Contrata a tu programador</h1>
            <p class="lead">
                <span><?php echo count($datos); ?></span> Programadores
            </p>
        </div>
        <div class="filter-search">
            <div class="habilidades">
                <select name="#" id="#" class="select-habilidades">
                    <option value="#">Python</option>
                    <option value="#">SQL</option>
                    <option value="#">Javascript</option>
                </select>
            </div>

            <div class="experiencia">
                <select name="#" id="" class="select-experiencia">
                    <option value="#">Menos de 6 meses</option>
                    <option value="#">Sin experiencia</option>
                    <option value="#">Mas de 1 año</option>
                </select>
            </div>

            <div class="localidad">
                <select name="#" id="" class="select-localidad">
                    <option value="#">Colombia</option>
                    <option value="#">Peru</option>
                    <option value="#">Argentina</option>
                </select>
            </div>
        </div>

        <div class="main-programadores">
            <?php
            if (!empty($datos)) {
                foreach ($datos as $programador) {
                    echo '
                            <article class="carta">
                <div class="foto" style="background-image: url(\'../../uploads/' . htmlspecialchars($programador['foto_perfil']) . '\');" alt="Foto de perfil"></div>
                <div class="info">
                    <h5 class="nombre">' . htmlspecialchars($programador['Nombre']) . ' ' . htmlspecialchars($programador['Apellido']) . '</h5>
                    <div class="calificacion">
                        <p class="estrellas">5.0</p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                        </svg>
                    </div>
                    <button id="boton-perfil" class="ver-perfil" data-id="' . $programador['id_programador'] . '">Ver Perfil</button>
                </div>
            </article>';
                }
            }
            ?>
        </div>

        <div id="carta-perfil" class="perfil-detallado">
            <div class="info-personal">
                <button id="cerrar-perfil" class="boton-cerrar"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                    </svg>
                </button>
                <div class="foto"></div>

                <div class="datos">
                    <p class="nombre"></p>
                    <p class="nacionalidad"></p>
                    <p class="especialidad"></p>
                </div>
            </div>
            <hr>

            <div class="descripcion-tecnologias">
                <div class="descripcion"></div>
                <div class="tecnologias">
                    <hr>
                    <h3>Tecnologías</h3>
                    <ul class="tecnologias-programador">

                    </ul>
                </div>
            </div>

            <div class="id_programador">

            </div>

            <div class="enlaces">
                <h3>Contáctame</h3>
                <div class="contratar">
                    <ul>
                        <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                                    <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8" />
                                </svg></a>
                        </li>

                        <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z" />
                                </svg></a>
                        </li>
                    </ul>
                    <a class="btn-contrato"">Contratar</a>
                </div>
            </div>
        </div>
    </section>

    <script src="../js/boton.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
