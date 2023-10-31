<?php
session_start();

if(isset($_GET['logout'])) {
    // Si el usuario confirma la acción, destruir la sesión y eliminar las variables de sesión
    if(isset($_GET['confirm']) && $_GET['confirm'] == 'true') {
        session_destroy();
        session_unset();
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

if(!isset($_SESSION['usuario'])) {
    header('Location: index.php');
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
        <a href="index.html">
            <img class="header__logo" src="img/logo_final.png" alt="logotipo">
        </a>
    </header>

    <nav class="navegacion">
        <a class="navegacion__enlace" href="?logout=true">Salir</a>
        <a class="navegacion__enlace" href="home.php">Tienda</a>
        <a class="navegacion__enlace navegacion__enlace--activo" href="nosotros.php">Nosotros</a>
    </nav>

    <main class="contenedor">
        <h1>Sobre Nosotros</h1>

        <div class="nosotros"> 
            <div class="nosotros__contenido">
                <p>Somos un equipo comprometido impulsado por un propósito compartido para dejar un impacto duradero, ofreciendo sudaderas recicladas perfectas para todas las edades y géneros.</p>
                <p>Contamos con una variedad de sudaderas, lo que garantiza que haya algo para todos los gustos. Todas nuestras sudaderas están confeccionadas con materiales cómodos y duraderos gracias a que cuidamos mucho nuestras sudaderas e intentamos ayudar lo más que podemos para poder reciclar y ayudar de esta manera al planeta.</p>

                <p>Además, ofrecemos una variedad de tallas y estilos para que tú como comprador encuentres la sudadera que mejor se adapte a tus necesidades.</p>
            </div>
            <img class="nosotros__imagen" src="img/sobreNosotros.jpg" alt="imagen nosotros">
        </div>
        
    </main>

    <section class="contenedor comprar">
        <h2 class="comprar__titulo">¿Por qué comprar con nosotros?</h2>

        <div class="bloques">
            <div class="bloque">
                <img class="bloque__imagen" src="img/icono_1.png" alt="porque comprar">
                <h3 class="bloque__titulo">Gratis</h3>
                <p>Estamos comprometidos en brindar a nuestros clientes una de nuestras sudaderas gratis sin comprometer su calidad, ya que queremos brindar los mejores productos que podamos.</p>
            </div><!--bloque-->

            <div class="bloque">
                <img class="bloque__imagen" src="img/icono__2.png" alt="porque comprar" width="50" height="222">
                <h3 class="bloque__titulo">Seguridad de sus Datos</h3>
                <p>Queremos que nuestros clientes se sientan seguros al confiar en nosotros dandonos su información, por lo que tenemos la mejor seguridad.</p>
            </div><!--bloque-->

            <div class="bloque">
                <img class="bloque__imagen" src="img/icono_3.png" alt="porque comprar">
                <h3 class="bloque__titulo">Envío Gratis</h3>
                <p>Nos cercioramos que nuestros clientes realicen sus pedidos en la comodidad de sus hogares sin tener que preocuparse por los gastos de envío.</p>
            </div><!--bloque-->

            <div class="bloque">
                <img class="bloque__imagen" src="img/icono_4.png" alt="porque comprar">
                <h3 class="bloque__titulo">La Mejor Calidad</h3>
                <p>Trabajamos con materiales reciclables de primera calidad resistentes al desgaste y la decoloración, garantizando su durabilidad.</p>
            </div><!--bloque-->
        </div><!--bloques-->
    </section>

    

    <footer class="footer">
        <p class="footer__texto">Todos los Derechos Reservados por Santos Dueñas, Aram De La Cruz y Stephania Álvarez</p>
    </footer>
</body>
</html>