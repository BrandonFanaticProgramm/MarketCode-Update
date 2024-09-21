<?php

error_reporting(E_ALL);
include('../Conexion/conexion.php'); // Asegúrate de que este archivo defina la conexión $conn
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (
        isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK &&
        isset($_POST['role']) && isset($_POST['country']) &&
        isset($_POST['Link_github']) && isset($_POST['sobre-mi']) && isset($_POST['experiencia'])
    ) {

        // Variables para los datos del formulario
        $rol = htmlspecialchars($_POST['role']);
        $pais = htmlspecialchars($_POST['country']);
        $githubLink = htmlspecialchars($_POST['Link_github']);
        $sobreMi = htmlspecialchars($_POST['sobre-mi']);
        $experiencia = htmlspecialchars($_POST['experiencia']);
        $disponibilidad = true; // Mientras tanto

        // Manejo del archivo
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $fileSize = $_FILES['file']['size'];
        $fileType = $_FILES['file']['type'];
        $fileError = $_FILES['file']['error'];

        // Definir el directorio y ruta de destino
        $uploadDir = '../uploads/';
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $newFileName = uniqid() . '.' . $fileExtension; // Generar un nombre único
        $newFilePath = $uploadDir . $newFileName;

        // Configuración de restricciones de archivos
        $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];
        $maxFileSize = 5 * 1024 * 1024; // 5 MB en bytes

        // Verificar el error del archivo
        if ($fileError === UPLOAD_ERR_OK) {
            // Verificar la extensión y el tamaño del archivo
            if (in_array($fileExtension, $allowedExts) && $fileSize <= $maxFileSize) {
                // Mover el archivo a la ubicación permanente
                if (move_uploaded_file($fileTmpPath, $newFilePath)) {
                    //echo "Archivo subido con éxito.";

                    // Preparar e insertar datos en la base de datos
                    $id_usuario = $_GET['id_usuario']; // Asegúrate de definir este valor adecuadamente

                    $consulta = "INSERT INTO Programadores (id_usuario, foto_perfil, especialidad, disponibilidad,experiencia ,localidad, link_github, sobre_mi) 
                                 VALUES ('$id_usuario', '$newFileName', '$rol', '$disponibilidad','$experiencia','$pais', '$githubLink', '$sobreMi')";

                    if ($conexion->query($consulta)) {
                        //echo "Datos insertados con éxito.";
                        header('location: Formulario-Lenguajes/Lenguajes.php?id_usuario='. $id_usuario);
                    } else {
                        echo "Error al insertar datos en la base de datos: " . $conexion->error;
                    }
                } else {
                    echo "Error al mover el archivo.";
                }
            } else {
                echo "Archivo no permitido o demasiado grande.";
            }
        } else {
            echo "Error al subir el archivo. Código de error: " . $fileError;
        }
    } else {
        echo "Faltan campos en el formulario o error en la subida del archivo.";
    }
}

$conexion->close(); // Cierra la conexión a la base de datos
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Programador</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>

<body>
    <section class="principal">
        <header class="barra-superior">
            <h1 class="titulo">¡Estás a un paso más!</h1>
            <p class="parrafo">¡Bienvenido a MarketCode Estamos emocionados de tenerte en nuestra comunidad. Aquí, tendrás la oportunidad de mostrar tus habilidades, conectar con proyectos desafiantes y llevar tu carrera al siguiente nivel. No dudes en explorar las oportunidades que te esperan, ¡y prepárate para convertir tus conocimientos en éxitos! Comienza tu camino con MarketCode.</p>
        </header>

        <form class="formulario-cliente" action="" method="post" enctype="multipart/form-data">
            <div class="foto_perfil">
                <label for="profile-image">Foto de perfil:</label>
                <input id="profile-image" type="file" name="file" required class="file">
            </div>

            <div class="especialidad">
                <label for="role">Ingresa tu campo de especialidad:</label>
                <select id="role" name="role" required class="select-campo">
                    <option value="frontend">Frontend Developer</option>
                    <option value="backend">Backend Developer</option>
                    <option value="fullstack">Full Stack Developer</option>
                    <option value="devops">DevOps Engineer</option>
                    <option value="mobile">Mobile Developer</option>
                    <option value="dba">Database Administrator</option>
                    <option value="security">Security Engineer</option>
                    <option value="datascientist">Data Scientist</option>
                    <option value="qa">Quality Assurance (QA)</option>
                    <option value="uxui">UX/UI Designer</option>
                    <option value="cloud">Cloud Engineer</option>
                    <option value="mlai">Machine Learning/AI Engineer</option>
                    <option value="softwarearchitect">Software Architect</option>
                    <option value="productmanager">Product Manager</option>
                    <option value="sysadmin">System Administrator</option>
                    <option value="sre">Site Reliability Engineer (SRE)</option>
                    <option value="game">Game Developer</option>
                    <option value="embedded">Embedded Systems Developer</option>
                    <option value="network">Network Engineer</option>
                    <option value="bi">Business Intelligence (BI) Developer</option>
                    <option value="blockchain">Blockchain Developer</option>
                    <option value="iot">IoT Developer</option>
                </select>
            </div>

            <div class="localidad">
                <label for="country">Seleccione su país:</label>
                <select id="country" name="country" required class="select-campo"></select>
            </div>

            <div class="link-github">
                <label for="github-link">Ingresa tu link de GitHub:</label>
                <input id="github-link" type="url" name="Link_github" required>
            </div>

            <div class="experiencia">
                <label for="#">Ingresa tus años de experiencia</label>
                <input type="text" name="experiencia" required>
            </div>

            <div class="sobre-mi">
                <label for="about-me">Descríbete tal y como eres:</label>
                <input id="about-me" name="sobre-mi" required></input>
            </div>

            <input class="btn-enviar" type="submit" value="Avanzar">
        </form>
    </section>

    <script>
        // Cargar los países en el select
        fetch('https://restcountries.com/v3.1/all')
            .then(response => response.json())
            .then(data => {
                const select = document.getElementById('country');
                data.forEach(country => {
                    const option = document.createElement('option');
                    option.value = country.cca2;
                    option.textContent = country.name.common;
                    select.appendChild(option);
                });
            })
            .catch(error => console.error('Error al cargar países:', error));
    </script>

</body>

</html>