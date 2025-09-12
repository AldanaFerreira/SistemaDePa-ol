<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Pañol</title>
    <style>
        body { font-family: Arial, sans-serif; margin:0; padding:0; background:#f9f9f9; }
    header { background:#1976d2; color:#fff; padding:15px; }
        header h1 { margin:0; font-size:22px; }
        nav { margin-top:10px; }
    nav a { color:#fff; margin-right:15px; text-decoration:none; }
    nav a:hover { text-decoration:underline; }
        main { padding:20px; }
    footer { background:#1976d2; color:#fff; text-align:center; padding:10px; position:fixed; bottom:0; width:100%; }
        table { border-collapse: collapse; width: 100%; margin-top:15px; background:#fff; }
        table th, table td { border:1px solid #ddd; padding:8px; text-align:center; }
        table th { background:#f0f0f0; }
    button, input[type=submit] { background:#1976d2; color:#fff; border:none; padding:8px 12px; cursor:pointer; }
    button:hover, input[type=submit]:hover { background:#1565c0; }
    a.btn { background:#1976d2; color:#fff; padding:6px 10px; text-decoration:none; border-radius:4px; }
    a.btn:hover { background:#1565c0; }
    </style>
</head>
<body>
<header>
    <h1>Sistema de Pañol</h1>
    <?php
    // Mostrar barra solo en dashboard
    $show_nav = false;
    $current_file = basename($_SERVER['PHP_SELF']);
    if ($current_file === 'dashboard.php' && isset($_SESSION['usuario'])) {
        $show_nav = true;
    }
    ?>
    <?php if($show_nav): ?>
    <nav>
        <a href="dashboard.php">Inicio</a>
        <a href="../items/list.php">Ítems</a>
        <a href="../usuarios/list.php">Usuarios</a>
        <a href="../prestamos/list.php">Prestamos</a>
        <a href="logout.php">Cerrar Sesión</a>
    </nav>
    <?php endif; ?>
</header>
<main>
