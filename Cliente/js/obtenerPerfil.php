<?php
header('Content-Type: application/json');
error_reporting(E_ALL);
include('../../Conexion/conexion.php');
ini_set('display_errors', 1);

// Obtener el ID del programador desde la URL
$id_programador = isset($_GET['id_programador']) ? intval($_GET['id_programador']) : 0;

$response = [];

if ($id_programador > 0) {
    // Consulta SQL para obtener los detalles del perfil del programador específico
    $consulta = "SELECT 
        p.id_programador, 
        u.Nombre, 
        u.Apellido, 
        p.foto_perfil, 
        p.localidad, 
        p.sobre_mi, 
        p.especialidad, 
        GROUP_CONCAT(l.nombre SEPARATOR ', ') AS lenguajes
    FROM 
        Programadores p
    INNER JOIN 
        Usuarios u ON u.id_usuario = p.id_usuario
    LEFT JOIN 
        Programador_Lenguaje pl ON p.id_programador = pl.id_programador
    LEFT JOIN 
        Lenguajes_Programadores l ON pl.id_lenguaje = l.id_lenguaje
    WHERE 
        p.id_programador = $id_programador
    GROUP BY 
        p.id_programador";

    $resultado = $conexion->query($consulta);

    if ($resultado) {
        if ($resultado->num_rows > 0) {
            // Obtener los detalles del perfil
            $perfilUsuario = $resultado->fetch_assoc();
            $response = [
                'success' => true,
                'data' => $perfilUsuario
            ];
        } else {
            // No se encontró el perfil
            $response = [
                'success' => false,
                'message' => 'No se encontraron resultados'
            ];
        }
    } else {
        // Error en la consulta SQL
        $response = [
            'success' => false,
            'message' => 'Error en la consulta SQL: ' . $conexion->error
        ];
    }
} else {
    // ID no válido
    $response = [
        'success' => false,
        'message' => 'ID de programador no válido'
    ];
}

// Enviar la respuesta en formato JSON
echo json_encode($response);
