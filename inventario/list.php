<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../public/login.php");
    exit();
}
// Datos simulados de inventario
$inventario = [
    ["id" => 1, "herramienta" => "Martillo", "categoria" => "Manuales", "stock" => 10, "estado" => "Disponible"],
    ["id" => 2, "herramienta" => "Pinza", "categoria" => "Manuales", "stock" => 5, "estado" => "En uso"],
    ["id" => 3, "herramienta" => "Taladro", "categoria" => "Eléctricas", "stock" => 2, "estado" => "Mantenimiento"],
];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Inventario - Pañol</title>
    <link rel="stylesheet" type="text/css" href="estiloInventario.css">
</head>
<body>
<div class="container">
    <h2>Inventario</h2>
    <a href="add.php" class="btn add-btn">Agregar ítem</a>
    <table>
        <tr><th>ID</th><th>Herramienta</th><th>Categoría</th><th>Stock</th><th>Estado</th><th>Acciones</th></tr>
        <?php foreach($inventario as $item): ?>
            <tr>
                <td><?= $item['id'] ?></td>
                <td><?= $item['herramienta'] ?></td>
                <td><?= $item['categoria'] ?></td>
                <td><?= $item['stock'] ?></td>
                <td><?= $item['estado'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $item['id'] ?>" class="btn">Editar</a>
                    <a href="delete.php?id=<?= $item['id'] ?>" class="btn" onclick="return confirm('¿Seguro que deseas eliminar este ítem?');">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="../public/dashboard.php" class="btn back-btn">Volver al Dashboard</a>
</div>
</body>
</html>
