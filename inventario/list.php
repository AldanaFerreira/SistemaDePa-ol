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
// $sql = "SELECT h.idHerramienta, h.nombre, h.cantidadDisponible, 
//                c.nombre AS categoria, h.ubicacion
//         FROM herramientas h
//         JOIN categorias c ON h.idcategoria = c.idcategoria";

$sql = "SELECT h.idHerramienta, h.nombre, h.cantidadDisponible,
       c.nombre AS categoria, e.nombre AS estado, s.ubicacion
FROM herramientas h
JOIN categorias c ON h.idcategoria = c.idcategoria
LEFT JOIN estados e ON h.idEstado = e.idEstado
LEFT JOIN stock s ON h.idHerramienta = s.idHerramienta";

// Ejecutar la consulta y guardar el resultado
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>

<div class="form-container">
    <div class="menu-button">
        <a href="../public/dashboard.php" class="menu-link">
            <i class="fas fa-bars"></i> Menú
        </a>
    </div>

    <title>Herramientas</title>
<link rel="stylesheet" href="../datatables/css/bootstrap.min.css">
<link rel="stylesheet" href="../datatables/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="../datatables/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="../datatables/css/Style.css">
    <script   type="text/javascript" src="./js/ScriptsGroup.js"></script> 
	

<link href="../inventario/estiloInventario.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
 
</head>
<body>
<div class="container">
    <h2>Inventario Ciclo Básico</h2>
    <table id="herramientas" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Categoría</th>
                <th>Ubicación</th>
                <th>Estados</th>
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
                        <td><?= $row['ubicacion'] ?></td>
                        <td><?= $row['estado'] ?></td>
                    <td>


                       <form action="edit.php" method="post" style="display:inline;">
                            <input type="hidden" name="idHerramienta" value="<?= $row['idHerramienta'] ?>">
                            <button type="submit" class="btn-editar">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                        

                        <form action="delete.php" method="post" style="display:inline;" onsubmit="return confirm('¿Seguro que deseas eliminar este ítem?');">
                            <input type="hidden" name="idHerramienta" value="<?= $row['idHerramienta'] ?>">
                            <button type="submit" name="eliminar" class="btn-eliminar">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>

                        <!-- Botones adicionales -->
                        <button class='btn btn-warning' onclick='enviarAMantenimiento(<?= $row['idHerramienta'] ?>)'>
                            <i class='fa fa-wrench'></i>
                        </button>
                        <button class='btn btn-secondary' onclick='darDeBaja(<?= $row['idHerramienta'] ?>)'>
                            <i class='fa fa-arrow-down'></i>
                        </button>
                    </td>

                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="6">No hay herramientas registrados</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
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
// $(document).ready(function() {
//     $('#herramientas').DataTable({
//         dom: 'Blfrtip',            // muestra botones arriba
//         buttons: [
//             {
//                 extend: 'collection',
//                 text: '<i class="fas fa-download"></i> ',
//                 buttons: [
//                     { extend: 'copy', text: 'Copiar' },
//                     { extend: 'excel', text: 'Excel' },
//                     { extend: 'pdf', text: 'PDF' },
//                     { extend: 'print', text: ' Imprimir' }
//                 ]
//             }
//         ],
//         language: {
//             search: "Buscar:",
//             lengthMenu: "Mostrar MENU herramientas por página",
//             zeroRecords: "No se encontraron herramientas",
//             info: "Mostrando página PAGE de PAGES",
//             infoEmpty: "No hay herramientas disponibles",
//             infoFiltered: "(filtrado de MAX herramientas totales)",
//             paginate: {
//                 first: "Primera",
//                 last: "Última",
//                 next: "Siguiente",
//                 previous: "Anterior"
//             }
//         }
//     });
// });
</script>
<script>
$(document).ready(function() {
    $('#herramientas').DataTable({
        
        dom: '<"row mb-3"<"col-md-6 d-flex align-items-center"f><"col-md-6 text-end"B>>' +
             'rt' +
             '<"row mt-3"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 text-end"p>>',
        buttons: [
            {
                extend: 'collection',
                text: '<i class="fas fa-download"></i>',
                className: 'btn btn-primary',
                buttons: [
                    { extend: 'copy', text: 'Copiar' },
                    { extend: 'excel', text: 'Excel' },
                    { extend: 'pdf', text: 'PDF' },
                    { extend: 'print', text: 'Imprimir' }
                ]
            }
        ],
        language: {
            search: "Buscar:",
            lengthMenu: "Mostrar MENU herramientas por página",
            zeroRecords: "No se encontraron herramientas",
            info: "Mostrando página PAGE de PAGES",
            infoEmpty: "No hay herramientas disponibles",
            infoFiltered: "(filtrado de MAX herramientas totales)",
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