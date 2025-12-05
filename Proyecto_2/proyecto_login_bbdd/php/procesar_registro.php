<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

//PÁGINA PARA PROCESAR LOS DATOS DE REGISTRO DEL USUARIO
include "conexion.php";

$exito = false;
$mensaje = "";

// Obtener los datos del formulario
$usuario = $_POST['usuario'];
$contraseña = $_POST['password'];

// Comprobamos que el usuario no existe antes de hacer la consulta
if ($usuario !== '' && $contraseña !== '') {
    $comprobar = $conn->prepare("SELECT id FROM usuarios WHERE usuario = ?");
    $comprobar->bind_param("s", $usuario);
    $comprobar->execute();
    $comprobar->store_result(); 
}

// Si el usuario ya existe, mostramos un mensaje
if ($comprobar->num_rows > 0) {
    $mensaje = "El usuario ya está registrado";
} else {
    // Si el usuario no existe, lo insertamos
    $hash = password_hash($contraseña, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO usuarios (usuario, password) VALUES(?, ?)");
    $stmt->bind_param("ss", $usuario, $hash);

    if ($stmt->execute()) {
        $mensaje = "Usuario registrado correctamente";
        $exito = true;
    } else {
        echo "<h1>Error al registrar al usuario</h1>";
    }
}

// Cerramos las conexión
$conn->close();
$comprobar->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario registrado correctamente</title>
    <link rel="stylesheet" href="../css/form_styles.css">
    <link rel="icon" href="">
</head>
<body>
    <div class="flexbox">
        <?php if ($exito): ?>
            <div class="titulo">
                <h1>Usuario creado</h1>
            </div>
            <p><a href="login.php">Inicie sesión aquí</a></p>
        <?php else: ?>
            <div class="titulo">
                <h1>El usuario ya está registrado</h1>
            </div>
            <p><a href="registro.php">Inténtelo de nuevo</a></p>
        <?php endif; ?>
    </div>
</body>
</html>