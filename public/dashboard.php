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
    header('Location: ../../login/auth/login.php');
    exit();
}
// Datos simulados
$totalUsuarios = 1;
$totalItems = 5;
$totalPrestamos = 2;
// resto del dashboard...
?>
<link rel="stylesheet" type="text/css" href="dashboard_menu.css">
<div class="sidebar">
    <h2 style="margin-bottom: 10px;">Sistema Pañol</h2>
    <h3 style="margin-bottom: 32px;">Menú</h3>
    <a href="../items/list.php">Ítems</a>
    <a href="../prestamos/list.php">Préstamos</a>
    <a href="../inventario/list.php">Inventario</a>
    <a href="../usuarios/list.php">Usuarios</a>
    <a href="../login/auth/login.html">Cerrar sesión</a>
    
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
        <div class="card" style="margin-top:32px;">
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

