<?php
session_start();

if (isset($_SESSION['usuario']) && session_id() == $_SESSION['usuario']) {
  $usuario = $_SESSION['usuario'];
  $correo = $_SESSION['correo'];
} else {
  header('Location: index_Trabajo.php');
  exit();
}

if (isset($_GET['logout'])) {
  // Si el usuario confirma la acción, destruir la sesión y eliminar las variables de sesión
  if (isset($_GET['confirm']) && $_GET['confirm'] == 'true') {
    session_unset();
    session_destroy();
    header('Location: index_Trabajo.php');
    exit();
  } else {
    // Si el usuario no confirma, mostrar un mensaje de confirmación utilizando JavaScript
    echo '<script>
            if(confirm("¿Está seguro que desea cerrar sesión?")) {
                window.location.href = "VerRegistro.php?logout=true&confirm=true";
            }
        </script>';
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Verificar si se recibió el código del usuario
  if (isset($_POST['codigoUsuario'])) {
    $codigoUsuario = $_POST['codigoUsuario'];

    // Conexión a la base de datos
    $conexion = mysqli_connect("db4free.net", "equiposustenta22", "Sw978nmZpK", "paginasustenta22");

    // Verificar la conexión
    if (mysqli_connect_errno()) {
      echo "ERROR AL CONECTAR A LA BASE DE DATOS: " . mysqli_connect_error();
      exit();
    }

    // Consulta para eliminar el usuario
    $consulta = "DELETE FROM usuarios WHERE id = '$codigoUsuario'";
    $resultado = mysqli_query($conexion, $consulta);

    // Consulta para eliminar la compra que se realizo
    $consulta = "DELETE FROM playera WHERE codigo = '$codigoUsuario'";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
      echo "CLIENTE Y COMPRA ELIMINADOS CORRECTAMENTE";
    } else {
      echo "ERROR AL ELIMINAR EL CLIENTE Y LA COMPRA: " . mysqli_error($conexion);
    }

    // Cerrar conexión a la base de datos
    mysqli_close($conexion);
  }
}
?>