<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../public/login.php");
    exit();
}
// Datos simulados
$prestamos = [
    ["id" => 1, "usuario" => "admin", "item" => "Martillo", "fecha" => "2025-09-10"],
    ["id" => 2, "usuario" => "usuario1", "item" => "Pinza", "fecha" => "2025-09-09"],
];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Préstamos - Pañol</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
<div class="container">
    <h2>Lista de Préstamos</h2>
    <a href="add.php" class="btn add-btn">Agregar Préstamo</a>
    <table>
        <tr><th>ID</th><th>Usuario</th><th>Ítem</th><th>Fecha</th><th>Acciones</th></tr>
        <?php foreach($prestamos as $row): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['usuario'] ?></td>
                <td><?= $row['item'] ?></td>
                <td><?= $row['fecha'] ?></td>
                                <td>
                                    <div class="acciones-btns">
                                        <a href="edit.php?id=<?= $row['id'] ?>" class="btn">Editar</a>
                                        <a href="delete.php?id=<?= $row['id'] ?>" class="btn" onclick="return confirm('¿Seguro que deseas eliminar este préstamo?');">Eliminar</a>
                                    </div>
                                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="../public/dashboard.php" class="btn back-btn">Volver al Dashboard</a>
</div>
</body>
</html>
</body>
</html>
