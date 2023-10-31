<?php
include('auth.php');
include('db.php');
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
        <a class="navegacion__enlace navegacion__enlace--activo" href="home.php">Regresar</a>
        <a class="navegacion__enlace" href="nosotros.php">Nosotros</a>
    </nav>

    <main class="contenedor">
        <h1>Sudadera Negra Reciclada</h1>

        <div class="camisa">
            <img class="camisa__imagen" src="img/sudadera_2.jpg" alt="Imagen del Producto">

            <div class="camisa__contenido">
                <p>Con un diseño fresco y moderno, esta sudadera es perfecta para agregar un toque único a tu guardarropa. Fabricada con telas suaves y cómodas, es perfecta para cualquier clima fresco y es ideal para hacer deporte o salir con amigos, esta sudadera es una excelente opción si quieres tener un buen estilo y eres una persona que apoya al planeta con ayuda del reciclaje.</p>
                <?php include('comprar2.php'); ?>
            </div>
        </div>
    </main> 

    <footer class="footer">
        <p class="footer__texto">Todos los Derechos Reservados por Santos Dueñas, Aram De La Cruz y Stephania Álvarez</p>
    </footer
</body>
</html>