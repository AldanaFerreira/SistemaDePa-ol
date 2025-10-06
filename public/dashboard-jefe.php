<?php
session_start();

// Verificación de acceso (solo jefes)
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 'jefe') {
    header('Location: ../login/auth/login.html');
    exit();
}

include '../includes/header-jefe.php';
?>

<link rel="stylesheet" href="estiloDashboardJefe.css">

<main class="main-content">
    <section class="dashboard">
        <h1>Panel del Jefe de Área</h1>
        <p>Bienvenido, <strong><?php echo $_SESSION['usuario']; ?></strong> 👋</p>

        <div class="card-container">
            <a href="../jefeArea/inventario.php" class="card">
                <div class="icon">🧰</div>
                <h3>Inventario</h3>
                <p>Ver y gestionar herramientas</p>
            </a>

            <a href="../jefeArea/reportes.php" class="card">
                <div class="icon">📄</div>
                <h3>Reportes</h3>
                <p>Revisar reportes del personal</p>
            </a>

            <a href="../jefeArea/estadisticas.php" class="card">
                <div class="icon">📊</div>
                <h3>Estadísticas</h3>
                <p>Indicadores del pañol</p>
            </a>

            <a href="../jefeArea/mantenimiento.php" class="card">
                <div class="icon">🔧</div>
                <h3>Mantenimiento</h3>
                <p>Solicitudes y revisiones</p>
            </a>

            <a href="../jefeArea/personal.php" class="card">
                <div class="icon">👥</div>
                <h3>Personal</h3>
                <p>Control del personal y roles</p>
            </a>
        </div>

        <div class="logout-container">
            <a href="../auth/logout.php" class="logout-btn">Cerrar sesión</a>
        </div>
    </section>
</main>

<?php include '../includes/footer-jefe.php'; ?>
