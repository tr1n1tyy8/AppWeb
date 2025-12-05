<?php
// PÁGINA PARA HACER UNA CONEXIÓN SEGURA CON LA BASE DE DATOS

$host = "localhost";
$user = "sandra";
$pass = "sandra";
$dbname = "proyecto_user_manager";

// Sentencia de manejo de errores en la conexión

try {
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch (PDOException $e) {
die("Error de conexión: " . $e->getMessage());
}

?>