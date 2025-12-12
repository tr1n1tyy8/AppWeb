<?php
// PÁGINA PARA CREAR UN NUEVO USUARIO Y AÑADIRLO A LA BBDD

include "db.php";

$exito = false;
$mensaje = "";

// Obtener datos del usuario
$nombre = $_POST["nombre"];
$email = $_POST["email"];
$edad = $_POST["edad"];
$rol = $_POST["rol"];
$contraseña = $_POST["contraseña"];

// Comprobamos que el usuario no existe antes de hacer la consulta
if ($nombre !== '' && $contraseña !== '') {
    $comprobar = $conn->prepare("SELECT id FROM usuarios WHERE nombre = ?");
    $comprobar->bind_param("s", $nombre);
    $comprobar->execute();
    $comprobar->store_result(); 
}

// Si el usuario ya existe, mostramos un mensaje
if ($comprobar->num_rows > 0) {
    $mensaje = "El usuario ya está registrado";
} else {
    // Si el usuario no existe, lo insertamos (no puedo usar pdo ya que es una extensión diferente a mysqli q la necesito para comprobar)
    $hash = password_hash($contraseña, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre,email,contraseña,edad,rol) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssss", $nombre, $email, $hash, $edad, $rol);
    //$stmt->execute([$nombre, $email, $hash, $edad, $rol]);

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

header("Location: list.php");
exit;
?>