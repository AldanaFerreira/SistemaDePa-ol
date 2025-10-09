<?php
session_start();

// 🔐 Verificación de acceso
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'jefe') {
    header("Location: ../login/auth/login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Jefe</title>
    <link rel="stylesheet" href="../public/estiloDashboardJefe.css">
</head>
<body>
    <header class="topbar">
        <div class="logo">Sistema de Pañol</div>
        <nav class="menu">
            <a href="../public/dashboard-jefe.php">Inicio</a>
            <!-- Inventario removed for jefe de area -->
            <a href="../jefeArea/reportes.php">Reportes</a>
            <a href="../jefeArea/estadisticas.php">Estadísticas</a>
            <a href="../jefeArea/mantenimiento.php">Mantenimiento</a>
            <!-- Personal removed for jefe de area -->
            <a href="../login/logout.php" class="logout">Cerrar sesión</a>
            
        </nav>

    </header>
