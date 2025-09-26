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
   <link rel="stylesheet" type="text/css" href="estilo.css">  
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
    <div class="acciones-btns">
            <button type="submit" class="btn">Guardar Cambios</button>
            <a href="delete.php?id=<?= $id ?>" class="btn" onclick="return confirm('¿Seguro que deseas eliminar este préstamo?');">Eliminar</a>
    <a href="../public/dashboard.php" class="btn back-btn">Volver al Dashboard</a>
        </div>
    </form>
</div>
</body>
</html>
