<?php
// PÁGINA PARA HACER UNA CONEXIÓN SEGURA CON LA BASE DE DATOS

$host = "127.0.0.1";    //he tenido que poner la IP local porque si no no me detectaba el host
$user = "sandra";
$pass = "sandra";
$dbname = "proyecto_user_manager";

// Sentencia de manejo de errores en la conexión a bbdd con pdo

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4",$user,$pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {    //si se produce un error lanza el mensaje
    die("Error de conexión: " . $e->getMessage());
}

/* He tenido que sustiturir la función "pdo" en todos los archivos de proyectos anteriores 
con sintaxis "mysqli" */
?>