<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../login/auth/login.html");
    exit();
}

require_once '../db/db.php';

// 1️⃣ Stock total por categoría
$sqlStock = "
    SELECT c.nombre AS categoria, SUM(s.cantidadDisponible) AS total
    FROM stock s
    INNER JOIN herramientas h ON s.idHerramienta = h.idHerramienta
    INNER JOIN categorias c ON h.idCategoria = c.idCategoria
    GROUP BY c.nombre
";
$resultadoStock = $conn->query($sqlStock);

$categorias = [];
$stockCategorias = [];
$totalStock = 0;

while ($fila = $resultadoStock->fetch_assoc()) {
    $categorias[] = $fila['categoria'];
    $stockCategorias[] = (int)$fila['total'];
    $totalStock += (int)$fila['total'];
}

// 2️⃣ Tendencia de consumo mensual (según fechaActualizacion)
$meses = [];
$consumo = [];

$sqlConsumo = "
    SELECT MONTH(fechaActualizacion) AS mes, SUM(cantidadDisponible) AS total
    FROM stock
    WHERE fechaActualizacion IS NOT NULL
    GROUP BY MONTH(fechaActualizacion)
    ORDER BY MONTH(fechaActualizacion)
";
$resultadoConsumo = $conn->query($sqlConsumo);

while ($fila = $resultadoConsumo->fetch_assoc()) {
    $mesNum = (int)$fila['mes'];
    $meses[] = date('M', mktime(0,0,0,$mesNum,1)); // Convierte 1..12 a Ene..Dic
    $consumo[] = (int)$fila['total'];
}

// Convertir a JSON para JS
$categoriasJSON = json_encode($categorias);
$stockJSON = json_encode($stockCategorias);
$mesesJSON = json_encode($meses);
$consumoJSON = json_encode($consumo);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <div class="form-container">
    <div class="menu-button">
        <a href="../public/dashboard-jefe.php" class="menu-link">
            <i class="fas fa-bars"></i> Menú
        </a>
    </div>
    <meta charset="UTF-8">
    <title>Estadísticas</title>
    <link rel="stylesheet" href="estadistica.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div class="contenedor">
    <div class="header">
        <h2>📊 Estadísticas</h2>
    </div>

    <div class="tarjetas">
        <div class="tarjeta grande">
            <h3>Stock total disponible</h3>
            <p class="numero"><?php echo $totalStock; ?></p>
        </div>

        <div class="tarjeta">
            <h3>Categorías de stock</h3>
            <?php 
            for ($i=0; $i < count($categorias); $i++): 
                $porcentaje = $totalStock > 0 ? ($stockCategorias[$i]/$totalStock)*100 : 0;
            ?>
            <div class="barra">
                <label><?php echo $categorias[$i]; ?></label>
                <div class="barra-progreso">
                    <div style="width: <?php echo $porcentaje; ?>%"></div>
                </div>
            </div>
            <?php endfor; ?>
        </div>

        <div class="tarjeta">
            <h3>Distribución de stock</h3>
            <canvas id="graficoCircular"></canvas>
        </div>

        <div class="tarjeta">
            <h3>Tendencia de consumo mensual</h3>
            <canvas id="graficoLinea"></canvas>
        </div>
    </div>
</div>

<script>
    const categorias = <?php echo $categoriasJSON; ?>;
    const stockCategorias = <?php echo $stockJSON; ?>;
    const meses = <?php echo $mesesJSON; ?>;
    const consumo = <?php echo $consumoJSON; ?>;
</script>
<script src="estadistica.js"></script>
</body>
</html>
