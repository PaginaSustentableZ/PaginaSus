<?php


// inicializar la variable de mensaje de error
$error_msg = "";

if (isset($_POST['usuario']) && isset($_POST['contraseña']) && isset($_POST['direccion']) && isset($_POST['correo']) && isset($_POST['telefono'])) {
  $usuario = $_POST['usuario'];
  $contraseña = $_POST['contraseña'];
  $direccion = $_POST['direccion'];
  $correo = $_POST['correo'];
  $telefono = $_POST['telefono'];

  include('db.php');

  // preparar la consulta utilizando sentencias preparadas de SQL
  $consulta = "INSERT INTO usuariosT (usuarioT, contraseñaT, direccionT, correoT, telefonoT) VALUES (?, ?, ?, ?, ?)";
  $stmt = mysqli_prepare($conexion, $consulta);
  mysqli_stmt_bind_param($stmt, 'sssss', $usuario, $contraseña, $direccion, $correo, $telefono);
  $resultado = mysqli_stmt_execute($stmt);
  
  if ($resultado) {
      $_SESSION['usuario'] = $usuario;
      header("Location: VerRegistro.php");
      exit();
  } else {
      include("registro_Trabajo.php");
      echo "<h1 class='bad'>ERROR EN EL REGISTRO</h1>";
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
    <form action="registro_validar_Trabajo.php" method="post">
        <h1>REGISTRO PARA TRABAJADORES</h1>
        <p>Usuario <input type="text" placeholder="Ingrese su Nombre" name="usuario"></p>
        <p>Contraseña <input type="password" placeholder="Ingrese su Contraseña" name="contraseña"></p>
        <p>Dirección <input type="text" placeholder="Ingrese su Dirección" name="direccion"></p>
        <p>Correo <input type="email" placeholder="Ingrese su Correo" name="correo"></p>
        <p>Teléfono <input type="tel" placeholder="Ingrese su Teléfono" name="telefono"></p>
        <p><a href="contratoTrabajador.php" style="text-decoration: underline; color: blue;">LEA EL CONTRATO AQUI</a></p>
        <input type="submit" value="REGISTRAR">
    </form>
    <form action="VerTrabajadores.php" method="post">
        <input type="submit" value="REGRESAR">
    </form>
</body>
</html>
