<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../public/login.php");
    exit();
}
// ...sin conexión a base de datos...
$id = $_GET['id'] ?? 1;
// Datos simulados
$item = [
    'nombre' => 'Ítem' . $id,
    'cantidad' => 1
];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<script>alert('Ítem editado correctamente (simulado)'); window.location='list.php';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Editar Ítem</title>
    <link rel="stylesheet" type="text/css" href="estiloInventario.css">
</head>
<body>
<div class="container">
    <h2>Editar Ítem</h2>
    <form method="post">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="<?= $item['nombre'] ?>" required>
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" value="<?= $item['cantidad'] ?>" required>
        </div>
        <button type="submit">Actualizar</button>
    </form>
    <a href="list.php" class="back-btn">Volver</a>
</div>
</body>
</html>
