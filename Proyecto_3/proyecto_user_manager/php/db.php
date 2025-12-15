<?php
// PÁGINA PARA HACER UNA CONEXIÓN SEGURA CON LA BASE DE DATOS

$host = "localhost";
$user = "sandra";
$pass = "sandra";
$dbname = "proyecto_user_manager";

// Sentencia de manejo de errores en la conexión

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_errno) {
    die("Error de conexión". $conn->connect_error);
}

/* He tenido que quitar la función "pdo" y cambiarla por "conn", ya que pdo usa sentencias diferentes en php 
    que mysqli, y por tanto al implementar las funciones de registro de los anteriores proyectos no se podían
    mezlar las dos sentencias así que he decidido cambiarla para que funcione */
?>