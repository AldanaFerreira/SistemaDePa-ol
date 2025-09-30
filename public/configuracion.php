<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: ../login/auth/login.html');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Configuración - Sistema de Pañol</title>
    <link rel="stylesheet" type="text/css" href="../dashboard_menu.css">
    <link rel="stylesheet" type="text/css" href="configuracion.css">
    <link rel="stylesheet" type="text/css" href="sidebar_modern.css">
</head>
<body>
    <div class="sidebar" style="position:fixed;left:0;top:0;width:190px;height:100vh;background:#1a237e;color:#e3eafd;display:flex;flex-direction:column;align-items:center;padding-top:28px;box-shadow:2px 0 12px rgba(26,35,126,0.10);z-index:100;border-radius:0 16px 16px 0;">
        <div style="display:flex;flex-direction:column;align-items:center;gap:6px;margin-bottom:18px;">
            <span style="background:#fff;border-radius:50%;padding:6px;box-shadow:0 2px 8px rgba(26,35,126,0.10);width:38px;height:38px;display:flex;align-items:center;justify-content:center;">
                <svg xmlns="http://www.w3.org/2000/svg" height="28" width="28" viewBox="0 0 24 24" fill="#1976d2"><path d="M12 2l-5.5 9h11zM2 20h20v-2H2zm2-4h16v-2H4z"/></svg>
            </span>
            <span style="font-size:18px;font-weight:bold;color:#90caf9;letter-spacing:1px;">Sistema Pañol</span>
        </div>
        <h3 style="margin-bottom: 32px; color:#90caf9; font-size:18px; font-weight:normal;">Configuración</h3>
        <a href="../public/dashboard.php" class="btn sidebar-btn" style="width:90%;display:flex;align-items:center;gap:10px;">
            <span class="sidebar-icon">
                <svg xmlns="http://www.w3.org/2000/svg" height="22" width="22" viewBox="0 0 24 24" fill="#1976d2"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg>
            </span>
            <span class="sidebar-text" style="font-size:15px;font-weight:500;color:inherit;text-align:left;">Volver al menú</span>
        </a>
    </div>
    <div class="config-container" style="margin-left:210px;padding:32px 24px;background:#e3eafd;min-height:100vh;">
        <h2 class="config-title" style="font-size:26px;display:flex;align-items:center;gap:10px;margin-bottom:10px;">
            <span style="display:flex;align-items:center;justify-content:center;background:#1976d2;color:#fff;border-radius:50%;width:32px;height:32px;padding:4px;">
                <svg xmlns="http://www.w3.org/2000/svg" height="22" width="22" viewBox="0 0 24 24" fill="#fff"><path d="M19.14 12.94c.04-.31.06-.63.06-.94s-.02-.63-.06-.94l2.03-1.58a.5.5 0 00.12-.64l-1.92-3.32a.5.5 0 00-.61-.22l-2.39.96a7.007 7.007 0 00-1.62-.94l-.36-2.53A.5.5 0 0014 2h-4a.5.5 0 00-.5.42l-.36 2.53c-.59.22-1.14.52-1.62.94l-2.39-.96a.5.5 0 00-.61.22l-1.92 3.32a.5.5 0 00.12.64l2.03 1.58c-.04.31-.06.63-.06.94s.02.63.06.94l-2.03 1.58a.5.5 0 00-.12.64l1.92 3.32c.14.24.44.32.68.22l2.39-.96c.48.42 1.03.72 1.62.94l.36 2.53c.05.28.27.42.5.42h4c.23 0 .45-.14.5-.42l.36-2.53c.59-.22 1.14-.52 1.62-.94l2.39.96c.24.1.54.02.68-.22l1.92-3.32a.5.5 0 00-.12-.64l-2.03-1.58zM12 15.5A3.5 3.5 0 1115.5 12 3.5 3.5 0 0112 15.5z"/></svg>
            </span>
            Configuración del Sistema
        </h2>
        <p style="color:#3949ab;font-size:15px;margin-bottom:28px;">Aquí puedes gestionar usuarios, tu perfil y la seguridad de tu cuenta.</p>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:24px;max-width:900px;">
            <!-- Card Usuarios -->
            <div style="background:#fff;border-radius:16px;box-shadow:0 2px 12px rgba(26,35,126,0.10);padding:24px 18px;display:flex;flex-direction:column;align-items:center;gap:10px;">
                <span style="background:#1976d2;color:#fff;border-radius:50%;width:38px;height:38px;display:flex;align-items:center;justify-content:center;">
                    <svg xmlns="http://www.w3.org/2000/svg" height="26" width="26" viewBox="0 0 24 24" fill="#fff"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5s-3 1.34-3 3 1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5s-3 1.34-3 3 1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05C15.64 13.16 17 14.17 17 15.5V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
                </span>
                <h3 style="font-size:18px;color:#1976d2;margin:0;">Usuarios</h3>
                <p style="font-size:14px;color:#3949ab;text-align:center;margin:0 0 10px 0;">Administrar cuentas, roles y contraseñas.</p>
                <a href="../usuarios/list.php" class="btn" style="width:100%;max-width:180px;">Ir a Usuarios</a>
            </div>
            <!-- Card Cerrar sesión -->
            <div style="background:#fff;border-radius:16px;box-shadow:0 2px 12px rgba(26,35,126,0.10);padding:24px 18px;display:flex;flex-direction:column;align-items:center;gap:10px;">
                <span style="background:#1976d2;color:#fff;border-radius:50%;width:38px;height:38px;display:flex;align-items:center;justify-content:center;">
                    <svg xmlns="http://www.w3.org/2000/svg" height="26" width="26" viewBox="0 0 24 24" fill="#fff"><path d="M16 13v-2H7v2h9zm-1-9a2 2 0 012 2v2h-2V6a1 1 0 00-1-1H6a1 1 0 00-1 1v12a1 1 0 001 1h7a1 1 0 001-1v-2h2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6a2 2 0 012-2h9z"/></svg>
                </span>
                <h3 style="font-size:18px;color:#1976d2;margin:0;">Cerrar sesión</h3>
                <p style="font-size:14px;color:#3949ab;text-align:center;margin:0 0 10px 0;">Salir de forma segura del sistema.</p>
                <a href="logout.php" class="btn" style="width:100%;max-width:180px;">Cerrar sesión</a>
            </div>
        </div>
    </div>
</body>
</html>
