<?php
session_start();

if (isset($_POST['usuario']) && isset($_POST['contraseña']) && isset($_POST['direccion']) && isset($_POST['correo']) && isset($_POST['telefono'])) {
  $usuario = $_POST['usuario'];
  $contraseña = $_POST['contraseña'];
  $direccion = $_POST['direccion'];
  $correo = $_POST['correo'];
  $telefono = $_POST['telefono'];
  $dinero = $_POST['dinero'];

  include('db.php');

  $consulta = "INSERT INTO usuarios (usuario, contraseña, direccion, correo, telefono, dinero) VALUES ('$usuario', '$contraseña', '$direccion', '$correo', '$telefono', '$dinero')";
  $resultado = mysqli_query($conexion, $consulta);

  if ($resultado) {
    $_SESSION['usuario'] = $usuario;
    header("Location: home.php");
    exit();
  } else {
    include("registro.php");
    echo "<h1 class='bad'>ERROR EN EL REGISTRO</h1>";
  }

  mysqli_close($conexion);
} else {
  include("registro.php");
}
?>