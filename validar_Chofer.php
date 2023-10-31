<?php
session_start();
include('db.php');

if (isset($_POST['usuario']) && isset($_POST['contraseña']) && isset($_POST['correo'])) {
  $usuario = $_POST['usuario'];
  $contraseña = $_POST['contraseña'];
  $correo = $_POST['correo'];
  
  include('db.php');
  
  $consulta = "SELECT * FROM usuariosC WHERE correoC='$correo' AND contraseñaC='$contraseña'";
  $resultado = mysqli_query($conexion, $consulta);
  
  $filas = mysqli_num_rows($resultado);
  
  if ($filas) {
    $_SESSION['usuario'] = session_id();
    $_SESSION['correo'] = $correo;
    $_SESSION['contraseña'] = $contraseña;
    header("Location: VerRegistroC.php");
    exit();
  } else {
    header("Location: index_Chofer.php?mensaje=error");
    exit();
  }
  
  mysqli_free_result($resultado);
  mysqli_close($conexion);
} else {
  header("Location: index_Chofer.php");
  exit();
}
