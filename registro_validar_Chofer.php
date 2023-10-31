<?php
session_start();
include('db.php');

if (isset($_POST['usuario']) && isset($_POST['contraseña']) && isset($_POST['direccion']) && isset($_POST['correo']) && isset($_POST['telefono'])) {
  $usuario = $_POST['usuario'];
  $contraseña = $_POST['contraseña'];
  $direccion = $_POST['direccion'];
  $correo = $_POST['correo'];
  $telefono = $_POST['telefono'];
  
  include('db.php');
  
  $consulta = "INSERT INTO usuariosC (usuarioC, contraseñaC, direccionC, correoC, telefonoC) VALUES ('$usuario', '$contraseña', '$direccion', '$correo', '$telefono')";
  $resultado = mysqli_query($conexion, $consulta);
  
  if ($resultado) {
  $_SESSION['usuario'] = $usuario;
  header("Location: VerRegistro.php");
  exit();
  } else {
  include("registro_Chofer.php");
  echo "<h1 class='bad'>ERROR EN EL REGISTRO</h1>";
  }
  
  mysqli_close($conexion);
  } else {
  include("registro_Chofer.php");
  }
  ?>