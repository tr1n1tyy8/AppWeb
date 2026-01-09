<?php
// PÁGINA PARA CREAR UN NUEVO USUARIO Y AÑADIRLO A LA BBDD

include "session_check.php";
include "db.php";

// compruebo si el usuario es o no admin, para controlar sus accesos a las urls
if ($_SESSION['usuario_rol'] !== 'admin') {
    header("Location: index.php");
    exit();
}

// Obtener datos del usuario
if ($_POST) {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $edad = $_POST["edad"];
    $rol = $_POST["rol"];
    $contraseña = trim($_POST["contraseña"]);

    // Comprobamos que el usuario ya exista con el email
    $check_stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
    $check_stmt->execute([$email]);

    if ($check_stmt->fetch()) {    //si el mail ya existe, si ya hay resultado
        header("Location: login.php");
        echo "El usuario asociado al E-mail proporcionado ya existe";
        exit;
    }

    // Si el usuario no existe, lo agregamos
    $hash = password_hash($contraseña, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, email, contraseña, edad, rol) VALUES (?,?,?,?,?)");

    // Ejecutamos todo de golpe en un array
    if ($stmt->execute([$nombre, $email, $hash, $edad, $rol])) {
            header("Location: list.php");
            echo "Registro exitoso";
            exit;

    } 
    // Si hay un error en la conexión y transferencia de datos
    else {
           header("Location: create.php");
           echo "Registro fallido";
           exit;
        }
}
// Si hay un error en el envío de datos del formulario
else {
    header("Location: create.php");
    exit;
}

//Con pdo no hace falta cerrar la sesión como con mysqli

?>