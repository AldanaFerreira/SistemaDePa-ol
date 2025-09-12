<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../public/login.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<script>alert('Préstamo eliminado correctamente (simulado)'); window.location='list.php';</script>";
    exit();
}
$id = $_GET['id'] ?? 1;
?>
<!DOCTYPE html>
<html>
<head><title>Eliminar Préstamo</title></head>
<body>
<h2>¿Seguro que deseas eliminar el préstamo #<?= $id ?>?</h2>
<form method="post">
    <button type="submit">Eliminar</button>
    <a href="list.php">Cancelar</a>
</form>
</body>
</html>
