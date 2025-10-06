<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once '../db/db.php';

$mensaje = "";

// Validar ID
if (!isset($_GET['idHerramienta'])) {
    die("ID de producto no especificado.");
}

$id = $_GET['idHerramienta'];

// Si se envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $cantidadDisponible = $_POST['cantidadDisponible'];
    $idcategoria = $_POST['idcategoria'];
    $ubicacion = $_POST['ubicacion'];

    $sqlUpdate = "UPDATE herramientas SET nombre = ?, cantidadDisponible = ?, idcategoria = ?, ubicacion = ? WHERE idHerramienta = ?";
    $stmt = $conn->prepare($sqlUpdate);
    $stmt->bind_param("sdssi", $nombre, $cantidadDisponible, $idcategoria, $ubicacion, $id);

    if ($stmt->execute()) {
        $mensaje = "<p style='color:green;'>Herramienta actualizada correctamente.</p>";
    } else {
        $mensaje = "<p style='color:red;'>Error al actualizar la herramienta: " . $conn->error . "</p>";
    }
}

// Traer datos actualizados de la herramienta
$sql = "SELECT * FROM herramientas WHERE idHerramienta = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$herramienta = $stmt->get_result()->fetch_assoc();

if (!$herramienta) {
    die("Herramienta no encontrada.");
}

// Traer categorías
$categorias = $conn->query("SELECT idcategoria, nombre FROM categorias");
?>

<link rel="stylesheet" type="text/css" href="estiloInventario.css">

<h2>Editar Herramienta</h2>
<?= $mensaje ?>

<form method="post">
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="<?= $herramienta['nombre'] ?>" required>
    </div>

    <div class="form-group">
        <label for="cantidadDisponible">Cantidad</label>
        <input type="number" name="cantidadDisponible" id="cantidadDisponible" min="1" value="<?= $herramienta['cantidadDisponible'] ?>" required>
    </div>

    <div class="form-group">
        <label for="ubicacion">Ubicación</label>
        <input type="text" name="ubicacion" id="ubicacion" value="<?= $herramienta['ubicacion'] ?>" required>
    </div>

    <div class="form-group categoria-center">
        <label for="idcategoria">Categoría</label>
        <select name="idcategoria" id="idcategoria" required>
            <?php while ($row = $categorias->fetch_assoc()) { ?>
                <option value="<?= $row['idcategoria'] ?>" <?= $row['idcategoria'] == $herramienta['idcategoria'] ? 'selected' : '' ?>>
                    <?= $row['nombre'] ?>
                </option>
            <?php } ?>
        </select>
    </div>

    <button type="submit">Guardar cambios</button>
    <a href="../items/add.php">Volver</a>
</form>
