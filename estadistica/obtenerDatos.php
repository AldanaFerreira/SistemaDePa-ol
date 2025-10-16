<?php
require_once '../db/db.php';

$sql = "SELECT 
            c.nombre AS categoria,
            SUM(h.cantidadDisponible) AS cantidad
        FROM herramientas h
        INNER JOIN categorias c ON h.idCategoria = c.idCategoria
        GROUP BY c.nombre";
$result = $conn->query($sql);

$datos = [];
while ($row = $result->fetch_assoc()) {
    $datos[] = $row;
}

echo json_encode($datos);
?>
