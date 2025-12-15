<?php

//PÁGINA PARA PROCESAR LOS DATOS DE INICIO DE SESIÓN DEL USUARIO
session_start();
include "db.php";
//include session_check.php

if ($_POST) {
    $email = $_POST['email'];
    $contraseña= $_POST['contraseña'];

    // Consulta segura
    $stmt = $conn->prepare("SELECT id, nombre, contraseña, rol FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {  //comprueba si únicamente existe 1 email enla bbdd
        $usuario = $result->fetch_assoc();  //almacena todos los datos del id de esa columna (usuario)

        if (password_verify($contraseña, $usuario['contraseña'])) {  //verifica la si la contraseña es igual al hash del id conseguido
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nombre'] = $usuario['nombre'];   //asociamos variables a datos de la bbdd
            $_SESSION['usuario_rol'] = $usuario['rol'];

            header("Location: index.php");  //redirigimos a la pág. principal si todo es correcto
            exit;
        }
    }

    header("Location: login.php");
    echo "Error: credenciales inválidas"; //en js mejor
    exit;
}

// Cerramos las consultas y la conexión
$stmt->close();
$conn->close();

?>