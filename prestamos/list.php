<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../public/login.php");
    exit();
}

// Datos simulados (reemplaza con tu consulta a la base de datos)
$prestamos = [
    ["id" => 1, "usuario" => "admin",  "fecha_prestamo" => "2025-09-10", "fecha_devolucion" => "2025-09-15", "estado" => "Pendiente"],
    ["id" => 2, "usuario" => "usuario1", "fecha_prestamo" => "2025-09-09", "fecha_devolucion" => "2025-09-12", "estado" => "Devuelto"],
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Préstamos - Pañol</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <!-- Font Awesome para los íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-… (hash) …" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Un poco de CSS de ayuda */
        .acciones-btns .btn i {
            margin-right: 5px;
            vertical-align: middle;
        }
        .acciones-btns .btn {
            padding: 4px 8px;
            display: inline-block;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border-radius: 4px;
            margin: 0 2px;
        }
        .acciones-btns .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Historial de Préstamos</h2>
    <a href="add.php" class="btn add-btn"><i class="fa-solid fa-plus"></i> Nuevo Préstamo</a>
    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
              
                <th>Fecha de préstamo</th>
                <th>Fecha de devolución</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($prestamos as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['usuario']) ?></td>
        
                <td><?= htmlspecialchars($row['fecha_prestamo']) ?></td>
                <td><?= htmlspecialchars($row['fecha_devolucion']) ?></td>
                <td><?= htmlspecialchars($row['estado']) ?></td>
                <td>
                    <div class="acciones-btns">
                        <a href="ver.php?id=<?= urlencode($row['id']) ?>" class="btn" title="Ver">
                          <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="edit.php?id=<?= urlencode($row['id']) ?>" class="btn" title="Editar">
                          <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <a href="devolver.php?id=<?= urlencode($row['id']) ?>" class="btn" title="Devolver">
                          <i class="fa-solid fa-rotate-left"></i>
                        </a>
                        <a href="delete.php?id=<?= urlencode($row['id']) ?>" class="btn" title="Eliminar"
                           onclick="return confirm('¿Seguro que deseas eliminar este préstamo?');">
                          <i class="fa-solid fa-trash"></i>
                        </a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <a href="../public/dashboard.php" class="btn back-btn"><i class="fa-solid fa-arrow-left"></i> Volver al Dashboard</a>
</div>

<link rel="stylesheet" type="text/css" href="dashboard_menu.css">
<link rel="stylesheet" type="text/css" href="sidebar_modern.css">
<div class="sidebar">
    <h2 style="margin-bottom: 10px;">Sistema Pañol</h2>
    <h3 style="margin-bottom: 32px;">Menú</h3>
        <a href="../items/add.php" class="btn">
            <span class="sidebar-icon">
                <!-- Modern icon: build (Material Icons) -->
                <svg xmlns="http://www.w3.org/2000/svg" height="38" width="38" viewBox="0 0 24 24" fill="currentColor"><path d="M22.7 19.3l-6.4-6.4c.6-1.1.9-2.3.7-3.6-.2-1.3-.8-2.5-1.7-3.4-1.7-1.7-4.3-2-6.2-.7l2.1 2.1-2.8 2.8-2.1-2.1c-1.3 1.9-1 4.5.7 6.2.9.9 2.1 1.5 3.4 1.7 1.3.2 2.5-.1 3.6-.7l6.4 6.4c.4.4 1 .4 1.4 0l1.4-1.4c.4-.4.4-1 0-1.4z"/></svg>
            </span>
            <span class="sidebar-text">Herramientas</span>
        </a>
        <a href="../prestamos/list.php" class="btn">
            <span class="sidebar-icon">
                <!-- Modern icon: assignment (Material Icons) -->
                <svg xmlns="http://www.w3.org/2000/svg" height="38" width="38" viewBox="0 0 24 24" fill="currentColor"><path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1s-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm7 18H5V5h2v2h10V5h2v16z"/></svg>
            </span>
            <span class="sidebar-text">Préstamos</span>
        </a>
            <!-- Sección Inventario -->

                <a href="../inventario/list.php" class="btn">
                    <span class="sidebar-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" height="38" width="38" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l-5.5 9h11zM2 20h20v-2H2zm2-4h16v-2H4z"/></svg>
                    </span>
                    <span class="sidebar-text">Inventario</span>
                </a>
        <!-- Sección Configuración -->
    <a href="../public/configuracion.php" class="btn" >
            <span class="sidebar-icon">
                <!-- Modern icon: settings (Material Icons) -->
                <svg xmlns="http://www.w3.org/2000/svg" height="38" width="38" viewBox="0 0 24 24" fill="currentColor"><path d="M19.14 12.94c.04-.31.06-.63.06-.94s-.02-.63-.06-.94l2.03-1.58a.5.5 0 00.12-.64l-1.92-3.32a.5.5 0 00-.61-.22l-2.39.96a7.007 7.007 0 00-1.62-.94l-.36-2.53A.5.5 0 0014 2h-4a.5.5 0 00-.5.42l-.36 2.53c-.59.22-1.14.52-1.62.94l-2.39-.96a.5.5 0 00-.61.22l-1.92 3.32a.5.5 0 00.12.64l2.03 1.58c-.04.31-.06.63-.06.94s.02.63.06.94l-2.03 1.58a.5.5 0 00-.12.64l1.92 3.32c.14.24.44.32.68.22l2.39-.96c.48.42 1.03.72 1.62.94l.36 2.53c.05.28.27.42.5.42h4c.23 0 .45-.14.5-.42l.36-2.53c.59-.22 1.14-.52 1.62-.94l2.39.96c.24.1.54.02.68-.22l1.92-3.32a.5.5 0 00-.12-.64l-2.03-1.58zM12 15.5A3.5 3.5 0 1115.5 12 3.5 3.5 0 0112 15.5z"/></svg>
            </span>
            <span class="sidebar-text">Configuración</span>
        </a>
</div>
<style>
.card.inventory table {
  font-family: 'Segoe UI', Arial, Helvetica, sans-serif;
  width: 100%;
  border-collapse: collapse;
  text-align: center;


.card.inventory th, .card.inventory td {
  padding: 8px 12px;
  font-size: 1em;
  text-align: center;
  font-family: inherit;
}

}

.card.inventory th {
  font-weight: bold;
  background: #1a237e;
  color: #e3eafd;
}
/* Inventario destacado en dashboard */
.card.inventory {
  flex-basis: 100%;
  max-width: 100%;
  min-width: 400px;
  font-size: 1.08em;
}

.card.inventory table {
  font-size: 1.08em;
}

.card.inventory th, .card.inventory td {
  padding: 8px 12px;
  font-size: 1em;
}
/* Barra lateral para el dashboard */
.sidebar {
  position: fixed;
  left: 0;
  top: 0;
  width: 190px;
  height: 100vh;
  background: #1a237e;
  color: #e3eafd;
  display: flex;
  flex-direction: column;
  align-items: center;
  padding-top: 28px;
  box-shadow: 2px 0 12px rgba(26,35,126,0.10);
  z-index: 100;
  border-radius: 0 16px 16px 0;
}
.sidebar h2 {
  font-size: 24px;
  margin-bottom: 8px;
  font-weight: bold;
  letter-spacing: 1px;
  color: #90caf9;
}
.sidebar h3 {
  margin-bottom: 28px;
  font-size: 18px;
  font-weight: normal;
  color: #90caf9;
}
.sidebar a {
  color: #e3eafd;
  text-decoration: none;
  margin: 8px 0;
  font-size: 16px;
  padding: 10px 12px;
  border-radius: 8px;
  transition: background 0.2s, box-shadow 0.2s, color 0.2s;
  width: 90%;
  box-shadow: 0 1px 4px rgba(26,35,126,0.04);
  font-weight: 500;
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: center;
  gap: 14px;
  min-height: 44px;
}
.sidebar a:hover {
  background: #3949ab;
  color: #fff;
  box-shadow: 0 2px 8px rgba(26,35,126,0.10);
}

/* Iconos en la barra lateral */
.sidebar a .sidebar-icon {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 32px;
  height: 32px;
  color: #90caf9;
  font-size: 22px;
  background: rgba(255,255,255,0.10);
  border-radius: 50%;
  box-shadow: 0 1px 2px rgba(26,35,126,0.08);
  margin-right: 0;
  flex-shrink: 0;
}

.sidebar a .sidebar-text {
  display: flex;
  align-items: center;
  justify-content: center;
  flex: 1;
  font-size: 16px;
  font-weight: 500;
  color: inherit;
  text-align: left;
  letter-spacing: 0.5px;
  padding-left: 2px;
}

/* Contenido principal */
.content {
  margin-left: 190px; /* deja espacio para la sidebar */
  padding: 32px 24px;
  background: #e3eafd;
  min-height: 100vh;
  box-sizing: border-box;
}

/* Contenedor de tarjetas */
.cards {
  display: flex;
  gap: 20px;
  margin-top: 20px;
  flex-wrap: wrap;
  justify-content: flex-start;
}

/* Tarjeta individual */
.card {
  flex: 1 1 220px;
  min-width: 220px;
  max-width: 320px;
  background: #fff;
  padding: 24px 20px;
  border-radius: 14px;
  box-shadow: 0 2px 10px rgba(26,35,126,0.10);
  transition: transform 0.2s ease;
  margin-bottom: 18px;
}

.card:hover {
  transform: translateY(-5px);
}

.card h3 {
  margin-bottom: 10px;
  font-size: 18px;
  color: #1a237e;
}

.card .number {
  font-size: 28px;
  font-weight: bold;
  color: #3949ab;
  margin: 10px 0;
}

/* Botones */

.btn {
  display: inline-block;
  background: #3949ab;
  color: #fff;
  padding: 8px 14px;
  border-radius: 6px;
  text-decoration: none;
  font-size: 14px;
  font-weight: 600;
  transition: background 0.3s, color 0.3s;
  box-shadow: 0 1px 4px rgba(26,35,126,0.08);
}

.btn:hover {
  background: #1a237e;
  color: #fff;
}

/* Iconos modernos y botones para la barra lateral */
.sidebar a.btn {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 3px;
  width: 68%;
  padding: 4px 0 2px 0;
  background: linear-gradient(135deg, #1976d2 60%, #2196f3 100%);
  color: #fff;
  border-radius: 9px;
  box-shadow: 0 2px 8px rgba(26,35,126,0.10);
  font-weight: 600;
  font-size: 11px;
  margin-bottom: 7px;
  border: 1px solid #1565c0;
  transition: background 0.3s, box-shadow 0.3s, transform 0.2s, border 0.2s;
}
.sidebar a.btn:hover {
  background: linear-gradient(135deg, #2196f3 60%, #1976d2 100%);
  color: #e3eafd;
  box-shadow: 0 4px 12px rgba(26,35,126,0.16), 0 1px 4px rgba(33,150,243,0.10);
  border: 1.5px solid #1976d2;
  transform: translateY(-1px) scale(1.03);
}
.sidebar .sidebar-icon {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 16px;
  height: 16px;
  background: #fff;
  color: #1976d2;
  border-radius: 50%;
  box-shadow: 0 1px 4px rgba(26,35,126,0.10);
  font-size: 11px;
  margin-bottom: 2px;
}
.sidebar .sidebar-text {
  font-size: 11px;
  font-weight: 600;
  color: #fff;
  text-align: center;
  letter-spacing: 0.5px;
}
.config-container {
    margin-left: 210px;
    padding: 32px 24px;
    background: #e3eafd;
    min-height: 100vh;
}
.config-title {
    font-size: 28px;
    color: #1a237e;
    margin-bottom: 24px;
}
.config-btns {
    display: flex;
    gap: 18px;
    margin-bottom: 32px;
}


</style>
