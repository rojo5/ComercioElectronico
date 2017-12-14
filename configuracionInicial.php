<?php

$db_username = 'root';
$db_password = '';
$db_name = 'usuarios';
$db_host = 'localhost';

$moneda = '€';
$gastosEnvio ='5';
$impuesto = '21';

$mysqli_conn = new mysqli($db_host, $db_username, $db_password,$db_name); // conexion

if ($mysqli_conn->connect_error) {//Mensajes en caso de error;
    die('Error : ('. $mysqli_conn->connect_errno .') '. $mysqli_conn->connect_error);
}
