<?php
// CONEXION PRINCIPAL
error_reporting(E_ALL);
ini_set('display_errors', 1);
$conexion = new mysqli('localhost:3306', 'root', 123456, 'MarketCode');
if ($conexion->connect_errno) {
    echo '<h1>Error en la conexion con la base de datos</h1>';
    die('Error ' . $conexion->connect_errno);
}
?>