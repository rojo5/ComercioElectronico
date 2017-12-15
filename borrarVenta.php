<?php

$id_usuario = $_POST['usuario'];
$id_producto = $_POST['idProducto'];

//$id_usuario = 1;
//$id_producto = 1;

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

$sql = "DELETE FROM venta  WHERE usuario = '$id_usuario' AND producto = '$id_producto'";

$conexion = conectar();

mysqli_set_charset($conexion, "utf8");

$resultado = mysqli_query($conexion, $sql);
echo '<br>';
print_r($resultado);

if (!$resultado) {
    die();
}

desconectar($conexion);
