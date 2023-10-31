<?php
session_start();

if(isset($_SESSION['usuario']) && session_id() == $_SESSION['usuario']) {
  $usuario = $_SESSION['usuario'];
  $correo = $_SESSION['correo'];
} else {
  header('Location: index.php');
  exit();
}


if(isset($_GET['logout'])) {
    // Si el usuario confirma la acción, destruir la sesión y eliminar las variables de sesión
    if(isset($_GET['confirm']) && $_GET['confirm'] == 'true') {
        session_unset();
        session_destroy();
        header('Location: index.php');
        exit();
    } else {
        // Si el usuario no confirma, mostrar un mensaje de confirmación utilizando JavaScript
        echo '<script>
                if(confirm("¿Está seguro que desea cerrar sesión?")) {
                    window.location.href = "nosotros.php?logout=true&confirm=true";
                }
            </script>';
    }
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
        <a class="navegacion__enlace" href="?logout=true">Salir</a>
        <a class="navegacion__enlace" href="VerRegistro.php">Clientes</a>
        <a class="navegacion__enlace" href="VerCompras.php">Compras</a>
        <a class="navegacion__enlace" href="VerComentarios.php">Comentarios</a>
        <a class="navegacion__enlace navegacion__enlace--activo" href="VerProductos.php">Inventario</a>
        <a class="navegacion__enlace" href="VerTrabajadores.php">Trabajadores</a>
    </nav>

    <main class="contenedor">
        <h1>INVENTARIO</h1>

        <div class="grid">
            <div class="producto">
                <a href="VerInventarioA.php">
                    <img class="producto__imagen" src="img/sudadera_1.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Sudadera Blanca Reciclada</p>
                    </div>
                </a>
            </div><!--.producto-->
            <div class="producto">
                <a href="VerInventarioB.php">
                    <img class="producto__imagen" src="img/sudadera_2.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Sudadera Negra Reciclada</p>
                    </div>
                </a>
            </div><!--.producto-->
            <div class="producto">
                <a href="VerInventarioC.php">
                    <img class="producto__imagen" src="img/sudadera_3.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Sudadera Verde Diseño 1 Reciclada</p>
                    </div>
                </a>
            </div><!--.producto-->
            <div class="producto">
                <a href="VerInventarioD.php">
                    <img class="producto__imagen" src="img/sudadera_4.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Sudadera Cafe Reciclada</p>
                    </div>
                </a>
            </div><!--.producto-->
            <div class="producto">
                <a href="VerInventarioE.php">
                    <img class="producto__imagen" src="img/sudadera_5.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Sudadera Cafe Pastel Diseño 1 Reciclada</p>
                    </div>
                </a>
            </div><!--.producto-->
            <div class="producto">
                <a href="VerInventarioF.php">
                    <img class="producto__imagen" src="img/sudadera_6.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Sudadera Gris Diseño 1 Reciclada</p>
                    </div>
                </a>
            </div><!--.producto-->
            <div class="producto">
                <a href="VerInventarioG.php">
                    <img class="producto__imagen" src="img/sudadera_7.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Sudadera Gris Oscuro Diseño 1 Reciclada</p>
                    </div>
                </a>
            </div><!--.producto-->
            <div class="producto">
                <a href="VerInventarioH.php">
                    <img class="producto__imagen" src="img/sudadera_8.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Sudadera Gris Oscuro Diseño 1T Reciclada</p>
                    </div>
                </a>
            </div><!--.producto-->
            <div class="producto">
                <a href="VerInventarioI.php">
                    <img class="producto__imagen" src="img/sudadera_9.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Sudadera Gris Oscuro Diseño 1S Reciclada</p>
                    </div>
                </a>
            </div><!--.producto-->
            <div class="producto">
                <a href="VerInventarioJ.php">
                    <img class="producto__imagen" src="img/sudadera_10.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Sudadera Gris Oscuro Diseño 2T Reciclada</p>
                    </div>
                </a>
            </div><!--.producto-->
            <div class="producto">
                <a href="VerInventarioK.php">
                    <img class="producto__imagen" src="img/sudadera_11.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Sudadera Cafe Pastel Diseño 2 Reciclada</p>
                    </div>
                </a>
            </div><!--.producto-->
            <div class="producto">
                <a href="VerInventarioL.php">
                    <img class="producto__imagen" src="img/sudadera_12.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Sudadera Verde Diseño 2 Reciclada</p>
                    </div>
                </a>
            </div><!--.producto-->
            <div class="producto">
                <a href="VerInventarioM.php">
                    <img class="producto__imagen" src="img/sudadera_13.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Sudadera Gris Oscuro Diseño 2 Reciclada</p>
                    </div>
                </a>
            </div><!--.producto-->
            <div class="producto">
                <a href="VerInventarioN.php">
                    <img class="producto__imagen" src="img/sudadera_14.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Sudadera Gris Oscuro Diseño 2S Reciclada</p>
                    </div>
                </a>
            </div><!--.producto-->

            <div class="grafico grafico--camisas"></div>
            <div class="grafico grafico--node"></div>
        </div>
    </main>

    <footer class="footer">
        <p class="footer__texto">Todos los Derechos Reservados por Santos Dueñas, Aram De La Cruz y Stephania Álvarez</p>
    </footer>
</body>
</html>