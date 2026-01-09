<?php

// PÁGINA PARA PROCESAR LA EDICIÓN DEL USUARIO

include "session_check.php";
include "db.php";

// compruebo si el usuario es o no admin, para controlar sus accesos a las urls
if ($_SESSION['usuario_rol'] !== 'admin') {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'] ?? $_POST['id'] ?? null; // busca el ID por la URL y si no lo encuentra (null) lo busca en el formulario

// Comprobar que se han recibido los datos y el ID
if ($_POST && $id) {
    $nombre = $_POST['nombre'];
    $email= $_POST['email'];
    $password = trim($_POST['password']);
    $edad = $_POST['edad'];
    $rol = $_POST['rol'];

    // Comprobar email duplicado en la bbdd
    if (!empty($email)) {
        $check_email = $pdo->prepare("SELECT id FROM usuarios WHERE email = ? AND id != ?)");
        $check_email->execute([$email, $id]);
        if($check_email->fetch()) {
            header("Location: edit.php");
            exit;
        }
    }
    // Obtener los datos para que el usuario pueda cambiar los valores que quiera sin q sean obligatorios
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
    $stmt->execute([$id]);
    $usuario_actual= $stmt->fetch();

    if (!$usuario_actual) {
        header("Location: list.php");
        exit;
    }

    // Si el campo está vacío (pq no lo quiere actualizar) usa el valor por defecto en la bbdd
    $nombre_vacio = !empty($nombre) ? $nombre : $usuario_actual['nombre'];
    $email_vacio = !empty($email) ? $email : $usuario_actual['email'];
    $edad_vacio = !empty($edad) ? $edad : $usuario_actual['edad'];
    $rol_vacio = $rol; //rol siempre se envía por select

    // Ejecutar consulta de update
    $query = "UPDATE usuarios SET nombre = :nom, email = :em, edad = :ed, rol = :rol";
    $params = [
        ':nom' => $nombre_vacio,
        ':em' => $email_vacio,
        ':ed' => $edad_vacio,
        ':rol' => $rol_vacio,
        ':id' => $id
    ];

    // Añadir contraseña si se ha introducido una nueva
    if (!empty($password)) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query .= ", password = :pass";
        $params[':pass'] = $hash;
    }

    // Finalizar consulta y añadir ID
    $query.= " WHERE id = :id";

    // Ejecutar la consulta
    $stmt_update = $pdo->prepare($query);

    if ($stmt_update->execute($params)) {
        header("Location: list.php");
        exit();
    }
    //si hay un error al actualizar
    else {
        header("Location: edit.php");
        exit();
    }
} else {
    header("Location: list.php");
    die("Error inesperado");
}

?>