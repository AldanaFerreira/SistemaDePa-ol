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


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if(isset($_POST['nombre'], $_POST['cantidadDisponible'], $_POST['idcategoria'], $_POST['ubicacion'])) {
        $nombre = $_POST['nombre'];
        $cantidadDisponible = $_POST['cantidadDisponible'];
        $idcategoria = $_POST['idcategoria'];
        $ubicacion = $_POST['ubicacion'];

        // Valores por defecto
        $stockMinimo = 1; // Puedes cambiar este valor si lo necesitas
        $fechaActualizacion = date('Y-m-d H:i:s');
        $cantidadReservada = 0;
        $estado = ''; // Si no usas este campo, puedes omitirlo

        // 1. Insertar en herramientas (sin ubicacion)
        $sql = "INSERT INTO herramientas (nombre, cantidadDisponible, idcategoria, stockMinimo, fechaActualizacion) 
                VALUES ('$nombre', '$cantidadDisponible', '$idcategoria', '$stockMinimo', '$fechaActualizacion')";

        if ($conn->query($sql) === TRUE) {
            // 2. Obtener el idHerramienta recién creado
            $idHerramienta = $conn->insert_id;

            // 3. Insertar en stock la ubicación y cantidad
            $sqlStock = "INSERT INTO stock (idHerramienta, cantidadDisponible, cantidadReservada, stockMinimo, ubicacion, fechaActualizacion) 
                         VALUES ('$idHerramienta', '$cantidadDisponible', '$cantidadReservada', '$stockMinimo', '$ubicacion', '$fechaActualizacion')";
            $conn->query($sqlStock);

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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


<div class="form-container">
    <div class="menu-button">
        <a href="../public/dashboard.php" class="menu-link">
            <i class="fas fa-bars"></i> Menú
        </a>
    </div>

<div class="container">
    <h2>Agregar Herramientas</h2>
    <form method="post">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" required>
        </div>

        <div class="form-group">
            <label for="cantidadDisponible">Cantidad</label>
            <input type="number" name="cantidadDisponible" id="cantidadDisponible" min="1" required>
        </div>

        
        <div class="form-group">
            <label for="ubicacion">Ubicación</label>
            <input type="text" name="ubicacion" id="ubicacion" required>
        </div>

        <div class="form-group  categoria-center">
            <label for="idcategoria">Categoría</label>
            <select name="idcategoria" id="idcategoria" required>
                <?php while ($row = $categorias->fetch_assoc()) { ?>
                    <option value="<?= $row['idcategoria'] ?>"><?= $row['nombre'] ?></option>
                <?php } ?>
            </select>
        </div>


        <button type="submit">Guardar</button>
    </form>

</div>
