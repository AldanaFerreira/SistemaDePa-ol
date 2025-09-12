<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../public/login.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<script>alert('Préstamo editado correctamente (simulado)'); window.location='list.php';</script>";
    exit();
}
$id = $_GET['id'] ?? 1;
$usuario = "usuario" . $id;
$item = "Ítem" . $id;
$fecha = date('Y-m-d');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Editar Préstamo</title>
    <style>
        body { background: #f4f6f8; font-family: Arial, sans-serif; }
        .container { max-width: 400px; margin: 40px auto; background: #fff; border-radius: 10px; box-shadow: 0 4px 16px rgba(0,0,0,0.08); padding: 32px; }
        h2 { color: #1976d2; text-align: center; margin-bottom: 24px; }
        .form-group { margin-bottom: 18px; }
        label { display: block; margin-bottom: 6px; color: #555; }
        input[type="text"], input[type="date"] { width: 100%; padding: 8px 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; }
        button { width: 100%; padding: 10px; background: #1976d2; color: #fff; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; transition: background 0.2s; }
        button:hover { background: #1565c0; }
        .back-btn { display: block; margin-top: 18px; background: #757575; color: #fff; text-align: center; padding: 8px 0; border-radius: 5px; text-decoration: none; }
        .back-btn:hover { background: #424242; }
    </style>
</head>
<body>
<div class="container">
    <h2>Editar Préstamo</h2>
    <form method="post">
        <div class="form-group">
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" id="usuario" value="<?= $usuario ?>" required>
        </div>
        <div class="form-group">
            <label for="item">Ítem</label>
            <input type="text" name="item" id="item" value="<?= $item ?>" required>
        </div>
        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" id="fecha" value="<?= $fecha ?>" required>
        </div>
        <button type="submit">Guardar Cambios</button>
    </form>
    <a href="list.php" class="back-btn">Volver</a>
</div>
</body>
</html>
