<?php
require_once '../db/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["eliminar"], $_POST["idHerramienta"])) {
    $id = intval($_POST["idHerramienta"]);

    $sqlDelete = "DELETE FROM herramientas WHERE idHerramienta = $id";
    if ($conn->query($sqlDelete) === TRUE) {

        // Reiniciar AUTO_INCREMENT si la tabla queda vacía
        $resultCheck = $conn->query("SELECT COUNT(*) AS total FROM herramientas");
        $rowCheck = $resultCheck->fetch_assoc();
        if ($rowCheck['total'] == 0) {
            $conn->query("ALTER TABLE herramientas AUTO_INCREMENT = 1");
        }

        header("Location: list.php?msg=eliminado");
        exit();
    } else {
        echo "Error al eliminar: " . $conn->error;
    }
}
?>

<!-- <!DOCTYPE html>
<html>
<head>
    <title>Eliminar Ítem</title>
    <link rel="stylesheet" type="text/css" href="estiloItem.css">
</head>
<body>
<div class="container">
    <h2>¿Seguro que deseas eliminar el ítem #?</h2>
    <form method="post">
        <button type="submit" class="btn" style="background:#d32f2f;">Eliminar</button>
        <a href="list.php" class="btn back-btn">Cancelar</a>
    </form>
</div>
</body>
</html> -->
