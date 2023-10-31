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
        <a class="navegacion__enlace navegacion__enlace--activo" href="home.php">Tienda</a>
        <a class="navegacion__enlace" href="nosotros.php">Nosotros</a>
        <a class="navegacion__enlace" href="venta.php">Comentarios</a>
    </nav>

    <main class="contenedor">
        <h1>Nuestros Productos</h1>

        <div class="grid">
            <div class="producto">
                <a href="producto1.php">
                    <img class="producto__imagen" src="img/sudadera_1.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Sudadera Blanca Reciclada</p>
                        <p class="producto__precio">$1000</p>
                    </div>
                </a>
            </div><!--.producto-->
            <div class="producto">
                <a href="producto2.php">
                    <img class="producto__imagen" src="img/sudadera_2.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Sudadera Negra Reciclada</p>
                        <p class="producto__precio">$1000</p>
                    </div>
                </a>
            </div><!--.producto-->
            <div class="producto">
                <a href="producto3.php">
                    <img class="producto__imagen" src="img/sudadera_3.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Sudadera Verde Diseño 1 Reciclada</p>
                        <p class="producto__precio">$1000</p>
                    </div>
                </a>
            </div><!--.producto-->
            <div class="producto">
                <a href="producto4.php">
                    <img class="producto__imagen" src="img/sudadera_4.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Sudadera Cafe Reciclada</p>
                        <p class="producto__precio">$1000</p>
                    </div>
                </a>
            </div><!--.producto-->
            <div class="producto">
                <a href="producto5.php">
                    <img class="producto__imagen" src="img/sudadera_5.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Sudadera Cafe Pastel Diseño 1 Reciclada</p>
                        <p class="producto__precio">$1000</p>
                    </div>
                </a>
            </div><!--.producto-->
            <div class="producto">
                <a href="producto6.php">
                    <img class="producto__imagen" src="img/sudadera_6.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Sudadera Gris Diseño 1 Reciclada</p>
                        <p class="producto__precio">$1000</p>
                    </div>
                </a>
            </div><!--.producto-->
            <div class="producto">
                <a href="producto7.php">
                    <img class="producto__imagen" src="img/sudadera_7.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Sudadera Gris Oscuro Diseño 1 Reciclada</p>
                        <p class="producto__precio">$1000</p>
                    </div>
                </a>
            </div><!--.producto-->
            <div class="producto">
                <a href="producto8.php">
                    <img class="producto__imagen" src="img/sudadera_8.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Sudadera Gris Oscuro Diseño 1T Reciclada</p>
                        <p class="producto__precio">$1000</p>
                    </div>
                </a>
            </div><!--.producto-->
            <div class="producto">
                <a href="producto9.php">
                    <img class="producto__imagen" src="img/sudadera_9.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Sudadera Gris Oscuro Diseño 1S Reciclada</p>
                        <p class="producto__precio">$1000</p>
                    </div>
                </a>
            </div><!--.producto-->
            <div class="producto">
                <a href="producto10.php">
                    <img class="producto__imagen" src="img/sudadera_10.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Sudadera Gris Oscuro Diseño 2T Reciclada</p>
                        <p class="producto__precio">$1000</p>
                    </div>
                </a>
            </div><!--.producto-->
            <div class="producto">
                <a href="producto11.php">
                    <img class="producto__imagen" src="img/sudadera_11.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Sudadera Cafe Pastel Diseño 2 Reciclada</p>
                        <p class="producto__precio">$1000</p>
                    </div>
                </a>
            </div><!--.producto-->
            <div class="producto">
                <a href="producto12.php">
                    <img class="producto__imagen" src="img/sudadera_12.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Sudadera Verde Diseño 2 Reciclada</p>
                        <p class="producto__precio">$1000</p>
                    </div>
                </a>
            </div><!--.producto-->
            <div class="producto">
                <a href="producto13.php">
                    <img class="producto__imagen" src="img/sudadera_13.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Sudadera Gris Oscuro Diseño 2 Reciclada</p>
                        <p class="producto__precio">$1000</p>
                    </div>
                </a>
            </div><!--.producto-->
            <div class="producto">
                <a href="producto14.php">
                    <img class="producto__imagen" src="img/sudadera_14.jpg" alt="imagen camisa">
                    <div class="producto__informacion">
                        <p class="producto__nombre">Sudadera Gris Oscuro Diseño 2S Reciclada</p>
                        <p class="producto__precio">$1000</p>
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