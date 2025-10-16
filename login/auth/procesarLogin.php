<link rel="stylesheet" href="../css/estilos.css">



<?php
session_start();

$usuario = $_POST['usuario'] ?? '';
$clave   = $_POST['clave'] ?? '';


$usuario_valido = "admin";
$clave_valida   = "1234";

$usuario_validoo = "jefe";
$clave_validaa   = "5678";

// Jefe de usuario
if ($usuario === $usuario_validoo && $clave === $clave_validaa) {
    $_SESSION['usuario'] = $usuario;
    $_SESSION['rol'] = 'jefe';
    header("Location: /SistemaDePa-ol/public/dashboard-jefe.php");
    exit();
}

// Admin
if ($usuario === $usuario_valido && $clave === $clave_valida) {
    $_SESSION['usuario'] = $usuario;
    $_SESSION['rol'] = 'admin';
    header("Location: /SistemaDePa-ol/public/dashboard.php");
    exit();
} else {
    echo "<div style='font-family:sans-serif; text-align:center; margin-top:2rem;'>
            ❌ Usuario o clave incorrectos.<br><br>
            <a href='login.html' style='color:blue; text-decoration:underline;'>Volver al login</a>
          </div>";
}

