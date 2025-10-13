<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
session_start();

require_once '../db/db.php';    

// Verificación de acceso (solo jefes)
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 'jefe') {
    header('Location: ../login/auth/login.html');
    exit();
}

// Procesar envío explícito al jefe: solo si el formulario incluyó enviar_a_jefe=1
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar_a_jefe']) && $_POST['enviar_a_jefe'] == '1' && !empty($_POST['curso'])) {
    $reporte = [
        'fecha_enviado' => date('Y-m-d H:i:s'),
        'turno' => isset($_POST['turno']) ? trim($_POST['turno']) : '',
        'horario' => isset($_POST['horario']) ? trim($_POST['horario']) : '',
        'fecha_reporte' => isset($_POST['fecha']) ? trim($_POST['fecha']) : '',
        'curso' => isset($_POST['curso']) ? trim($_POST['curso']) : '',
        'comision' => isset($_POST['comision']) ? trim($_POST['comision']) : '',
        'profesor' => isset($_POST['profesor']) ? trim($_POST['profesor']) : '',
        'descripcion' => isset($_POST['descripcion']) ? trim($_POST['descripcion']) : ''
    ];

    $dir = __DIR__ . '/../db/db';
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
    $file = $dir . '/reportes_recibidos.json';
    $existing = [];
    if (file_exists($file)) {
        $contents = file_get_contents($file);
        $existing = json_decode($contents, true) ?: [];
    }
    $existing[] = $reporte;
    file_put_contents($file, json_encode($existing, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    // Redirigir para evitar reenvío del formulario
    header('Location: ../public/dashboard-jefe.php?recibido=1');
    exit();
}

// Cargar reportes recibidos para mostrarlos en la vista del jefe
$reportesFile = __DIR__ . '/../db/reportes_recibidos.json';
$reportesRecibidos = [];
if (file_exists($reportesFile)) {
    $reportesRecibidos = json_decode(file_get_contents($reportesFile), true) ?: [];
}

//include '../includes/header.php';
// Contar herramientas en mantenimiento pendientes
$result = $conn->query("SELECT COUNT(*) AS pendientes FROM mantenimiento WHERE estado='pendiente'");
$pendientes = 0;
if($row = $result->fetch_assoc()){
    $pendientes = $row['pendientes'];
}
?>

<link rel="stylesheet" type="text/css" href="dashboard_menu.css">
<link rel="stylesheet" type="text/css" href="sidebar_modern.css">


<div class="sidebar">
    <h2 style="margin-bottom: 10px;">Sistema Pañol</h2>
    <h3 style="margin-bottom: 32px;">Menú</h3>
        <!-- Inventario removed for jefe de area -->
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
        <a href="../mantenimiento/list.php" class="btn">
            <span class="sidebar-icon">
                <svg xmlns="http://www.w3.org/2000/svg" height="38" width="38" viewBox="0 0 24 24" fill="currentColor"><path d="M19.14 12.94c.04-.31.06-.63.06-.94s-.02-.63-.06-.94l2.03-1.58a.5.5 0 00.12-.64l-1.92-3.32a.5.5 0 00-.61-.22l-2.39.96a7.007 7.007 0 00-1.62-.94l-.36-2.53A.5.5 0 0014 2h-4a.5.5 0 00-.5.42l-.36 2.53c-.59.22-1.14.52-1.62.94l-2.39-.96a.5.5 0 00-.61.22l-1.92 3.32a.5.5 0 00.12.64l2.03 1.58c-.04.31-.06.63-.06.94s.02.63.06.94l-2.03 1.58a.5.5 0 00-.12.64l1.92 3.32c.14.24.44.32.68.22l2.39-.96c.48.42 1.03.72 1.62.94l.36 2.53c.05.28.27.42.5.42h4c.23 0 .45-.14.5-.42l.36-2.53c.59-.22 1.14-.52 1.62-.94l2.39.96c.24.1.54.02.68-.22l1.92-3.32a.5.5 0 00-.12-.64l-2.03-1.58zM12 15.5A3.5 3.5 0 1115.5 12 3.5 3.5 0 0112 15.5z"/></svg>
            </span>
            <span class="sidebar-text">Mantenimiento</span>
        </a>
        <!-- Personal removed for jefe de area -->
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
       <link rel="stylesheet" href="../public/estiloDashboardJefe.css">
        <!-- Inventario card removed for jefe de area -->
         <div class="card">
    <h3>Herramientas en Mantenimiento</h3>
    <a href="../mantenimiento/list.php" class="btn">Ver detalle (<?= $pendientes ?> pendientes)
    </a>
</div>

        <div class="card">
            <h3>Reportes</h3>
            <a href="../jefeArea/reportes.php" class="btn">Ver reportes</a>
        </div>
        <div class="card">
            <h3>Estadísticas</h3>
            <a href="../jefeArea/estadisticas.php" class="btn">Ver estadísticas</a>
        </div>
        <!-- Personal card removed for jefe de area -->
    </div>

    <!-- Sección de reportes recibidos -->
    <div style="margin-top:24px;">
        <h2>Reportes recibidos</h2>
        <?php if (isset($_GET['recibido'])): ?>
            <p style="color:green;">Reporte enviado correctamente.</p>
        <?php endif; ?>

        <?php if (!empty($reportesRecibidos)): ?>
            <table style="width:100%; border-collapse:collapse; margin-top:12px;">
                <tr><th>Enviado</th><th>Fecha reporte</th><th>Curso</th><th>Profesor</th><th>Descripción</th></tr>
                <?php foreach (array_reverse($reportesRecibidos) as $r): ?>
                    <tr>
                        <td><?= htmlspecialchars($r['fecha_enviado']) ?></td>
                        <td><?= htmlspecialchars($r['fecha_reporte']) ?></td>
                        <td><?= htmlspecialchars($r['curso']) ?> (<?= htmlspecialchars($r['comision']) ?>)</td>
                        <td><?= htmlspecialchars($r['profesor']) ?></td>
                        <td><?= nl2br(htmlspecialchars($r['descripcion'])) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No hay reportes recibidos.</p>
        <?php endif; ?>
    </div>
    
</div>

<?php include '../includes/footer.php'; ?>
