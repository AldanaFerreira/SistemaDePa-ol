<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../public/login.php");
    exit();
}
$id = $_GET['id'] ?? null;
if ($id) {
    // Aquí iría la lógica para eliminar el ítem
    header("Location: list.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Eliminar Inventario</title>
    <link rel="stylesheet" type="text/css" href="estiloInventario.css">
</head>
<body>
<div class="container">
    <h2>Eliminar Inventario</h2>
    <p>El ítem ha sido eliminado correctamente.</p>
    <a href="list.php" class="back-btn">Volver</a>
</div>
</body>
</html>
