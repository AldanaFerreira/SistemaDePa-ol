<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 'jefe') {
    header('Location: ../login/auth/login.html');
    exit();
}

require_once '../db/db.php'; // Archivo con la conexión a la BD

// Marcar mantenimiento como realizado
if(isset($_POST['realizado'])){
    $id = $_POST['idMantenimiento'];
    $stmt = $conn->prepare("UPDATE mantenimiento SET estado='realizado' WHERE idMantenimiento=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

// Borrar mantenimiento
if(isset($_POST['borrar'])){
    $id = $_POST['idMantenimiento'];
    $stmt = $conn->prepare("DELETE FROM mantenimiento WHERE idMantenimiento=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

// Obtener herramientas en mantenimiento
$result = $conn->query("
    SELECT m.idMantenimiento, s.idHerramienta, h.nombre AS nombreHerramienta, m.fechaEnvio, m.estado
    FROM mantenimiento m
    JOIN stock s ON m.idHerramienta = s.idHerramienta
    JOIN herramientas h ON s.idHerramienta = h.idHerramienta
    WHERE m.estado='pendiente'
    ORDER BY m.fechaEnvio ASC
");

// Contar herramientas pendientes para correo
$herramientasPendientes = $result->num_rows;
$listaHerramientas = [];
while($row = $result->fetch_assoc()){
    $listaHerramientas[] = $row;
}

// Enviar correo si hay más de 3 pendientes
if($herramientasPendientes >= 3){
    $to = "jefe@empresa.com";
    $subject = "Mantenimiento pendiente de herramientas";
    $body = "Las siguientes herramientas necesitan mantenimiento:\n\n";
    foreach($listaHerramientas as $h){
        $body .= "- " . $h['nombreHerramienta'] . " (enviado: " . $h['fechaEnvio'] . ")\n";
    }
    $headers = "From: sistema@empresa.com";
    mail($to, $subject, $body, $headers);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Mantenimiento de Herramientas</title>
<link rel="stylesheet" href="estiloMantenimiento.css">
<!-- FontAwesome para iconos -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<h1>Herramientas en Mantenimiento</h1>

<div class="contenedor-tarjetas">
<?php foreach($listaHerramientas as $h): ?>
<div class="tarjeta">
    <h3><?= $h['nombreHerramienta'] ?></h3>
    <p><strong>Fecha envío:</strong> <?= $h['fechaEnvio'] ?></p>
    <p><strong>Estado:</strong> <?= $h['estado'] ?></p>
    <div class="botones">
        <form method="post" style="display:inline">
            <input type="hidden" name="idMantenimiento" value="<?= $h['idMantenimiento'] ?>">
            <button type="submit" name="realizado" class="realizado">
                <i class="fa-solid fa-check"></i> Realizado
            </button>
        </form>
        <form method="post" style="display:inline">
            <input type="hidden" name="idMantenimiento" value="<?= $h['idMantenimiento'] ?>">
            <button type="submit" name="borrar" class="borrar">
                <i class="fa-solid fa-trash"></i> Borrar
            </button>
        </form>
    </div>
</div>
<?php endforeach; ?>
</div>

<div class="volver-container">
    <a href="../public/dashboard-jefe.php"><button class="volver"><i class="fa-solid fa-arrow-left"></i> Volver al Dashboard</button></a>
</div>

</body>
</html>
