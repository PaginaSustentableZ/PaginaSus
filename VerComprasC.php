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
        <a class="navegacion__enlace" href="VerRegistroC.php">Regresar</a>
        <a class="navegacion__enlace navegacion__enlace--activo" href="VerComprasC.php">Compras</a>
    </nav>

    <main class="contenedor">
        <h1>COMPRAS REALIZADAS</h1>
        <table>
            <tr>
                <th>CORREO</th>
                <th>NOMBRE DE LA SUDADERA</th>
                <th>TALLA</th>
                <th>CANTIDAD</th>
                <th>PRECIO</th>
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
            $consulta = "SELECT correoD, nombreD, tallaD, cantidadD, precioD FROM DatosCliente";
            $resultado = mysqli_query($conexion, $consulta);

            // Imprimir filas de la tabla
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $fila['correoD'] . "</td>";
                echo "<td>" . $fila['nombreD'] . "</td>";
                echo "<td>" . $fila['tallaD'] . "</td>";
                echo "<td>" . $fila['cantidadD'] . "</td>";
                echo "<td>" . $fila['precioD'] . "</td>";
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