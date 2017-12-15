<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/starwars-glyphicons.css" rel="stylesheet" type="text/css"/>
        <link href="css/estilos.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
        <title>La cueva de los Porgs</title>
    </head>
    <body>
        <h1>La cueva de los Porgs<span class="swg swg-porg-2 swg-2x"></span></h1>
        <form class="formulario" method="POST" action="registrarse.php">
            <h2 class="form-titulo">Registrarse</h2>
            <div class="form-campos">
                <input type="mail"  id="rMail" name="rMail" placeholder="correo" class="form-input-largo" >
                <input type="text"  id="rUsuario" name="rUsuario" placeholder="Usuario" class="form-input-largo" >
                <input type="password"  id="rPass" name="rPass" placeholder="Contraseña" class="form-input-largo" >
                <input type="password"  id="rPass2" name="rPass2" placeholder="Contraseña" class="form-input-largo" >

                <input type="submit" value="registrarse" class="form-button">
                <p class="estrellita">¿Tienes cuenta?<a href="index.html">Pincha aquí</a></p>
            </div>
        </form>
    </form>

    <?php
    if (empty($_GET)) {
        
    } else {
        $valor;
        if (($valor = $_GET['registro'])) {
            if ($valor == true) {
                echo '<script>alert("Te has registrado correctamente...");</script>';
            }
        } else if (($valor = $_GET['existe'])) {
            if ($valor == true) {
                echo '<script>alert("El usuario ya existe...");</script>';
            }
        } else if (($valor = $_GET['passIncorrecta'])) {
            if ($valor == true) {
                echo '<script>alert("Las contraseñas no coinciden...");</script>';
            }
        }
    }
    ?>
</body>
</html>
