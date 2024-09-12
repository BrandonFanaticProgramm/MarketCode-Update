<?php
header('Content-Type: application/json');
error_reporting(E_ALL);
include('../../Conexion/conexion.php');
ini_set('display_errors', 1);

// Obtener el ID del usuario desde la URL
$id_usuario = isset($_GET['id_usuario']) ? intval($_GET['id_usuario']) : 0;

$response = [];

if ($id_usuario > 0) {
    // Consulta SQL para obtener los detalles del perfil del programador específico
    $consulta = "SELECT Nombre, Apellido, foto_perfil, localidad, sobre_mi 
                 FROM Usuarios 
                 INNER JOIN Programadores 
                 ON Usuarios.id_usuario = Programadores.id_usuario 
                 WHERE Usuarios.id_usuario = $id_usuario";
                 
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
            'message' => 'Error en la consulta SQL'
        ];
    }
} else {
    // ID no válido
    $response = [
        'success' => false,
        'message' => 'Usuario no encontrado'
    ];
}

// Enviar la respuesta en formato JSON
echo json_encode($response);
?>
