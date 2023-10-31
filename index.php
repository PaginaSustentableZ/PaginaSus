<?php
session_start();

if(isset($_SESSION['usuario']) && isset($_SESSION['correo']) && isset($_SESSION['contraseña'])) {
    if(session_id() != $_SESSION['usuario']) {
        session_unset();
        session_destroy();
        header('Location: index.php');
        exit();
    } else {
        header('Location: home.php');
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <link rel="stylesheet" href="css/styleA_.css">
    <link rel="shortcut icon" href="img/favicon1.png">
</head>
<body class="bg-image">
    <?php
    if(isset($_GET['mensaje'])) {
        $mensaje = $_GET['mensaje'];
        if($mensaje == "error") {
            echo "<h1 class='bad'>ERROR EN LA AUTENTICACION</h1>";
        }
    }
    ?>
    <form action="validar.php" method="post">
        <h1 class="ver">LOGIN PARA CLIENTES</h1>
        <p>Usuario <input type="text" placeholder="Ingrese su Nombre" name="usuario"></p>
        <p>Correo electrónico <input type="email" placeholder="Ingrese su correo electrónico" name="correo"></p>
        <p>Contraseña <input type="password" placeholder="Ingrese su Contraseña" name="contraseña"></p>
        <input type="submit" value="INGRESAR">
    </form>
    <form action="registro.php" method="post">
        <input type="submit" value="REGISTRARSE">
    </form>
    <form action="index_Trabajo.php" method="post">
        <input type="submit" value="TRABAJADOR">
    </form>
    <form action="index_Chofer.php" method="post">
        <input type="submit" value="CHOFER">
    </form>
</body>
</html>
