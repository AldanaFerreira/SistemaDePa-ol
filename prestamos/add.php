<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../public/login.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<script>alert('Préstamo agregado correctamente (simulado)'); window.location='list.php';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Agregar Préstamo</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
<div class="container">
    <h2>Agregar Préstamo</h2>
    <form method="post">
        <div class="form-group">
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" id="usuario" required>
        </div>
        <div class="form-group">
            <label for="item">Ítem</label>
            <input type="text" name="item" id="item" required>
        </div>
        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" id="fecha" required>
        </div>
        <button type="submit">Guardar</button>
    </form>
    <a href="list.php" class="back-btn">Volver</a>
</div>
</body>
</html>
