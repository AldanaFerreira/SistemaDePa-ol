<?php
session_start();

// Verificación de acceso (solo jefes)
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 'jefe') {
    header('Location: ../login/auth/login.html');
    exit();
}

include '../includes/header.php';
?>

<link rel="stylesheet" type="text/css" href="dashboard_menu.css">
<link rel="stylesheet" type="text/css" href="sidebar_modern.css">


<div class="sidebar">
    <h2 style="margin-bottom: 10px;">Sistema Pañol</h2>
    <h3 style="margin-bottom: 32px;">Menú</h3>
        <a href="../jefeArea/inventario.php" class="btn">
            <span class="sidebar-icon">
                <svg xmlns="http://www.w3.org/2000/svg" height="38" width="38" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l-5.5 9h11zM2 20h20v-2H2zm2-4h16v-2H4z"/></svg>
            </span>
            <span class="sidebar-text">Inventario</span>
        </a>
        <a href="../jefeArea/reportes.php" class="btn">
            <span class="sidebar-icon">
                <svg xmlns="http://www.w3.org/2000/svg" height="38" width="38" viewBox="0 0 24 24" fill="currentColor"><path d="M5 9.2V19h2V9.2zm6 2.6V19h2v-7.2zm6-5.2V19h2V6.6z"/></svg>
            </span>
            <span class="sidebar-text">Reportes</span>
        </a>
        <a href="../jefeArea/estadisticas.php" class="btn">
            <span class="sidebar-icon">
                <svg xmlns="http://www.w3.org/2000/svg" height="38" width="38" viewBox="0 0 24 24" fill="currentColor"><path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1s-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm7 18H5V5h2v2h10V5h2v16z"/></svg>
            </span>
            <span class="sidebar-text">Estadísticas</span>
        </a>
        <a href="../jefeArea/mantenimiento.php" class="btn">
            <span class="sidebar-icon">
                <svg xmlns="http://www.w3.org/2000/svg" height="38" width="38" viewBox="0 0 24 24" fill="currentColor"><path d="M19.14 12.94c.04-.31.06-.63.06-.94s-.02-.63-.06-.94l2.03-1.58a.5.5 0 00.12-.64l-1.92-3.32a.5.5 0 00-.61-.22l-2.39.96a7.007 7.007 0 00-1.62-.94l-.36-2.53A.5.5 0 0014 2h-4a.5.5 0 00-.5.42l-.36 2.53c-.59.22-1.14.52-1.62.94l-2.39-.96a.5.5 0 00-.61.22l-1.92 3.32a.5.5 0 00.12.64l2.03 1.58c-.04.31-.06.63-.06.94s.02.63.06.94l-2.03 1.58a.5.5 0 00-.12.64l1.92 3.32c.14.24.44.32.68.22l2.39-.96c.48.42 1.03.72 1.62.94l.36 2.53c.05.28.27.42.5.42h4c.23 0 .45-.14.5-.42l.36-2.53c.59-.22 1.14-.52 1.62-.94l2.39.96c.24.1.54.02.68-.22l1.92-3.32a.5.5 0 00-.12-.64l-2.03-1.58zM12 15.5A3.5 3.5 0 1115.5 12 3.5 3.5 0 0112 15.5z"/></svg>
            </span>
            <span class="sidebar-text">Mantenimiento</span>
        </a>
        <a href="../jefeArea/personal.php" class="btn">
            <span class="sidebar-icon">
                <svg xmlns="http://www.w3.org/2000/svg" height="38" width="38" viewBox="0 0 24 24" fill="currentColor"><path d="M12 12c2.7 0 8 1.34 8 4v2H4v-2c0-2.66 5.3-4 8-4zm0-2a4 4 0 110-8 4 4 0 010 8z"/></svg>
            </span>
            <span class="sidebar-text">Personal</span>
        </a>
        <a href="../public/configuracion.php" class="btn" >
            <span class="sidebar-icon">
                <svg xmlns="http://www.w3.org/2000/svg" height="38" width="38" viewBox="0 0 24 24" fill="currentColor"><path d="M19.14 12.94c.04-.31.06-.63.06-.94s-.02-.63-.06-.94l2.03-1.58a.5.5 0 00.12-.64l-1.92-3.32a.5.5 0 00-.61-.22l-2.39.96a7.007 7.007 0 00-1.62-.94l-.36-2.53A.5.5 0 0014 2h-4a.5.5 0 00-.5.42l-.36 2.53c-.59.22-1.14.52-1.62.94l-2.39-.96a.5.5 0 00-.61.22l-1.92 3.32a.5.5 0 00.12.64l2.03 1.58c-.04.31-.06.63-.06.94s.02.63.06.94l-2.03 1.58a.5.5 0 00-.12.64l1.92 3.32c.14.24.44.32.68.22l2.39-.96c.48.42 1.03.72 1.62.94l.36 2.53c.05.28.27.42.5.42h4c.23 0 .45-.14.5-.42l.36-2.53c.59-.22 1.14-.52 1.62-.94l2.39.96c.24.1.54.02.68-.22l1.92-3.32a.5.5 0 00-.12-.64l-2.03-1.58zM12 15.5A3.5 3.5 0 1115.5 12 3.5 3.5 0 0112 15.5z"/></svg>
            </span>
            <span class="sidebar-text">Configuración</span>
        </a>
</div>

<div class="content">
    <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?> 👋</h2>
    <div class="cards">
        <div class="card">
            <h3>Inventario</h3>
            <a href="../jefeArea/inventario.php" class="btn">Ver inventario</a>
        </div>
        <div class="card">
            <h3>Reportes</h3>
            <a href="../jefeArea/reportes.php" class="btn">Ver reportes</a>
        </div>
        <div class="card">
            <h3>Estadísticas</h3>
            <a href="../jefeArea/estadisticas.php" class="btn">Ver estadísticas</a>
        </div>
        <div class="card">
            <h3>Mantenimiento</h3>
            <a href="../jefeArea/mantenimiento.php" class="btn">Ver mantenimiento</a>
        </div>
        <div class="card">
            <h3>Personal</h3>
            <a href="../jefeArea/personal.php" class="btn">Ver personal</a>
        </div>
    </div>
</div>

<?php include '../includes/footer-jefe.php'; ?>
