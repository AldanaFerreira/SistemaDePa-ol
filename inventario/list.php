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

// Traer herramientas con categoría y estado
$sql = "SELECT h.idHerramienta, h.nombre, h.cantidadDisponible, 
               c.nombre AS categoria, e.nombre AS estado
        FROM herramientas h
        JOIN categorias c ON h.idcategoria = c.idcategoria
        JOIN estados e ON h.idEstado = e.idEstado";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Herramientas</title>
<link rel="stylesheet" href="../datatables/css/bootstrap.min.css">
<link rel="stylesheet" href="../datatables/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="../datatables/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="../datatables/css/Style.css">
    <script   type="text/javascript" src="./js/ScriptsGroup.js"></script> 
	

<link href="../inventario/estiloInventario.css" rel="stylesheet" type="text/css">
 
</head>
<body>
<div class="container">
    <h2>Lista de Herramientas</h2>
    <table id="herramientas" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Categoría</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['idHerramienta'] ?></td>
                        <td><?= $row['nombre'] ?></td>
                        <td><?= $row['cantidadDisponible'] ?></td>
                        <td><?= $row['categoria'] ?></td>
                        <td><?= $row['estado'] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['idHerramienta'] ?>" class="btn">Editar</a>
                            <a href="delete.php?id=<?= $row['idHerramienta'] ?>" class="btn" onclick="return confirm('¿Seguro que deseas eliminar este ítem?');">Eliminar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="6">No hay ítems registrados</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
    <a href="../public/dashboard.php" class="btn back-btn">Volver al Incio</a>
</div>



<script src="../datatables/js/jquery-3.5.1.js"></script>
<script src="../datatables/js/jquery.dataTables.min.js"></script>
<script src="../datatables/js/dataTables.buttons.min.js"></script>
<script src="../datatables/js/jszip.min.js"></script>
<script src="../datatables/js/pdfmake.min.js"></script>
<script src="../datatables/js/vfs_fonts.js"></script>
<script src="../datatables/js/buttons.html5.min.js"></script>
<script src="../datatables/js/buttons.print.min.js"></script>


<script>
$(document).ready(function() {
    $('#herramientas').DataTable({
        dom: 'Blfrtip',            // muestra botones arriba
        buttons: [
            { extend: 'copy', className: 'btn btn-sm btn-primary' },
            { extend: 'excel',className: 'btn btn-sm btn-primary' },
            { extend: 'pdf',  className: 'btn btn-sm btn-primary' },
            { extend: 'print',className: 'btn btn-sm btn-primary' }
        ],
        language: {
            search: "Buscar:",
            lengthMenu: "Mostrar _MENU_ ítems por página",
            zeroRecords: "No se encontraron ítems",
            info: "Mostrando página _PAGE_ de _PAGES_",
            infoEmpty: "No hay ítems disponibles",
            infoFiltered: "(filtrado de _MAX_ ítems totales)",
            paginate: {
                first: "Primera",
                last: "Última",
                next: "Siguiente",
                previous: "Anterior"
            }
        }
    });
});
</script>

</body>
</html>
