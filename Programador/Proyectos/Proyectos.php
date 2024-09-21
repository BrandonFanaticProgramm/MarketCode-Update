<?php
error_reporting(E_ALL);
include('../../Conexion/conexion.php'); // Asegúrate de que este archivo defina la conexión $conn
ini_set('display_errors', 1);

$id_programador = $_GET['id_programador'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['Accion'])) {
        $Accion = $_POST['Accion'];

        if ($Accion === "Agregar Proyecto") {
            // Verificamos si todos los campos están presentes
            if (
                isset($_FILES['imagen_proyecto']) && $_FILES['imagen_proyecto']['error'] === UPLOAD_ERR_OK &&
                isset($_POST['titulo_proyecto']) &&
                isset($_POST['descripcion_proyecto']) &&
                isset($_POST['link_proyecto'])
            ) {
                // Variables del formulario
                $titulo_proyecto = htmlspecialchars($_POST['titulo_proyecto']);
                $descripcion_proyecto = htmlspecialchars($_POST['descripcion_proyecto']);
                $link_proyecto = htmlspecialchars($_POST['link_proyecto']);

                // Manejo del archivo (imagen del proyecto)
                $fileTmpPath = $_FILES['imagen_proyecto']['tmp_name'];
                $fileName = $_FILES['imagen_proyecto']['name'];
                $fileSize = $_FILES['imagen_proyecto']['size'];
                $fileType = $_FILES['imagen_proyecto']['type'];
                $fileError = $_FILES['imagen_proyecto']['error'];

                // Definir el directorio y ruta de destino
                $uploadDir = '../../uploads_proyectos/';
                $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                $newFileName = uniqid() . '.' . $fileExtension; // Generar un nombre único
                $newFilePath = $uploadDir . $newFileName;

                // Configuración de restricciones de archivos
                $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];
                $maxFileSize = 5 * 1024 * 1024; // 5 MB en bytes

                // Verificar si hay errores en la subida del archivo
                if ($fileError === UPLOAD_ERR_OK) {
                    // Verificar la extensión del archivo y el tamaño permitido
                    if (in_array($fileExtension, $allowedExts) && $fileSize <= $maxFileSize) {
                        // Mover el archivo a la ubicación permanente
                        if (move_uploaded_file($fileTmpPath, $newFilePath)) {
                            // Insertar en la base de datos
                            $consulta = "INSERT INTO Proyectos (id_programador, img_proyecto, nombre_proyecto, descripcion_proyecto, link_proyecto) 
                                         VALUES ('$id_programador', '$newFileName', '$titulo_proyecto', '$descripcion_proyecto', '$link_proyecto')";

                            if ($conexion->query($consulta)) {
                                echo "Proyecto y archivo subidos con éxito.";
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
        } elseif ($Accion === "Avanzar") {
            // Redirigir a la siguiente parte de la página
            header("Location: ../Formulario-Servicio/Servicio.php?id_programador=" . $id_programador);
            exit();
        }
    } else {
        echo "No se ha enviado la acción.";
    }
}

$conexion->close(); // Cierra la conexión a la base de datos
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Proyecto</title>
</head>

<body>
    <h1>Agrega tu proyecto</h1>

    <form action="" method="POST" enctype="multipart/form-data"> <!-- Asegúrate de tener enctype correcto -->
        <label for="#">Ingresa una vista previa de tu proyecto</label> <br>
        <input type="file" name="imagen_proyecto"> <br>

        <label for="#">Ingresa el título de tu proyecto</label> <br>
        <input type="text" name="titulo_proyecto"> <br>

        <label for="#">Ingresa una descripción del proyecto</label> <br>
        <input type="text" name="descripcion_proyecto"> <br>

        <label for="#">Ingresa el link de tu proyecto y/o repositorio</label> <br>
        <input type="url" name="link_proyecto"> <br>

        <input type="submit" name="Accion" value="Agregar Proyecto">
        <input type="submit" name="Accion" value="Avanzar">
        
    </form>
</body>

</html>
