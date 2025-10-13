<?php
include '../db/db.php';
session_start();

// Verifica sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: ../login/auth/login.html");
    exit();
}

$idHerramienta = $_POST['idHerramienta'];
$observacion = $_POST['observacion'] ?? 'Sin observaciones';

// Insertar en mantenimiento
$stmt = $conn->prepare("
    INSERT INTO mantenimiento (idHerramienta, observacion, fechaEnvio, estado)
    VALUES (?, ?, NOW(), 'Pendiente')
");
$stmt->bind_param("is", $idHerramienta, $observacion);
$stmt->execute();

// Actualizar estado de la herramienta
$conn->query("
    UPDATE herramientas 
    SET estado = 'Mantenimiento', fechaActualizacion = NOW() 
    WHERE idHerramienta = $idHerramienta
");

header("Location: ../inventario/list.php?msg=Herramienta enviada a mantenimiento");
exit();
?>
