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
    <style>
        body { background: #f4f6f8; font-family: Arial, sans-serif; }
        .container { max-width: 400px; margin: 40px auto; background: #fff; border-radius: 10px; box-shadow: 0 4px 16px rgba(0,0,0,0.08); padding: 32px; }
        h2 { color: #1976d2; text-align: center; margin-bottom: 24px; }
        .form-group { margin-bottom: 18px; }
        label { display: block; margin-bottom: 6px; color: #555; }
        input[type="text"], input[type="number"] { width: 100%; padding: 8px 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; }
        button { width: 100%; padding: 10px; background: #1976d2; color: #fff; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; transition: background 0.2s; }
        button:hover { background: #1565c0; }
        .back-btn { display: block; margin-top: 18px; background: #757575; color: #fff; text-align: center; padding: 8px 0; border-radius: 5px; text-decoration: none; }
        .back-btn:hover { background: #424242; }
    </style>
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
