<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    // Datos simulados
    $usuario_valido = "admin";
    $clave_valida = "1234";

    if ($usuario === $usuario_valido && $clave === $clave_valida) {
        $_SESSION['usuario'] = $usuario;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Usuario o clave incorrectos";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - Pañol</title>
    <style>
        body {
            background: #f4f6f8;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background: #fff;
            padding: 32px 28px;
            border-radius: 10px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
            min-width: 320px;
        }
        h2 {
            text-align: center;
            margin-bottom: 24px;
            color: #333;
        }
        .form-group {
            margin-bottom: 18px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            color: #555;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #1976d2;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.2s;
        }
        button:hover {
            background: #1565c0;
        }
        .error {
            color: #d32f2f;
            text-align: center;
            margin-top: 12px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <form method="post">
            <div class="form-group">
                <label for="usuario">Usuario</label>
                <input type="text" name="usuario" id="usuario" required>
            </div>
            <div class="form-group">
                <label for="clave">Clave</label>
                <input type="password" name="clave" id="clave" required>
            </div>
            <button type="submit">Ingresar</button>
        </form>
        <?php if(isset($error)) echo "<div class='error'>$error</div>"; ?>
    </div>
</body>
</html>
