<?php
// Página de selección de reportes
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: ../login/auth/login.html');
    exit();
}
require_once '../db/db.php';

?>
<!DOCTYPE html>
<html>
<head>
    <title>Reportes</title>
    <link rel="stylesheet" href="../inventario/estiloInventario.css">
    <link rel="stylesheet" href="css/reportes.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

    <div class="reportes-form">
        <h2>Generar Reporte</h2>
        <form method="GET" action="" id="formReporte">
            <label for="fecha">Fecha del reporte:</label>
            <input type="date" name="fecha" id="fecha">

            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion" rows="3" ></textarea>

            <!-- Botones corregidos -->
            <div class="actions" id="accionesReporte">
                <button type="submit" class="btn" id="verReporte" name="ver" value="1">
                    Ver reporte
                </button>
                <button type="button" class="btn" id="descargarReporteBtn">
                    <i class="fas fa-download"></i> Descargar
                </button>
            </div>
        </form>

        <br>

        <?php
        // Mostrar reporte solo si se presionó el botón 'Ver reporte'
        if (isset($_GET['ver']) && $_GET['ver'] == '1') {
            $fechaReporte = isset($_GET['fecha']) && $_GET['fecha'] ? $_GET['fecha'] : date('Y-m-d');
            $descripcion = isset($_GET['descripcion']) ? htmlspecialchars($_GET['descripcion']) : '';
            echo '<div id="reporteDatos" class="reporte-estetico">';
            echo '<h2 class="reporte-titulo">Reporte generado</h2>';
            echo '<table id="reporteDatosTable" class="display" style="width:100%;margin-top:20px;">';
            echo '<thead><tr><th>Campo</th><th>Valor</th></tr></thead><tbody>';
            echo '<tr><td>Fecha</td><td>' . date('d/m/Y', strtotime($fechaReporte)) . '</td></tr>';
            echo '<tr><td>Descripción</td><td>' . nl2br($descripcion) . '</td></tr>';
            echo '</tbody></table>';
            echo '</div>';
        }
        ?>

        <!-- Botón menú -->
        <div class="form-container">
            <div class="menu-button">
                <a href="../public/dashboard.php" class="menu-link">
                    <i class="fas fa-bars"></i> Menú
                </a>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.7.0/jspdf.plugin.autotable.min.js"></script>
    <script>
    $(document).ready(function() {
        // Mostrar u ocultar el botón dependiendo si existe el reporte
        if ($('#reporteDatosTable').length) {
            $('#descargarReporteBtn').show();
        } else {
            $('#descargarReporteBtn').hide();
        }

        $('#descargarReporteBtn').on('click', function() {
            var doc = new jspdf.jsPDF();
            var rows = [];

            $('#reporteDatosTable tbody tr').each(function() {
                var cols = [];
                $(this).find('td').each(function() {
                    cols.push($(this).text());
                });
                rows.push(cols);
            });

            doc.text('Reporte generado', 10, 10);
            doc.autoTable({
                head: [['Campo', 'Valor']],
                body: rows,
                startY: 20
            });
            doc.save('reporte.pdf');
        });
    });
    </script>

</body>
</html>
