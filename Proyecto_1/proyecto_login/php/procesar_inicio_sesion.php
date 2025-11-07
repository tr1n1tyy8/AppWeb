<?php

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
header("Location: pagina_bienvenida.php");
exit;
} 
else {
echo "<h1>Usuario o contraseña incorrectos</h1>";
echo "<p><a href='iniciar_sesion.php'>Volver a intentar</a></p>";
}

?>