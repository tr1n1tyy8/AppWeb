<?php

$host = "localhost";
$user = "sandra";
$pass = "sandra";
$database = "proyecto_login";

$conn = new mysqli($host, $user, $pass, $database);

if ($conn->connect_error) {
    die("Error de conexión". $conn->connect_error);
}

?>