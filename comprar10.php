<?php
// Conexión a la base de datos
session_start();
include('db.php');
include('auth.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los valores enviados por el formulario
    $talla = $_POST['talla'];
    $cantidad = $_POST['cantidad'];

    // Consulta SQL para obtener la cantidad actual en inventario y el precio de la playera
    $sql = "SELECT cantidad_playera_i, precio_playera_i FROM inventario10 WHERE talla_playera_i = '$talla'";

    // Ejecutar la consulta y obtener el resultado
    $resultado = mysqli_query($conexion, $sql);
    $fila = mysqli_fetch_assoc($resultado);
    $cantidad_actual = $fila['cantidad_playera_i'];
    // Obtener el usuario activo
    $usuario = $_SESSION['usuario'];
    $correoD = $_SESSION['correo'];

    $precio_playera = $fila['precio_playera_i'];

    // Calcular la cantidad restante en inventario
    $cantidad_restante = $cantidad_actual - $cantidad;

    // Calcular el precio total de la compra
    $precio_total = $precio_playera * $cantidad;


    // Obtener el dinero actual del usuario
    $sql = "SELECT dinero FROM usuarios WHERE correo = '$correoD'";
    $resultado = mysqli_query($conexion, $sql);
    $fila = mysqli_fetch_assoc($resultado);
    $dinero_actual = $fila['dinero'];


    $dinero_actual = intval($fila['dinero']);
    $precio_total = intval($precio_total);


    // Verificar si el usuario tiene suficiente dinero
    if ($dinero_actual < $precio_total) {
        echo '<p>No tienes suficiente dinero para realizar esta compra.</p>';
        exit;
    }

    // Calcular el nuevo dinero del usuario
    $dinero_final = $dinero_actual - $precio_total;

    // Insertar datos en la tabla DatosCliente
    $sql = "INSERT INTO DatosCliente (usuarioD, correoD, nombreD, tallaD, cantidadD, precioD) VALUES ('$usuarioD', '$correoD', (SELECT nombre_playera FROM inventario WHERE talla_playera = '$talla'), '$talla', '$cantidad', '$precio_total')";
    mysqli_query($conexion, $sql);

    // Actualizar la cantidad y el precio en la tabla de la playera
    $sql = "INSERT INTO playera (cantidad, talla, precio, dinero_final, nombre) VALUES ('$cantidad', '$talla', '$precio_total', '$dinero_final', (SELECT nombre_playera_i FROM inventario10 WHERE talla_playera_i = '$talla'))";
    mysqli_query($conexion, $sql);

    // Actualizar la cantidad en inventario
    $sql = "UPDATE inventario10 SET cantidad_playera_i = $cantidad_restante WHERE talla_playera_i = '$talla'";
    mysqli_query($conexion, $sql);

    // Actualizar el atributo "dinero" en la tabla "usuarios"
    $sql = "UPDATE usuarios SET dinero = $dinero_final WHERE correo = '$correo'";
    mysqli_query($conexion, $sql);

    // Mostrar mensaje de éxito
    echo '<p>Compra realizada con Éxito, La Sudadera llegara dentro de 5 días a tu Dirección</p>';
}

// Consulta SQL para obtener la talla de la playera
$sql = 'SELECT DISTINCT talla_playera_i FROM inventario10';

// Ejecutar la consulta y obtener el resultado
$resultado = mysqli_query($conexion, $sql);
$tallas = array();
while ($fila = mysqli_fetch_assoc($resultado)) {
    $tallas[] = $fila['talla_playera_i'];
}

// Generar las opciones del select con los valores de "talla_playera"
$options = '';
foreach ($tallas as $talla) {
    $options .= '<option>' . $talla . '</option>';
}

// Imprimir el campo de formulario con el select y el input de cantidad
echo '<form class="formulario" method="POST">';
echo '<select class="formulario__campo" name="talla">';
echo '<option disabled selected>--Seleccionar Talla--</option>';
echo $options;
echo '</select>';
echo '<input class="formulario__campo__number" type="number" name="cantidad" placeholder="Cantidad" min="1">';
echo '<input class="formulario__submit" type="submit" name="submit" id="submit" value="REALIZAR COMPRA">';

echo '</form>';

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>