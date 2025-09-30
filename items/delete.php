<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../public/login.php");
    exit();
}
$id = $_GET['id'] ?? 1;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<script>alert('Ítem eliminado correctamente (simulado)'); window.location='list.php';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Eliminar Ítem</title>
    <link rel="stylesheet" type="text/css" href="estiloItem.css">
</head>
<body>
<div class="container">
    <h2>¿Seguro que deseas eliminar el ítem #<?= $id ?>?</h2>
    <form method="post">
        <button type="submit" class="btn" style="background:#d32f2f;">Eliminar</button>
        <a href="list.php" class="btn back-btn">Cancelar</a>
    </form>
</div>
</body>
</html>
