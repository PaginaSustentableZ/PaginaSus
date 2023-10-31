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
        <a class="navegacion__enlace" href="VerRegistro.php">Regresar</a>
        <a class="navegacion__enlace navegacion__enlace--activo" href="VerTrabajadores.php">Trabajadores</a>
        <a class="navegacion__enlace" href="VerChoferes.php">Repartidores</a>
        <a class="navegacion__enlace" href="registro_Trabajo.php">Registro Trabajador</a>
        <a class="navegacion__enlace" href="registro_Chofer.php">Registro Repartidor</a>
    </nav>

    <main class="contenedor">
        <h1>TRABAJADORES REGISTRADOS</h1>
        <table>
            <tr>
                <th>CODIGO DE LOS TRABAJADORES</th>
                <th>USUARIOS</th>
                <th>CONTRASEÑAS</th>
                <th>DIRECCIONES</th>
                <th>CORREOS</th>
                <th>TELEFONO</th>
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
            $consulta = "SELECT idT, usuarioT, contraseñaT, direccionT, correoT, telefonoT FROM usuariosT";
            $resultado = mysqli_query($conexion, $consulta);

            // Imprimir filas de la tabla
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $fila['idT'] . "</td>";
                echo "<td>" . $fila['usuarioT'] . "</td>";
                echo "<td>" . $fila['contraseñaT'] . "</td>";
                echo "<td>" . $fila['direccionT'] . "</td>";
                echo "<td>" . $fila['correoT'] . "</td>";
                echo "<td>" . $fila['telefonoT'] . "</td>";
                echo "</tr>";
            }
            // Cerrar conexión a la base de datos
            mysqli_close($conexion);
            ?>
            </table>

            <form action="eliminarTrabajador.php" method="POST">
                <p>ESCRIBA EL CODIGO DEL TRABAJADOR AL QUE DESEA ELIMINAR:</p>
                <input type="text" name="codigoUsuario" required>
                <button type="submit">Eliminar</button>
            </form>
    </main>

<footer class="footer">
    <p class="footer__texto">Todos los Derechos Reservados por Santos Dueñas, Aram De La Cruz y Stephania Álvarez</p>
</footer>
</body>
</html>