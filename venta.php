<?php
include('db.php');
include('auth.php');

if(isset($_GET['logout'])) {
    if(isset($_GET['confirm']) && $_GET['confirm'] == 'true') {
        session_destroy();
        session_unset();
        header('Location: index.php');
        exit();
    } else {
        echo '<script>
                if(confirm("¿Está seguro que desea cerrar sesión?")) {
                    window.location.href = "nosotros.php?logout=true&confirm=true";
                }
            </script>';
    }
}

if(isset($_POST['usuarioC']) && isset($_POST['correoC']) && isset($_POST['comentarioC'])) {
    // Obtener los datos del formulario
    $usuarioC = $_POST['usuarioC'];
    $correoC = $_POST['correoC'];
    $comentarioC = $_POST['comentarioC'];

    // Preparar la consulta para insertar los datos en la tabla
    $consulta = "INSERT INTO comentarios (usuarioC, correoC, comentarioC) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conexion, $consulta);

    // Vincular los parámetros y ejecutar la consulta
    mysqli_stmt_bind_param($stmt, 'sss', $usuarioC, $correoC, $comentarioC);
    $resultado = mysqli_stmt_execute($stmt);

    if ($resultado) {
        // Comentario guardado exitosamente
        $mensaje = "Comentario Guardado. ¡Gracias, $usuarioC! por Tomarse el Tiempo en Comentar";
    } else {
        // Error al guardar el comentario
        $error_msg = "ERROR AL GUARDAR EL COMENTARIO: " . mysqli_error($conexion);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conexion);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styleB_.css">
    <link rel="stylesheet" type="text/css" href="css/styleC_.css">
    <link rel="shortcut icon" href="img/favicon1.png">
    <title>SUSTENTA FIME</title>
</head>
<body>
    <header class="header">
        <a href="home.php">
            <img class="header__logo" src="img/logo_final.png" alt="logotipo">
        </a>
    </header>

    <nav class="navegacion">
        <a class="navegacion__enlace" href="?logout=true">Salir</a>
        <a class="navegacion__enlace" href="home.php">Tienda</a>
        <a class="navegacion__enlace navegacion__enlace--activo" href="venta.php">Comentarios</a>
    </nav>
    <main class="contenedor">
        <h1>Comentarios:</h1>

        <form action="venta.php" method="POST" class="formulario">
            <div>
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="correoC" required>
            </div>
            <div>
                <label for="usuario">Usuario:</label>
                <input type="text" id="usuario" name="usuarioC" required>
            </div>
            <div>
                <label for="comentario">Comentario:</label>
                <textarea id="comentario" name="comentarioC" required></textarea>
            </div>
            <button type="submit">Enviar</button>
        </form>
    </main>
</body>
</html>
