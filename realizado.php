<?php
session_start();
include './configuracionInicial.php';
$id_user = $_GET['id'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/estilos2.css" rel="stylesheet" type="text/css"/>
        <link href="css/fonts.css" rel="stylesheet" type="text/css"/>
        <link href="css/starwars-glyphicons.css" rel="stylesheet">



        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="js/main.js" type="text/javascript"></script>

        <title>Tienda</title>
    </head>
    <body>
        <header>
            <div class="menu_bar">
                <a href="#" class="btn-menu"><span class="icon-menu"></span>Menu</a>
            </div>
            <nav>
                <ul class="derecha">
                    <li><a href="inicio.php?id=<?php echo $id_user; ?>"><span class="icon-home"></span>Incio</a></li>
                    <li class="submenu">
                        <a href="tienda.php?id=<?php echo $id_user; ?>"><span class="icon-cart"></span>Tienda</a>
                        <ul class="hijo">
                            <li><a href="imperio.php?id=<?php echo $id_user; ?>">Imperio<span class="swg swg-galemp swg-2x"></span></a></li>
                            <li><a href="rebelion.php?id=<?php echo $id_user; ?>">Rebelión<span class=" swg swg-reball swg-2x"></span></a></li>
                            <li><a href="republica.php?id=<?php echo $id_user; ?>">República <span class=" swg swg-galrep swg-2x"></span></a></li>
                            <li><a href="separatistas.php?id=<?php echo $id_user; ?>">Separatistas<span class=" swg swg-separ swg-2x"></span></a></li>
                        </ul>
                    </li>
                    <li><a href="carrito.php?id=<?php echo $id_user; ?>"><span class="icon-user"></span>Mi carrito</a></li>
                    <li><a href="cerrarSesion.php"><span class="icon-exit"></span>Cerrar sesión</a></li>
                </ul>
            </nav>
        </header>

        <div class="container">
            <div class="row fondoBlanco">
                <div class="col-xs-8">
                    <h1>Lista de la compra</h1>
                </div>
                <div class="col-xs-3">
                    
                </div>
            </div>
            <br>
            <div class="row">
                <div class="row fondoBlanco margen">
                    <h1></h1>
                    <br><br>
                    <div class="text-center">
                    
                        <h1> <i class="swg swg-porg-1 swg-3x"></i>COMPRA REALIZADA <i class="swg swg-porg-1 swg-3x"></i></h1>
                        <br>
                        <br>
                        <br>
                    </div>
                </div>     
            </div>
        </div>
    </body>
</html>
