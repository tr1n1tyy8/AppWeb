<?php
// PÁGINA PARA PROCESAR LA EDICIÓN DEL USUARIO

include "db.php";
//include session_start

// Comprobar que se han recibido los datos y el ID
if ($_POST && isset($_GET['id'])) {
    $id = $_GET['id'];

    $nombre = $_POST['nombre'];
    $email= $_POST['email'];
    $contraseña = trim($_POST['contraseña']);
    $edad = $_POST['edad'];
    $rol = $_POST['rol'];

    // Comprobar email duplicado en la bbdd ??
    if (!empty($email)) {
        $check_email = $pdo->prepare("SELECT id FROM usuarios WHERE email = ? AND id != )");
        $check_email->execute([$email, $id]);
        if($check_email->fetch()) {
            echo "El email ya existe en la base de datos.";
            header("Location: edit.php");
            exit;
        }
    }
    // Obtener los datos para que el usuario pueda cambiar los valores que quiera sin q sean obligatorios ??
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
    $stmt->execute(['id']);
    $usuario_actual= $stmt->fetch();

    if (!$usuario_actual) {
        header("Location: list.php");
        echo "Usuario no encontrado";
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
        'nom' => $nombre_vacio,
        'em' => $email_vacio,
        'ed' => $edad_vacio,
        'rol' => $rol_vacio,
        'id' => $id
    ];

    // Añadir contraseña si se ha introducido una nueva
    if (!empty($contraseña)) {
        $hash = password_hash($contraseña, PASSWORD_DEFAULT);
        $query .= ", contraseña = :pass";
        $params['pass'] = &$hash;
    }

    // Finalizar consulta y añadir ID
    $query.= " WHERE id = :id";

    // Ejecutar la consulta
    $stmt_update = $pdo->prepare($query);

    if ($stmt_update->execute($params)) {
        header("Location: list.php?update=success");
        exit;
    } else {
        header("Location: edit.php");
        echo "Error al actualizar el usuario";
        exit;
    }
} else {
    header("Location: list.php");
    echo "Error inesperado.";
}

?>