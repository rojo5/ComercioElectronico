<?php

//$id_usuario = $_POST['usuario'];
$id_usuario = $_POST['usuario'];

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

mysqli_set_charset($conexion, "utf8");

$sql = "SELECT producto, cantidad FROM venta WHERE usuario = $id_usuario ";

$resultado = mysqli_query($conexion, $sql);

if (!$resultado) {
    die();
}

$comprados = mysqli_fetch_all($resultado);

for ($i = 0; $i < count($comprados); $i++) {
    $id = $comprados[$i][0];
    $cantidad = $comprados[$i][1];
    $sql2 = "UPDATE productos SET stock = stock - $cantidad  WHERE  cod_producto = $id";

    $resultado2 = mysqli_query($conexion, $sql2);

    if (!$resultado2) {
        die();
    }
}
echo '<br>';
print_r($comprados);

$sql3 = "DELETE FROM venta WHERE usuario = $id_usuario ";

    $resultado3 = mysqli_query($conexion, $sql3);

    if (!$resultado3) {
        die();
    }


desconectar($conexion);

header('Location: realizado.php?id='.$id_usuario);

