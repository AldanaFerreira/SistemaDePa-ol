<?php
// Página de selección de reportes
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: ../login/auth/login.html');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Reportes</title>
    <link rel="stylesheet" href="../inventario/estiloInventario.css">
    <link rel="stylesheet" href="css/reportes.css">
</head>
<body>
    <div class="reportes-form">
        <h2>Generar Reporte</h2>
    <form method="GET" action="" id="formReporte">
            <label for="fecha">Fecha del reporte:</label>
            <input type="date" name="fecha" id="fecha">
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion" rows="3" style="width:100%;padding:10px;border-radius:8px;border:1px solid #3949ab;font-size:15px;"></textarea>
            <label for="formato">Formato de descarga:</label>
            <select name="formato" id="formato">
                <option value="pdf">PDF</option>
            </select>
            <div class="actions" id="accionesReporte">
                <button type="submit" class="btn" id="verReporte" name="ver" value="1">Ver reporte</button>
                <button type="button" class="btn" onclick="descargarArchivo()" id="descargarBtn">Descargar</button>
            </div>
        </form>
        <br>
        <?php
        // Descargar Excel si corresponde
        if (isset($_GET['descargar']) && $_GET['descargar'] === 'excel') {
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment; filename="reporte.xls"');
            echo '<h2>Reporte generado el ' . date('d/m/Y H:i') . '</h2>';
            if (isset($_GET['tipo']) && $_GET['tipo'] === 'inventario') {
                require_once '../db/db.php';
                $sql = "SELECT h.idHerramienta, h.nombre, h.cantidadDisponible, c.nombre AS categoria, e.nombre AS estado FROM herramientas h JOIN categorias c ON h.idcategoria = c.idcategoria JOIN estados e ON h.idEstado = e.idEstado";
                $result = $conn->query($sql);
                echo '<h3>Reporte de Inventario</h3>';
                echo '<table border="1">';
                echo '<thead><tr><th>ID</th><th>Nombre</th><th>Cantidad</th><th>Categoría</th><th>Estado</th></tr></thead><tbody>';
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['idHerramienta'] . '</td>';
                        echo '<td>' . $row['nombre'] . '</td>';
                        echo '<td>' . $row['cantidadDisponible'] . '</td>';
                        echo '<td>' . $row['categoria'] . '</td>';
                        echo '<td>' . $row['estado'] . '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="5">No hay ítems registrados</td></tr>';
                }
                echo '</tbody></table>';
            } elseif (isset($_GET['tipo']) && $_GET['tipo'] === 'prestamo') {
                echo '<h3>Reporte de Préstamos</h3>';
                $prestamos = [
                    ["id" => 1, "usuario" => "admin", "item" => "Martillo", "fecha" => "2025-09-10"],
                    ["id" => 2, "usuario" => "usuario1", "item" => "Pinza", "fecha" => "2025-09-09"],
                ];
                echo '<table border="1">';
                echo '<thead><tr><th>ID</th><th>Usuario</th><th>Ítem</th><th>Fecha</th></tr></thead><tbody>';
                foreach($prestamos as $row) {
                    echo '<tr>';
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td>' . $row['usuario'] . '</td>';
                    echo '<td>' . $row['item'] . '</td>';
                    echo '<td>' . $row['fecha'] . '</td>';
                    echo '</tr>';
                }
                echo '</tbody></table>';
            }
            exit();
        }
        // Mostrar reporte solo si se presionó el botón 'Ver reporte'
    if (isset($_GET['ver']) && $_GET['ver'] == '1') {
        $fechaReporte = isset($_GET['fecha']) && $_GET['fecha'] ? $_GET['fecha'] : date('Y-m-d');
        $descripcion = isset($_GET['descripcion']) ? htmlspecialchars($_GET['descripcion']) : '';
        echo '<div id="reporteDatos" class="reporte-estetico">';
        echo '<h2 class="reporte-titulo">Reporte generado</h2>';
        echo '<div class="reporte-info">Fecha del reporte: <strong>' . date('d/m/Y', strtotime($fechaReporte)) . '</strong></div>';
        echo '<div class="reporte-info">Descripción: <strong>' . nl2br($descripcion) . '</strong></div>';
        echo '</div>';
    }
        ?>
    <a href="../public/dashboard.php" class="btn volver-dashboard" id="volverDashboard">Volver al Dashboard</a>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
    // Ocultar botones al imprimir/exportar PDF
    function ocultarBotones(ocultar) {
        document.getElementById('accionesReporte').style.display = ocultar ? 'none' : 'flex';
        document.getElementById('volverDashboard').style.display = ocultar ? 'none' : 'inline-block';
    }
    function descargarArchivo() {
        var formato = document.getElementById('formato').value;
        if (formato === 'pdf') {
            ocultarBotones(true);
            window.print();
            setTimeout(function(){ ocultarBotones(false); }, 1000);
        } else if (formato === 'excel') {
            // Redirigir con parámetro para descargar Excel
            var params = new URLSearchParams(window.location.search);
            params.set('descargar', 'excel');
            window.location.search = params.toString();
        }
    }
    // El botón 'Ver reporte' ahora funciona como submit normal
    </script>
    </script>
</body>
</html>
