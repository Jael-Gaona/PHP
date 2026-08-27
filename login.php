<?php
session_start();
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST["usuario"]);
    $clave = trim($_POST["clave"]);

    if ($usuario === "" || $clave === "") {
        $mensaje = "Todos los campos son obligatorios.";
    } else {
        $usuarios = json_decode(file_get_contents("usuarios.json"), true);

        if (isset($usuarios[$usuario]) && $usuarios[$usuario] == $clave) {
            $_SESSION['usuario'] = $usuario;
            header("Location: index.php");
            exit();
        } else {
            $mensaje = "Usuario o contraseña incorrectos.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="container">
        <h2>Iniciar Sesión</h2>
        <?php if ($mensaje != "") echo "<p class='error'>$mensaje</p>"; ?>
        <form action="login.php" method="post">
            <label>Usuario:</label>
            <input type="text" name="usuario" required>
            <label>Contraseña:</label>
            <input type="password" name="clave" required>
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>
