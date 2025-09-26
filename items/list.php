<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../public/login.php");
    exit();
}

// Datos simulados
$items = [
    ["id" => 1, "nombre" => "Martillo", "cantidad" => 10],
    ["id" => 2, "nombre" => "Destornillador", "cantidad" => 15],
    ["id" => 3, "nombre" => "Pinza", "cantidad" => 8],
];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ítems - Pañol</title>
  <link rel="stylesheet" type="text/css" href="estiloItem.css">
</head>
<body>
<div class="container">
    <h2>Lista de Ítems</h2>
    <a href="add.php" class="btn add-btn">Agregar Ítem</a>
    <table>
        <tr><th>ID</th><th>Nombre</th><th>Cantidad</th><th>Acciones</th></tr>
        <?php foreach($items as $row): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nombre'] ?></td>
                <td><?= $row['cantidad'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn">Editar</a>
                    <a href="delete.php?id=<?= $row['id'] ?>" class="btn" onclick="return confirm('¿Seguro que deseas eliminar este ítem?');">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="../public/dashboard.php" class="btn back-btn">Volver al Dashboard</a>
</div>
</body>
</html>
