<?php
session_start();
include('db.php');

if(isset($_SESSION['usuario']) && session_id() == $_SESSION['usuario']) {
  $usuario = $_SESSION['usuario'];
  $correo = $_SESSION['correo'];
} else {
  header('Location: index_Trabajo.php');
  exit();
}

if(isset($_GET['logout'])) {
    // Si el usuario confirma la acción, destruir la sesión y eliminar las variables de sesión
    if(isset($_GET['confirm']) && $_GET['confirm'] == 'true') {
        session_unset();
        session_destroy();
        header('Location: index_Trabajo.php');
        exit();
    } else {
        // Si el usuario no confirma, mostrar un mensaje de confirmación utilizando JavaScript
        echo '<script>
                if(confirm("¿Está seguro que desea cerrar sesión?")) {
                    window.location.href = "VerRegistro.php?logout=true&confirm=true";
                }
            </script>';
    }
}

if(!isset($_SESSION['usuario'])) {
    header('Location: index_Trabajo.php');
    exit();
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
        <a class="navegacion__enlace" href="VerProductos.php">Regresar</a>
        <a class="navegacion__enlace navegacion__enlace--activo" href="VerInventarioB.php">Producto 5</a>
    </nav>

    <main class="contenedor">
        <h1>PRODUCTO 5</h1>
        <div class="grid">
            <div class="producto">
                <img class="producto__imagen" src="img/sudadera_5.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Sudadera Cafe Pastel Diseño 1 Reciclada</p>
                    </div>
            </div><!--.producto-->
        </div>
        <table>
            <tr>
                <th>TALLAS</th>
                <th>CANTIDADES</th>
                <th>PRECIOS</th>
            </tr>
            <?php
            // Conexión a la base de datos
            $conexion = mysqli_connect("db4free.net", "equiposustenta22", "Sw978nmZpK", "paginasustenta22");

            // Verificar la conexión
            if (mysqli_connect_errno()) {
                echo "Error al conectar a la base de datos: " . mysqli_connect_error();
                exit();
            }

            // Consulta a la tabla usuarios
            $consulta = "SELECT talla_playera_d, cantidad_playera_d, precio_playera_d FROM inventario5";
            $resultado = mysqli_query($conexion, $consulta);

            // Imprimir filas de la tabla
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $fila['talla_playera_d'] . "</td>";
                echo "<td>" . $fila['cantidad_playera_d'] . "</td>";
                echo "<td>" . $fila['precio_playera_d'] . "</td>";
                echo "</tr>";
            }
            // Cerrar conexión a la base de datos
            mysqli_close($conexion);
            ?>
            </table>
    </main>

<footer class="footer">
    <p class="footer__texto">Todos los Derechos Reservados por Santos Dueñas, Aram De La Cruz y Stephania Álvarez</p>
</footer>
</body>
</html>