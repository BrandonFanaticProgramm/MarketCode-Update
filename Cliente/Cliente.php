
<?php
error_reporting(E_ALL);
include('../Conexion/conexion.php');
ini_set('display_errors', 1);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(isset($_POST['direccion']) && isset($_POST['telefono'])) {

        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $id_usuario = $_GET['id_usuario'];

        $insertarUsuarios = "INSERT INTO Clientes (id_usuario, Direccion, Telefono) 
                                     VALUES ('$id_usuario', '$direccion', '$telefono')";
        
        if($conexion -> query($insertarUsuarios)) {

            header('location: ./VistaCliente/Cliente.php');
            exit();
        }

        else {

            echo 'Error ' . $conexion -> error;
        }

        exit();


    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Cliente</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <section class="principal">
        <header class="barra-superior">
            <h1>Necesitamos que completes tu información</h1>
        </header>

        <form class="formulario-cliente" action="" method="post">
            <div class="direccion">
                <label for="">Direccion</label>
                <input id="campo-direccion" type="text" name="direccion" placeholder="Ingresa tu direccion" required>
            </div>

            <div class="telefono">
                <label for="">Telefono</label>
                <input type="text" name="telefono" placeholder=" Ingresa tu Telefono " required>
            </div>
            <input class="btn-enviar" type="submit" value="Enviar">
        </form>
    </section>
</body>
</html>