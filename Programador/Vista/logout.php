<?php
// Destruir todas las variables de sesión
session_unset();

// Destruir la sesión completamente
session_destroy();

// Redirigir a la página principal u otra página (como login o main)
header("Location: ../../main.php");
exit(); // Asegúrate de que el script se detenga después de la redirección
?>
