<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

require_once '../modelo/Herramienta.php';
require_once '../modelo/Categoria.php';
require_once '../modelo/Estado.php';
require_once '../db/db.php';

// Traer categorías y estados para mostrar en los select
$categorias = $conn->query("SELECT * FROM categorias");
$estados = $conn->query("SELECT * FROM estados");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validar que los campos existen
    if(isset($_POST['nombre'], $_POST['descripcion'], $_POST['cantidadDisponible'], $_POST['idcategoria'], $_POST['idEstado'])) {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $cantidadDisponible = $_POST['cantidadDisponible'];
        $idcategoria = $_POST['idcategoria'];
        $idEstado = $_POST['idEstado'];

        // Preparar la consulta para evitar problemas de tipo
        $sql = "INSERT INTO herramientas (idEstado, nombre, descripcion, cantidadDisponible, idcategoria) 
                VALUES ('$idEstado', '$nombre', '$descripcion', '$cantidadDisponible', '$idcategoria')";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../inventario/list.php");
            exit;
        } else {
            echo "Error al guardar la herramienta: " . $conn->error;
        }
    } else {
        echo "Faltan campos obligatorios.";
    }
}
?>
<link rel="stylesheet" type="text/css" href="estiloItem.css">

<div class="container">
    <h2>Agregar Herramientas</h2>
    <form method="post">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" name="descripcion" id="descripcion">
        </div>

        <div class="form-group">
            <label for="cantidadDisponible">Cantidad</label>
            <input type="number" name="cantidadDisponible" id="cantidadDisponible" min="1" required>
        </div>

        <div class="form-group">
            <label for="idcategoria">Categoría</label>
            <select name="idcategoria" id="idcategoria" required>
                <?php while ($row = $categorias->fetch_assoc()) { ?>
                    <option value="<?= $row['idcategoria'] ?>"><?= $row['nombre'] ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="idEstado">Estado</label>
            <select name="idEstado" id="idEstado" required>
                <?php while ($row = $estados->fetch_assoc()) { ?>
                    <option value="<?= $row['idEstado'] ?>"><?= $row['nombre'] ?></option>
                <?php } ?>
            </select>
        </div>

        <button type="submit">Guardar</button>
    </form>
    <a href="../public/dashboard.php" class="back-btn">Volver al Dashboard</a>
</div>
