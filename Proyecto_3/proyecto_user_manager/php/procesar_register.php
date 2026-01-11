<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//PÁGINA PARA PROCESAR LOS DATOS DE REGISTRO DEL USUARIO

session_start();
include "db.php";

$mensaje = "";


if ($_POST) {
    $nombre = $_POST['nombre'];
    $contraseña= trim($_POST['contraseña']);

    // Comprobamos que el usuario no existe antes de hacer la consulta
    if ($nombre !== '' && $contraseña !== '') {
        $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE nombre = ?");
        $stmt->execute([$nombre]);
        $usuario = $stmt->fetch();  //fetch obtiene datos de las filas de la bbdd y comprueba que existan 
    }

    // Si el usuario ya existe, mostramos un mensaje
    if ($usuario) {
        $mensaje = "El usuario ya está registrado";
    } 
    // Si el usuario no existe, lo insertamos
    else {
        $hash = password_hash($contraseña, PASSWORD_DEFAULT);
        $email_por_defecto = $nombre . "@gmail.com";
        $edad_por_defecto = "0";    //pongo valores por defecto pq en la bbdd no deja campos vacios y en registro solo hace falta nombre y contraseña
        $rol_por_defecto = "user";

        $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, email, contraseña, edad, rol) VALUES (?, ?, ?, ?, ?)");

        // Ejecutamos todo de golpe en un array
        if ($stmt->execute([$nombre, $email_por_defecto, $hash, $edad_por_defecto, $rol_por_defecto])) {
            header("Location: login.php");
            $mensaje = "Registro exitoso";
            exit();
        }
        // Si hay un error en la conexión y transferencia de datos
        else {
           header("Location: register.php");
           $mensaje = "Registro fallido";
           exit();
        }    
    }
}

// Cerramos las conexión
$conn->close();
$comprobar->close();
?>
