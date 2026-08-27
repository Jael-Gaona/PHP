<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$usuario = $_SESSION['usuario'];
$usuarios = json_decode(file_get_contents("usuarios.json"), true);

if (isset($usuarios[$usuario])) {
    unset($usuarios[$usuario]);
    file_put_contents("usuarios.json", json_encode($usuarios));
}

session_destroy();
header("Location: login.php");
exit();
?>
