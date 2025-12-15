<?php
// PÁGINA PARA ELIMINAR UN USUARIO DE LA BASE DE DATOS

include "db.php";
//include session_check

if (isset($_GET['id'])) {
    $id = $_GET["id"];

$stmt = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
}

header("Location: list.php");
exit;

?>