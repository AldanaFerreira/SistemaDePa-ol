<?php
session_start();

$usuario = $_POST['usuario'] ?? '';
$clave   = $_POST['clave'] ?? '';

// 🔸 Usuarios simulados
$usuarios = [
    'admin' => ['clave' => '1234', 'rol' => 'pañolero'],
    'jefe'  => ['clave' => '5678', 'rol' => 'jefe_area']
];

if (isset($usuarios[$usuario]) && $usuarios[$usuario]['clave'] === $clave) {
    $_SESSION['usuario'] = $usuario;
    $_SESSION['rol'] = $usuarios[$usuario]['rol'];

    //  Redirige según el rol
if ($_SESSION['rol'] === 'jefe_area') {
    header("Location: ../public/dashboard-jefe.php");
} else {
    header("Location: ../public/dashboard.php");
}

    exit();
} else {
    echo "<div style='font-family:sans-serif; text-align:center; margin-top:2rem;'>
            ❌ Usuario o clave incorrectos.<br><br>
            <a href='login.html' style='color:blue; text-decoration:underline;'>Volver al login</a>
          </div>";
}
?>
