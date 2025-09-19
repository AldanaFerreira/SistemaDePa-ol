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
    // no está logueado: redirigir a login
    header('Location: ../../login/auth/login.php');
    exit();
}
include("../includes/header.php");

// Datos simulados
$totalUsuarios = 1;
$totalItems = 5;
$totalPrestamos = 2;
// resto del dashboard...
?>
<h2>Bienvenido, <?php echo $_SESSION['usuario']; ?> 👋</h2>

<div style="display:flex; gap:20px; margin-top:20px; flex-wrap:wrap;">
    <div style="flex:1; min-width:200px; background:#fff; padding:20px; border-radius:8px; box-shadow:0 2px 6px rgba(0,0,0,0.1);">
        <h3>Usuarios</h3>
        <p style="font-size:28px; font-weight:bold;"><?= $totalUsuarios ?></p>
        <a href="../usuarios/list.php" class="btn">Ver usuarios</a>
    </div>

    <div style="flex:1; min-width:200px; background:#fff; padding:20px; border-radius:8px; box-shadow:0 2px 6px rgba(0,0,0,0.1);">
        <h3>Ítems</h3>
        <p style="font-size:28px; font-weight:bold;"><?= $totalItems ?></p>
        <a href="../items/list.php" class="btn">Ver ítems</a>
    </div>

    <div style="flex:1; min-width:200px; background:#fff; padding:20px; border-radius:8px; box-shadow:0 2px 6px rgba(0,0,0,0.1);">
        <h3>Préstamos</h3>
        <p style="font-size:28px; font-weight:bold;"><?= $totalPrestamos ?></p>
        <a href="../prestamos/list.php" class="btn">Ver préstamos</a>
    </div>
</div>

<?php include("../includes/footer.php"); ?>

