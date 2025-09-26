<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../public/login.php");
    exit();
}
// ...sin conexión a base de datos...

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Simular guardado y redirigir
    echo "<script>alert('Ítem agregado correctamente (simulado)'); window.location='list.php';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Agregar Ítem</title>
    <link rel="stylesheet" type="text/css" href="estiloItem.css">
</head>
<body>
<div class="container">
    <h2>Agregar Ítem</h2>
    <form method="post">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" required>
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" required>
        </div>
        <button type="submit">Guardar</button>
    </form>
    <a href="list.php" class="back-btn">Volver</a>
</div>
</body>
</html>
