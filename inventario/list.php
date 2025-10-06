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

// Traer herramientas con categoría 
$sql = "SELECT h.idHerramienta, 
               h.nombre, 
               h.cantidadDisponible, 
               h.ubicacion,
               c.nombre AS categoria
        FROM herramientas h
        JOIN categorias c ON h.idcategoria = c.idcategoria";

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
                        <td class="text-center">

                        <!-- Botón Editar -->
                        <a href="edit.php?id=<?= $row['idHerramienta'] ?>" 
                           class="btn-editar" title="Editar">
                            <i class="fas fa-pencil-alt"></i>
                        </a>

                        <!-- Botón Eliminar -->
                        <form method="post" action="delete.php" style="display:inline;">
                            <input type="hidden" name="idHerramienta" value="<?= $row['idHerramienta'] ?>">
                            <button type="submit" name="eliminar" class="btn-eliminar"
                                    onclick="return confirm('¿Seguro que deseas eliminar esta herramienta?');">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>

                        <!-- Botón Mantenimiento -->
                        <!-- <form method="post" action="mantenimiento.php" style="display:inline;">
                            <input type="hidden" name="idHerramienta" value="">
                            <button type="submit" name="mantenimiento" class="btn btn-warning btn-sm"
                                    onclick="return confirm('¿Enviar esta herramienta a mantenimiento?');">
                                <i class="fas fa-tools"></i>
                            </button>
                        </form> -->



                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="6">No hay ítems registrados</td></tr>
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
//             lengthMenu: "Mostrar _MENU_ herramientas por página",
//             zeroRecords: "No se encontraron herramientas",
//             info: "Mostrando página _PAGE_ de _PAGES_",
//             infoEmpty: "No hay herramientas disponibles",
//             infoFiltered: "(filtrado de _MAX_ herramientas totales)",
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
            lengthMenu: "Mostrar _MENU_ herramientas por página",
            zeroRecords: "No se encontraron herramientas",
            info: "Mostrando página _PAGE_ de _PAGES_",
            infoEmpty: "No hay herramientas disponibles",
            infoFiltered: "(filtrado de _MAX_ herramientas totales)",
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
