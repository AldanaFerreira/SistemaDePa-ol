
<link rel="stylesheet" href="../css/estilos.css">



<?php
session_start();

$usuario = $_POST['usuario'] ?? '';
$clave   = $_POST['clave'] ?? '';

$usuario_valido = "admin";
$clave_valida   = "1234";

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

