<?php

$host = "localhost";
$usuario = "root";
$contraseña = "abril2006";
$basedatos = "sistemapanol";

$conn = new mysqli($host, $usuario, $contraseña, $basedatos);///conn ess para hacer consultas

if($conn->connect_error) {
    die("Error de conexión: " .
    $conn->connect_error);
}



?>
