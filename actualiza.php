<?php
$id_usuario = $_POST['usuario'];
$id_producto = $_POST['idProducto'];
$cantidad_producto = $_REQUEST['cantidad'];
//$id_usuario = $_GET['usuario'];
//$id_producto = $_GET['idProducto'];
//$cantidad_producto = $_GET['cantidad'];
//$id_usuario = 2;
//$id_producto = 1;
//$cantidad_producto = 10;
function conectar() {

    $server = "localhost";
    $user = "root";
    $pass = "";
    $bd = "usuarios";

    $conexion = mysqli_connect($server, $user, $pass, $bd);

    if ($conexion) {
        echo 'La conexion de la base de datos se ha hecho satisfactoriamente';
    } else {
        echo 'Ha sucedido un error inexperado en la conexion de la base de datos';
    }

    return $conexion;
}

function desconectar($conexion) {

    $close = mysqli_close($conexion);

    if ($close) {
        echo 'La desconexion de la base de datos se ha hecho satisfactoriamente';
    } else {
        echo 'Ha sucedido un error inexperado en la desconexion de la base de datos';
    }
}


$conexion = conectar();
$cantidad_producto = (int) $cantidad_producto;
$sql = "UPDATE venta SET cantidad = $cantidad_producto WHERE usuario = $id_usuario AND producto = $id_producto";
      //UPDATE productos SET stock = stock - $cantidad  WHERE  cod_producto = $id

mysqli_set_charset($conexion, "utf8");

$resultado = mysqli_query($conexion, $sql);
echo '<br>';
print_r($resultado);

if (!$resultado) {
    die();
}

desconectar($conexion);
