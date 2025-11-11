<?php
//PÁGINA PARA PROCESAR LOS DATOS DE REGISTRO DEL USUARIO

$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
echo "Variable usuario",$usuario;
echo "Variable contraseña",$contraseña;

// Guardamos los datos en un archivo de texto (a modo de BBDD) con contraseña encriptada (hash)
$archivo = fopen("usuarios.txt", "a");
fwrite($archivo, $usuario.":".password_hash($contraseña, PASSWORD_DEFAULT). "\n");
fclose($archivo);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de resgistro</title>
</head>
<body>
    <h1>Se ha creado el usuario correctamente</h1>
    <br>
    <p><a href="iniciar_sesion.php">Inicie sesión aquí</a></p>
</body>
</html>
