<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../public/login.php");
    exit();
}
// Simulación de obtención de datos
$id = $_GET['id'] ?? null;
$item = ["id" => $id, "herramienta" => "Martillo", "categoria" => "Manuales", "stock" => 10, "estado" => "Disponible"];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Aquí iría la lógica para guardar los cambios
    header("Location: list.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Editar Inventario</title>
    <link rel="stylesheet" type="text/css" href="estiloInventario.css">
</head>
<body>
<div class="container">
    <h2>Editar Inventario</h2>
    <form method="post">
        <div class="form-group">
            <label for="herramienta">Herramienta</label>
            <input type="text" name="herramienta" id="herramienta" value="<?= htmlspecialchars($item['herramienta']) ?>" required>
        </div>
        <div class="form-group">
            <label for="categoria">Categoría</label>
            <input type="text" name="categoria" id="categoria" value="<?= htmlspecialchars($item['categoria']) ?>" required>
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" value="<?= htmlspecialchars($item['stock']) ?>" required>
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <input type="text" name="estado" id="estado" value="<?= htmlspecialchars($item['estado']) ?>" required>
        </div>
        <button type="submit">Guardar Cambios</button>
    </form>
    <a href="list.php" class="back-btn">Volver</a>
</div>
</body>
</html>
