<?php
// PÁGINA PARA ELIMINAR UN USUARIO DE LA BASE DE DATOS

include "db.php";
//include session_check

if (isset($_GET['id'])) {
    $id = $_GET["id"];

    try {
        $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");

        if($stmt->execute([$id])) {
            header("Location: list.php?msg=eliminado");
            exit;
        }
        else {
            header("Location: edit.php?msg=no_eliminado");
            exit;
        }
    }
    catch (PDOException $e) {
        die("Error inesperado" . $e->getMessage());
    }
}
else {
    header("Location: list.php");
    exit;
}

?>