<?php

$conexion = mysqli_connect("db4free.net", "equiposustenta22", "Sw978nmZpK", "paginasustenta22");

// Verificar la conexión
if (!$conexion) {
    die("Error de conexión a la base de datos: " . mysqli_connect_error());
}

?>

<?php
session_start();


if (isset($_POST['usuario']) && isset($_POST['contraseña']) && isset($_POST['correo'])) {
  $usuario = $_POST['usuario'];
  $contraseña = $_POST['contraseña'];
  $correo = $_POST['correo'];
  
  include('db.php');
  
  $consulta = "SELECT * FROM usuarios WHERE correo='$correo' AND contraseña='$contraseña'";
  $resultado = mysqli_query($conexion, $consulta);
  
  $filas = mysqli_num_rows($resultado);
  
  if ($filas) {
    $_SESSION['usuario'] = session_id();
    $_SESSION['correo'] = $correo;
    $_SESSION['contraseña'] = $contraseña;
    header("Location: home.php");
    exit();
  } else {
    header("Location: index.php?mensaje=error");
    exit();
  }
  
  mysqli_free_result($resultado);
  mysqli_close($conexion);
} else {
  header("Location: index.php");
  exit();
}
