<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

//PÁGINA PARA PROCESAR LOS DATOS DE REGISTRO DEL USUARIO
include "conexion.php";

// Obtener los datos del formulario
$usuario = $_POST['usuario'];
$contraseña = $_POST['password'];

// Encriptamos la contraseña
$hash = password_hash($contraseña, PASSWORD_DEFAULT);

// Comprobamos que el usuario no existe antes de hacer la consulta
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ?");
$stmt->bind_param("s", $usuario);
$stmt->execute();
$comprobar = $stmt->get_result();

// Si el usuario ya existe, mostramos un mensaje
if ($comprobar->num_rows > 0) {
    echo "<h1>El usuario ya está registrado</h1>";
} else {
    // Si el usuario no existe, lo insertamos
    $stmt = $conn->prepare("INSERT INTO usuarios (usuario, password) VALUES(?, ?)");
    $stmt->bind_param("ss", $usuario, $hash);

    if ($stmt->execute()) {
        echo "<h1>Usuario registrado correctamente</h1>";
        echo "<p><a href='login.php'>Iniciar sesión</a></p>";
    } else {
        echo "<h1>Error al registrar al usuario</h1>";
    }
}

// Cerramos las consultas y la conexión
$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario registrado correctamente</title>
    <link rel="stylesheet" href="../css/estilos_formulario.css">
    <link rel="icon" href="">
</head>
<body>
    <div class="flexbox">
        <h1>Se ha creado el usuario correctamente</h1>
        <p><a href="iniciar_sesion.php">Inicie sesión aquí</a></p>
    </div>
</body>
</html>