<?php
//PÁGINA PARA PROCESAR LOS DATOS DE INICIO DE SESIÓN DEL USUARIO

session_start();
$usuario = $_POST['usuario'];
$contraseña= $_POST['contraseña'];

// Leer el archivo que contiene los usuarios registrados y sus contraseñas cifradas
$usuarios = file("usuarios.txt", FILE_IGNORE_NEW_LINES);
$login_exitoso = false;
foreach ($usuarios as $linea) {
    list($user, $hash) = explode(":", $linea);
    if ($user === $usuario && password_verify($contraseña, $hash)) {
    $login_exitoso = true;
    $_SESSION['usuario'] = $usuario;
    break;
    }
}

// Comprobar si el usuario ha iniciado sesión correctamente y decidir qué hacer según que caso
if ($login_exitoso) {
header("Location: index.php");
exit;
} 
else {
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos_formulario.css">
    <title>Error</title>
</head>
<body>
    <div class="flexbox">
        <h1>Usuario o contraseña incorrectos</h1>
        <p><a href='iniciar_sesion.php'>Volver a intentar</a></p>
    </div>
</body>
</html>