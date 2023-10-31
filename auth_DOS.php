<?php
session_start();

if (isset($_SESSION['usuario']) && session_id() == $_SESSION['usuario']) {
    $usuario = $_SESSION['usuario'];
    $correo = $_SESSION['correo'];

    // Obtener el dinero actual del usuario
    $sql = "SELECT dinero FROM usuarios WHERE usuario = '$usuario'";
    $resultado = mysqli_query($conexion, $sql);
    $fila = mysqli_fetch_assoc($resultado);
    $_SESSION['dinero'] = $fila['dinero'];
} else {
    header('Location: index.php');
    exit();
}
?>