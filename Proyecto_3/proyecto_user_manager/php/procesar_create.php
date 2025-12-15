<?php
// PÁGINA PARA CREAR UN NUEVO USUARIO Y AÑADIRLO A LA BBDD

include "db.php";
//include session_check

// Obtener datos del usuario
if ($_POST) {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $edad = $_POST["edad"];
    $rol = $_POST["rol"];
    $contraseña = $_POST["contraseña"];

    // Comprobamos que el usuario ya exista con el email
    $check_stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {    //si el mail ya existe
        header("Location: login.php");
        echo "El usuario asociado al E-mail proporcionado ya existe";
        exit;
    }

    // Si el usuario no existe, lo agregamos
    $hash = password_hash($contraseña, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, contraseña, edad, rol) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssis", $nombre, $email, $hash, $edad, $rol);

    if ($stmt->execute()) {
            header("Location: login.php");
            echo "Registro exitoso";
            exit;

    } else {
           header("Location: create.php");
           echo "Registro fallido";
           exit;
        }
}

    // Cerramos las conexión
    $conn->close();
    $comprobar->close();

?>