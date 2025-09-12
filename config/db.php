<?php
$host = "localhost";
$user = "root";      // tu usuario de MySQL
$pass = "Abril2006";          // tu contraseña de MySQL
$db   = "panol_db";  // nombre de tu base de datos

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
