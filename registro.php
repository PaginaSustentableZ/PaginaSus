<?php
session_start();

// inicializar la variable de mensaje de error
$error_msg = "";

if (isset($_POST['usuario']) && isset($_POST['contraseña']) && isset($_POST['direccion']) && isset($_POST['correo']) && isset($_POST['telefono'])) {
  $usuario = $_POST['usuario'];
  $contraseña = $_POST['contraseña'];
  $direccion = $_POST['direccion'];
  $correo = $_POST['correo'];
  $telefono = $_POST['telefono'];
  $dinero = $_POST['dinero'];

  include('db.php');

  // preparar la consulta utilizando sentencias preparadas de SQL
  $consulta = "INSERT INTO usuarios (usuario, contraseña, direccion, correo, telefono, dinero) VALUES (?, ?, ?, ?, ?, ?)";
  $stmt = mysqli_prepare($conexion, $consulta);
  mysqli_stmt_bind_param($stmt, 'sssssi', $usuario, $contraseña, $direccion, $correo, $telefono, $dinero);
  $resultado = mysqli_stmt_execute($stmt);

  if ($resultado) {
    $_SESSION['usuario'] = $usuario;
    $mensaje = "Registro exitoso. ¡Bienvenid@, $usuario!";
  } else {
    // almacenar el mensaje de error
    $error_msg = "ERROR EN EL REGISTRO";
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conexion);
}

?>
<?php
    // mostrar el mensaje de error si existe
    if ($error_msg != "") {
        echo "<h1 class='bad'>$error_msg</h1>";
    }
    // mostrar el mensaje de confirmación si existe
    if (isset($mensaje)) {
        echo "<h1 class='good'>$mensaje</h1>";
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="css/styleA_.css">
    <link rel="shortcut icon" href="img/favicon1.png">
</head>
<body class="bg-image">
    <form action="registro.php" method="post">
        <h1 class="ver">REGISTRO PARA CLIENTES</h1>
        <p>Usuario <input type="text" placeholder="Ingrese su Nombre" name="usuario"></p>
        <p>Contraseña <input type="password" placeholder="Ingrese su Contraseña" name="contraseña"></p>
        <p>Dirección <input type="text" placeholder="Ingrese su Dirección" name="direccion"></p>
        <p>Correo <input type="email" placeholder="Ingrese su Correo" name="correo"></p>
        <p>Teléfono <input type="tel" placeholder="Ingrese su Teléfono" name="telefono"></p>
        <p>Nota: Cuando se registre recibirá $1000 pesos para poder comprar una sudadera, pero a cambio nos dará permiso para usar su correo electrónico para usarlo como firma para la ayuda para la creación de una fundación de un reciclaje en Linares Nuevo León.</p>
        <p><a href="contratoCliente.php" style="text-decoration: underline; color: blue;">LEA EL CONTRATO AQUI</a></p>
        <input type="hidden" name="dinero" value="1000">
        <input type="submit" value="REGISTRARSE">
    </form>
    <form action="index.php" method="post">
        <input type="submit" value="REGRESAR">
    </form>
</body>
</html>