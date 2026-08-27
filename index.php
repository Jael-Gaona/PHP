<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>MENÚ</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="container">
        <h1>MENÚ</h1>
        <p>Bienvenido, <strong><?php echo htmlspecialchars($_SESSION['usuario']); ?></strong></p>

        <form action="eliminar.php" method="post" onsubmit="return confirm('¿Estás seguro de que deseas eliminar tu sesión?');">
            <button type="submit">Eliminar Cuenta</button>
        </form>

        <form action="logout.php" method="post">
            <button type="submit">Cerrar Sesión</button>
        </form>
    </div>
</body>
</html>
