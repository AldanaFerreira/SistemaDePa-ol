<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../public/login.php");
    exit();
}

// Datos simulados
$usuarios = [
    ["id" => 1, "usuario" => "admin"],
    ["id" => 2, "usuario" => "usuario1"],
    ["id" => 3, "usuario" => "usuario2"],
];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Usuarios - Pañol</title>
    <link rel="stylesheet" type="text/css" href="usuario.css">
</head>
<body>
<div class="container">
    <h2>Lista de Usuarios</h2>
    <a href="add.php" class="btn add-btn">Agregar Usuario</a>
    <table>
        <tr><th>ID</th><th>Usuario</th><th>Acciones</th></tr>
        <?php foreach($usuarios as $row): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['usuario'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn">Editar</a>
                    <a href="delete.php?id=<?= $row['id'] ?>" class="btn" onclick="return confirm('¿Seguro que deseas eliminar este usuario?');">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="../public/dashboard.php" class="btn back-btn">Volver al Dashboard</a>
</div>
</body>
</html>
