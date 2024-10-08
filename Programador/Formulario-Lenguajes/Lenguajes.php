<?php
error_reporting(E_ALL);
include('../../Conexion/conexion.php');
ini_set('display_errors', 1);

// Obtener el id_usuario desde la URL
$id_usuario = $_GET['id_usuario'];

// Consulta para obtener el id_programador correspondiente al id_usuario
$consultaProgramador = "SELECT Programadores.id_programador, Usuarios.id_usuario
                        FROM Usuarios 
                        INNER JOIN Programadores ON Usuarios.id_usuario = Programadores.id_usuario
                        WHERE Usuarios.id_usuario = $id_usuario";

$resultadoProgramador = $conexion->query($consultaProgramador);

if ($resultadoProgramador && $resultadoProgramador->num_rows > 0) {
    $filaProgramador = $resultadoProgramador->fetch_assoc();
    $id_programador = $filaProgramador['id_programador'];
} else {
    echo 'No se encontró el programador';
    exit();
}

// Consulta para obtener los lenguajes de la base de datos
$consulta = "SELECT * FROM Lenguajes_Programadores";
$resultado = $conexion->query($consulta);

// Si se envía el formulario, procesar los datos seleccionados
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificamos si se seleccionaron lenguajes
    if (isset($_POST['lenguajes']) && !empty($_POST['lenguajes'])) {
        $lenguajesSeleccionados = $_POST['lenguajes']; // Es un array con los lenguajes seleccionados
        
        // Procesar los lenguajes seleccionados, guardándolos en la base de datos
        foreach ($lenguajesSeleccionados as $lenguaje) {
            // Escapar el valor del lenguaje para evitar inyección SQL
            $lenguajeEscapado = mysqli_real_escape_string($conexion, $lenguaje);

            // Consulta para obtener el id_lenguaje del lenguaje seleccionado
            $consultaLenguaje = "SELECT id_lenguaje FROM Lenguajes_Programadores WHERE nombre = '$lenguajeEscapado'";
            $resultadoLenguaje = $conexion->query($consultaLenguaje);

            if ($resultadoLenguaje && $resultadoLenguaje->num_rows > 0) {
                $filaLenguaje = $resultadoLenguaje->fetch_assoc();
                $id_lenguaje = $filaLenguaje['id_lenguaje'];

                // Verificar si el id_programador y el id_lenguaje son válidos
                if (is_numeric($id_programador) && is_numeric($id_lenguaje)) {
                    // Insertar la relación programador-lenguaje en la tabla Programador_Lenguaje
                    $insertQuery = "INSERT INTO Programador_Lenguaje (id_programador, id_lenguaje) 
                                    VALUES ($id_programador, $id_lenguaje)";
                    
                    if ($conexion->query($insertQuery)) {
                        header('location: ../Proyectos/Proyectos.php?id_programador='. $id_programador);
                    } else {
                        echo "Error al insertar el lenguaje: " . htmlspecialchars($lenguaje) . ". Error: " . $conexion->error . "<br>";
                    }
                } else {
                    echo "ID de programador o lenguaje no válido para el lenguaje: " . htmlspecialchars($lenguaje) . "<br>";
                }
            } else {
                echo "El lenguaje: " . htmlspecialchars($lenguaje) . " no se encuentra en la base de datos.<br>";
            }
        }
    } else {
        echo "No seleccionaste ningún lenguaje.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" href="../../landing-page/images/logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;700&display=swap" rel="stylesheet">
    <title>Selecciona tus Habilidades</title>
</head>
<body>
    <div class="container">
        <h1>¡Queremos Saber Más De Ti!</h1>
        <p class="lead">Para que los clientes puedan saber más de tus capacidades, selecciona tus habilidades:</p>
    </div>

    <form action="" method="POST">
    <div class="checkbox-group">
        <?php 
            if ($resultado) {
                // Generar un checkbox por cada lenguaje en la base de datos
                while ($fila = $resultado->fetch_assoc()) {
                    if (isset($fila['nombre'])) {
                        echo '<label>';
                        echo '<input type="checkbox" name="lenguajes[]" value="' . htmlspecialchars($fila['nombre']) . '">';
                        echo htmlspecialchars($fila['nombre']);
                        echo '</label><br>';
                    }
                }
            } else {
                echo '<p>No se encontraron lenguajes en la base de datos.</p>';
            }
        ?>
        <br>
    </div>
    <button type="submit">Enviar Habilidades</button>
</form>
</body>
</html>
