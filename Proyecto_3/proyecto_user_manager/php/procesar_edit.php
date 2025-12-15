<?php
// PÁGINA PARA PROCESAR LA EDICIÓN DEL USUARIO

include "db.php";
//include session_start

// Comprobar que se han recibido los datos y el ID
if (!isset($_GET['id']) || !$_POST) {
    header("Location: list.php");
    echo "Edición fallida";
    exit;
}

$id = $_GET['id'];

// Obtener los datos para que el usuario pueda cambiar los valores que quiera sin q sean obligatorios
$stmt = $conn->prepare("SELECT nombre, email, contraseña, edad, rol FROM usuarios WHERE id = ?");
$stmt->bind_param("id", $id);
$stmt->execute();
$result = $stmt->get_result();
$usuario_existente = $result->fetch_assoc();

if (!$usuario_existente) {
    header("Location: list.php");
    echo "Usuario no encontrado";
    exit;
}

$nombre = $_POST['nombre'];
$email= $_POST['email'];
$contraseña = $_POST['contraseña'];
$edad = $_POST['edad'];
$rol = $_POST['rol'];

// Si el campo está vacío (pq no lo quiere actualizar) usa el valor por defecto
$nombre_vacio = empty($nombre) ? $usuario_existente['nombre'] : $nombre;
$email_vacio = empty($email) ? $usuario_existente['email'] : $email;
$edad_vacio = empty($edad) ? $usuario_existente['edad'] : $edad;
$rol_vacio = $rol;

// Ejecutar consulta de update
$query = "UPDATE usuarios SET nombre=?, email=?, edad=?, rol=?";
$tipos = "ssis";
$params = [&$nombre, &$email, &$edad, &$rol];

// Añadir contraseña si se ha introducido
if (!empty($contraseña)) {
    $hash = password_hash($contraseña, PASSWORD_DEFAULT);
    $query .= ", contraseña=?";
    $tipos .= "s";
    $params[] = &$hash;
}

// Finalizar consulta y añadir ID
$query.= " WHERE id=?";
$tipos .= "i";
$params[] = &$id;

$stmt = $conn->prepare($query);

// Desempaqueta la lista de tipos de datos/variables de update y las pasa a bind_param (supera limitiacion ya que no acepta arrays)
call_user_func(array($stmt, 'bind_param'), array_merge([$tipos], $params));

if ($stmt->execute()) {
    header("Location: list.php?update=success");
    exit;
} else {
    header("Location: list.php");
    echo "Error al actualizar el usuario";
    exit;
}

?>