<?php
session_start();

define('DB_HOST','localhost');
define('DB_DATABASE','usuarios');
define('DB_USER','root');
define('DB_PASS','');


$conex = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
if($conex->connect_errno > 0){
 die("Imposible conectarse con la base de datos [" . $conex->connect_error . "]");
} 

$username = $_POST['usuario'];
$password = $_POST['clave'];

$sql = "SELECT * FROM usuarios WHERE nombre =  '$username'";

$result = $conex->query($sql);

if ($result->num_rows > 0) { }

$row = $result->fetch_array(MYSQLI_ASSOC);
 if ($password === $row['password']) { 
     header('Location: productos.php');
 } else{
     
     print_r($row['password']);
     
     
     echo "<br>";
     
     echo "Username o Password estan incorrectos.";

   echo "<br><a href='index.html'>Volver a Intentarlo</a>";
 }