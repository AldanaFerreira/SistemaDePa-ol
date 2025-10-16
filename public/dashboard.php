<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: ../login/auth/login.html');
    exit();
}   

// Datos simulados
$totalUsuarios = 1;
$totalItems = 5;
$totalPrestamos = 2;
// resto del dashboard...

require_once '../db/db.php';
?>
<link rel="stylesheet" type="text/css" href="dashboard_menu.css">
<link rel="stylesheet" type="text/css" href="sidebar_modern.css">

<div class="sidebar">
    <h2 style="margin-bottom: 10px;">Sistema Pañol</h2>
    <h3 style="margin-bottom: 32px;">Menú</h3>
        <a href="../items/add.php" class="btn">
            <span class="sidebar-icon">
                <!-- Modern icon: inventory_2 (Material Icons) -->
                <svg xmlns="http://www.w3.org/2000/svg" height="38" width="38" viewBox="0 0 24 24" fill="currentColor"><path d="M20 6V4H4v2H2v2h20V6h-2zm0 2H4v12h16V8zm-2 10H6V10h12v8z"/></svg>
            </span>
            <span class="sidebar-text">Ítems</span>
        </a>
        <a href="../prestamos/list.php" class="btn">
            <span class="sidebar-icon">
                <!-- Modern icon: assignment (Material Icons) -->
                <svg xmlns="http://www.w3.org/2000/svg" height="38" width="38" viewBox="0 0 24 24" fill="currentColor"><path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1s-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm7 18H5V5h2v2h10V5h2v16z"/></svg>
            </span>
            <span class="sidebar-text">Préstamos</span>
        </a>
        <a href="../inventario/list.php" class="btn">
            <span class="sidebar-icon">
                <!-- Modern icon: category (Material Icons) -->
                <svg xmlns="http://www.w3.org/2000/svg" height="38" width="38" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l-5.5 9h11zM2 20h20v-2H2zm2-4h16v-2H4z"/></svg>
            </span>
            <span class="sidebar-text">Inventario</span>
        </a>
        <a href="../reportes/list.php" class="btn">
            <span class="sidebar-icon">
                <!-- Modern icon: build (Material Icons) -->
                <svg xmlns="http://www.w3.org/2000/svg" height="38" width="38" viewBox="0 0 24 24" fill="currentColor"><path d="M22.7 19.3l-4-4c.5-1.2.3-2.6-.6-3.5l-1-1c-.9-.9-2.3-1.1-3.5-.6l-4-4c-.4-.4-1-.4-1.4 0L2.7 8.7c-.4.4-.4 1 0 1.4l4 4c-.5 1.2-.3 2.6.6 3.5l1 1c.9.9 2.3 1.1 3.5.6l4 4c.4.4 1 .4 1.4 0l3.6-3.6c.5-.4.5-1 .1-1.4zM7.2 12L5 9.8l2-2L9.2 10zm9.6 9l-2-2L16 16l2 2z"/></svg>
            </span>
            <span class="sidebar-text">Reportes</span>
        <!-- Sección Configuración -->
        <a href="../public/configuracion.php" class="btn">
            <span class="sidebar-icon">
                <!-- Modern icon: settings (Material Icons) -->
                <svg xmlns="http://www.w3.org/2000/svg" height="38" width="38" viewBox="0 0 24 24" fill="currentColor"><path d="M19.14 12.94c.04-.31.06-.63.06-.94s-.02-.63-.06-.94l2.03-1.58a.5.5 0 00.12-.64l-1.92-3.32a.5.5 0 00-.61-.22l-2.39.96a7.007 7.007 0 00-1.62-.94l-.36-2.53A.5.5 0 0014 2h-4a.5.5 0 00-.5.42l-.36 2.53c-.59.22-1.14.52-1.62.94l-2.39-.96a.5.5 0 00-.61.22l-1.92 3.32a.5.5 0 00.12.64l2.03 1.58c-.04.31-.06.63-.06.94s.02.63.06.94l-2.03 1.58a.5.5 0 00-.12.64l1.92 3.32c.14.24.44.32.68.22l2.39-.96c.48.42 1.03.72 1.62.94l.36 2.53c.05.28.27.42.5.42h4c.23 0 .45-.14.5-.42l.36-2.53c.59-.22 1.14-.52 1.62-.94l2.39.96c.24.1.54.02.68-.22l1.92-3.32a.5.5 0 00-.12-.64l-2.03-1.58zM12 15.5A3.5 3.5 0 1115.5 12 3.5 3.5 0 0112 15.5z"/></svg>
            </span>
            <span class="sidebar-text">Configuración</span>
        </a>
</div>


 <!--hasta aca es toda los opciones del dashboar para que se pueda añadir en las hojas de cada items-->


<div class="content">
    <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?> 👋</h2>

    <div class="cards">
        <?php
        // Stock total disponible
        $stockTotal = 0;
        $bajoStock = 0;
        $umbralBajoStock = 5;
        $sqlStock = "SELECT cantidadDisponible FROM herramientas";
        $resStock = $conn->query($sqlStock);
        if ($resStock) {
            while ($row = $resStock->fetch_assoc()) {
                $stockTotal += (int)$row['cantidadDisponible'];
                if ((int)$row['cantidadDisponible'] <= $umbralBajoStock) {
                    $bajoStock++;
                }
            }
        }

        // Préstamos activos
        $prestamosActivos = 0;
        $sqlPrestamos = "SELECT COUNT(*) AS activos FROM prestamos WHERE fechaDevolucion IS NULL";
        $resPrestamos = $conn->query($sqlPrestamos);
        if ($resPrestamos && $row = $resPrestamos->fetch_assoc()) {
            $prestamosActivos = $row['activos'];
        }
        ?>
        <div class="card">
            <h3>Stock total disponible</h3>
            <p class="number"><?php echo $stockTotal; ?></p>
        </div>
        <div class="card">
            <h3>Materiales con bajo stock</h3>
            <p class="number"><?php echo $bajoStock; ?></p>
        </div>
        <div class="card">
            <h3>Préstamos activos</h3>
            <p class="number"><?php echo $prestamosActivos; ?></p>
            <a href="../prestamos/list.php" class="btn">Ver préstamos</a>
        </div>
    </div>

    <!-- Inventario en el dashboard -->
    <?php
    $sql = "SELECT h.idHerramienta, h.nombre, h.cantidadDisponible, c.nombre AS categoria, e.nombre AS estado
            FROM herramientas h
            JOIN categorias c ON h.idcategoria = c.idcategoria
            JOIN estados e ON h.idEstado = e.idEstado";
    $result = $conn->query($sql);
    ?>
    <div class="card inventory" style="margin-top:32px;">
        <h3>Inventario</h3>
        <table style="width:100%; border-collapse:collapse; margin-top:18px;">
            <tr><th>ID</th><th>Herramienta</th><th>Categoría</th><th>Stock</th><th>Estado</th></tr>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['idHerramienta'] ?></td>
                        <td><?= $row['nombre'] ?></td>
                        <td><?= $row['categoria'] ?></td>
                        <td><?= $row['cantidadDisponible'] ?></td>
                        <td><?= $row['estado'] ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="5">No hay ítems registrados</td></tr>
            <?php endif; ?>
        </table>
        <a href="../inventario/list.php" class="btn" style="margin-top:12px;">Ver inventario completo</a>
    </div>
</div>

<?php include("../includes/footer.php"); ?>

