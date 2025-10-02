<!-- 
// session_start();
// if (!isset($_SESSION['usuario'])) {
//     header("Location: login.php");
//     exit();
// }
// include("../includes/header.php");

// // Datos simulados
// $totalUsuarios = 1;
// $totalItems = 5;
// $totalPrestamos = 2; -->


<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: ../../login/public/login.php');
    exit();
}
// Datos simulados
$totalUsuarios = 1;
$totalItems = 5;
$totalPrestamos = 2;
// resto del dashboard...
?>
<link rel="stylesheet" type="text/css" href="dashboard_menu.css">
<link rel="stylesheet" type="text/css" href="sidebar_modern.css">
<div class="sidebar">
    <h2 style="margin-bottom: 10px;">Sistema Pañol</h2>
    <h3 style="margin-bottom: 32px;">Menú</h3>
        <a href="../items/add.php" class="btn">
            <span class="sidebar-icon">
                <!-- Modern icon: build (Material Icons) -->
                <svg xmlns="http://www.w3.org/2000/svg" height="38" width="38" viewBox="0 0 24 24" fill="currentColor"><path d="M22.7 19.3l-6.4-6.4c.6-1.1.9-2.3.7-3.6-.2-1.3-.8-2.5-1.7-3.4-1.7-1.7-4.3-2-6.2-.7l2.1 2.1-2.8 2.8-2.1-2.1c-1.3 1.9-1 4.5.7 6.2.9.9 2.1 1.5 3.4 1.7 1.3.2 2.5-.1 3.6-.7l6.4 6.4c.4.4 1 .4 1.4 0l1.4-1.4c.4-.4.4-1 0-1.4z"/></svg>
            </span>
            <span class="sidebar-text">Herramientas</span>
        </a>
        <a href="../prestamos/list.php" class="btn">
            <span class="sidebar-icon">
                <!-- Modern icon: assignment (Material Icons) -->
                <svg xmlns="http://www.w3.org/2000/svg" height="38" width="38" viewBox="0 0 24 24" fill="currentColor"><path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1s-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm7 18H5V5h2v2h10V5h2v16z"/></svg>
            </span>
            <span class="sidebar-text">Préstamos</span>
        </a>
            <!-- Sección Inventario -->

                <a href="../inventario/list.php" class="btn">
                    <span class="sidebar-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" height="38" width="38" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l-5.5 9h11zM2 20h20v-2H2zm2-4h16v-2H4z"/></svg>
                    </span>
                    <span class="sidebar-text">Inventario</span>
                </a>
        <!-- Sección Configuración -->
    <a href="../public/configuracion.php" class="btn" >
            <span class="sidebar-icon">
                <!-- Modern icon: settings (Material Icons) -->
                <svg xmlns="http://www.w3.org/2000/svg" height="38" width="38" viewBox="0 0 24 24" fill="currentColor"><path d="M19.14 12.94c.04-.31.06-.63.06-.94s-.02-.63-.06-.94l2.03-1.58a.5.5 0 00.12-.64l-1.92-3.32a.5.5 0 00-.61-.22l-2.39.96a7.007 7.007 0 00-1.62-.94l-.36-2.53A.5.5 0 0014 2h-4a.5.5 0 00-.5.42l-.36 2.53c-.59.22-1.14.52-1.62.94l-2.39-.96a.5.5 0 00-.61.22l-1.92 3.32a.5.5 0 00.12.64l2.03 1.58c-.04.31-.06.63-.06.94s.02.63.06.94l-2.03 1.58a.5.5 0 00-.12.64l1.92 3.32c.14.24.44.32.68.22l2.39-.96c.48.42 1.03.72 1.62.94l.36 2.53c.05.28.27.42.5.42h4c.23 0 .45-.14.5-.42l.36-2.53c.59-.22 1.14-.52 1.62-.94l2.39.96c.24.1.54.02.68-.22l1.92-3.32a.5.5 0 00-.12-.64l-2.03-1.58zM12 15.5A3.5 3.5 0 1115.5 12 3.5 3.5 0 0112 15.5z"/></svg>
            </span>
            <span class="sidebar-text">Configuración</span>
        </a>
</div>

<div class="content">
    <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?> 👋</h2>

    <div class="cards">
        <div class="card">
            <h3>Usuarios</h3>
            <p class="number"><?= $totalUsuarios ?></p>
            <a href="../usuarios/list.php" class="btn">Ver usuarios</a>
        </div>

        <div class="card">
            <h3>Ítems</h3>
            <p class="number"><?= $totalItems ?></p>
            <a href="../items/list.php" class="btn">Ver ítems</a>
        </div>

        <div class="card">
            <h3>Préstamos</h3>
            <p class="number"><?= $totalPrestamos ?></p>
            <a href="../prestamos/list.php" class="btn">Ver préstamos</a>
        </div>
        </div>

        <!-- Inventario en el dashboard -->
        <div class="card inventory" style="margin-top:32px;">
            <h3>Inventario</h3>
            <table style="width:100%; border-collapse:collapse; margin-top:18px;">
                <tr><th>ID</th><th>Herramienta</th><th>Categoría</th><th>Stock</th><th>Estado</th></tr>
                <?php
                // Datos simulados de inventario
                $inventario = [
                    ["id" => 1, "herramienta" => "Martillo", "categoria" => "Manuales", "stock" => 10, "estado" => "Disponible"],
                    ["id" => 2, "herramienta" => "Pinza", "categoria" => "Manuales", "stock" => 5, "estado" => "En uso"],
                    ["id" => 3, "herramienta" => "Taladro", "categoria" => "Eléctricas", "stock" => 2, "estado" => "Mantenimiento"],
                ];
                foreach($inventario as $item): ?>
                    <tr>
                        <td><?= $item['id'] ?></td>
                        <td><?= $item['herramienta'] ?></td>
                        <td><?= $item['categoria'] ?></td>
                        <td><?= $item['stock'] ?></td>
                        <td><?= $item['estado'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <a href="../inventario/list.php" class="btn" style="margin-top:12px;">Ver inventario completo</a>
        </div>
    </div>
</div>

<?php include("../includes/footer.php"); ?>

