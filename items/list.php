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
    <style>
        body { background: #f4f6f8; font-family: Arial, sans-serif; }
        .container { max-width: 700px; margin: 40px auto; background: #fff; border-radius: 10px; box-shadow: 0 4px 16px rgba(0,0,0,0.08); padding: 32px; }
        h2 { color: #1976d2; text-align: center; margin-bottom: 24px; }
        table { width: 100%; border-collapse: collapse; margin-top: 18px; }
        th, td { padding: 12px; border-bottom: 1px solid #e0e0e0; text-align: center; }
        th { background: #e3f2fd; color: #1976d2; }
        tr:last-child td { border-bottom: none; }
        a.btn { background: #1976d2; color: #fff; padding: 6px 14px; border-radius: 5px; text-decoration: none; margin: 0 2px; transition: background 0.2s; }
        a.btn:hover { background: #1565c0; }
        .add-btn { display: inline-block; margin-bottom: 12px; background: #43a047; }
        .add-btn:hover { background: #388e3c; }
        .back-btn { margin-top: 18px; background: #757575; }
        .back-btn:hover { background: #424242; }
    </style>
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
