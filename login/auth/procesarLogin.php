<link rel="stylesheet" href="../css/estilos.css">



<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

$usuario = $_POST['usuario'] ?? '';
$clave   = $_POST['clave'] ?? '';


$usuario_valido = "admin";
$clave_valida   = "1234";

// Jefe de usuario
if ($usuario === "jefe" && $clave === "5678") {
    $_SESSION['usuario'] = $usuario;
    header("Location: ../public/dashboard-jefe.php");
    exit();
}

// Admin
if ($usuario === $usuario_valido && $clave === $clave_valida) {
    $_SESSION['usuario'] = $usuario;
    header("Location: ../../public/dashboard.php");
    exit();
} else {
    echo "<div style='font-family:sans-serif; text-align:center; margin-top:2rem;'>
            ❌ Usuario o clave incorrectos.<br><br>
            <a href='login.html' style='color:blue; text-decoration:underline;'>Volver al login</a>
          </div>";
}

