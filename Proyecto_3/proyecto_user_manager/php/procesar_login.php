<?php
//PÁGINA PARA PROCESAR LOS DATOS DE INICIO DE SESIÓN DEL USUARIO

include "db.php";
session_start();
date_default_timezone_set('Europe/Madrid');

if ($_POST) {
    $nombre= $_POST['nombre'];
    $contraseña= trim($_POST['contraseña']);

    // Consulta segura
    $stmt = $pdo->prepare("SELECT id, nombre, contraseña, rol FROM usuarios WHERE nombre = ?");
    $stmt->execute([$nombre]);
    $usuario = $stmt->fetch();  //fetch obtiene datos de las filas de la bbdd y comprueba que existan

    if ($usuario && password_verify($contraseña, $usuario['contraseña'])) {  //verifica la si la contraseña es igual al hash del id conseguido
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nombre'] = $usuario['nombre'];   //asociamos variables a datos de la bbdd
        $_SESSION['usuario_rol'] = $usuario['rol'];
        $_SESSION['hora_inicio_sesion'] = date("d/m/Y") . " a las " . date("H:i");
        
        header("Location: index.php");  //redirigimos a la pág. principal si todo es correcto
        exit();
        }
    // Si falla algo en el login
    else {
        header("Location: login.php?error=1");
        exit;
    }
}

?>