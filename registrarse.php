<?php

$usuario = $_POST['rUsuario'];
$mail = $_POST['rMail'];
$passwd = $_POST['rPass'];
$passwd2 = $_POST['rPass2'];

//$usuario = 'pepe';
//$mail = 'pepe@pepe.es';
//$passwd = '123';
//$passwd2 = '123';

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

//Conexion a la BBDD 
$conexion = conectar();

//Consulta
mysqli_set_charset($conexion, "utf8");
$compruebaUser = "SELECT * FROM usuarios WHERE nombre ='$usuario'";
print_r($compruebaUser);
$resultado = mysqli_query($conexion, $compruebaUser);

$existe = mysqli_num_rows($resultado);

if ($existe == 1) {
    header('Location: registro.php?existe=true');
    return;
} else if ($passwd != $passwd2) {
    header('Location: registro.php?passIncorrecta=true');
}
$insertar = "INSERT INTO usuarios (nombre, correo, password) VALUES ( '$usuario', '$mail', '$passwd')";

if ($resultado = mysqli_query($conexion, $insertar)) {
    header('Location: index.html?registro=true');
}
desconectar($conexion);


