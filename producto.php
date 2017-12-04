<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/estilos2.css" rel="stylesheet" type="text/css"/>
        <link href="css/fonts.css" rel="stylesheet" type="text/css"/>
        <link href="css/starwars-glyphicons.css" rel="stylesheet">
        <link href="css/EstilosProducto.css" rel="stylesheet" type="text/css"/>


        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="js/main.js" type="text/javascript"></script>
        <title>Tienda</title>
    </head>
    <body>
        <?php
        $nombre = $_GET['nombre'];
        $precio = $_GET['precio'];
        $descripcion = $_GET['descripcion'];
        $cod_producto = $_GET['codigo'];
        $imagen = $_GET['imagen'];
        
        ?>
        <header>
            <div class="menu_bar">
                <a href="#" class="btn-menu"><span class="icon-menu"></span>Menu</a>
            </div>
            <nav>
                <ul class="derecha">
                    <li><a href="inicio.php"><span class="icon-home"></span>Incio</a></li>
                    <li class="submenu">
                        <a href="tienda.php"><span class="icon-cart"></span>Tienda</a>
                        <ul class="hijo">
                            <li><a href="imperio.php">Imperio<span class="swg swg-galemp swg-2x"></span></a></li>
                            <li><a href="rebelion.php">Rebelión<span class=" swg swg-reball swg-2x"></span></a></li>
                            <li><a href="republica.php">República <span class=" swg swg-galrep swg-2x"></span></a></li>
                            <li><a href="separatistas.php">Separatistas<span class=" swg swg-separ swg-2x"></span></a></li>
                        </ul>
                    </li>
                    <li><a href="#"><span class="icon-user"></span>Mi cuenta</a></li>
                    <li><a href="cerrarSesion.php"><span class="icon-exit"></span>Cerrar sesión</a></li>
                </ul>
            </nav>
        </header>
        <div class="container">
            <div class="row fondoBlanco">
                <div class="col-xs-8">
                    <h1><?php echo $nombre ?></h1>
                </div>
                <div class="col-xs-3">
                    
                </div>
                <br><br><br><br><br>
                <?php
                    
                    PRINT <<<HERE
                <div class="container-fluid">
                    <div class="content-wrapper">
                        <div class="item-container">
                            <div class="container">
                                <div class="col-md-12">
                                    <div class="product col-md-3 service-image-left">
                                        <center>
                                            <img id="item-display" class="img-responsive" src="imagenes/$imagen" alt="$nombre">
                                        </center>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="product-title">$nombre</div>
                                        <div class="product-desc">$descripcion</div>
                                        <hr>
                                        <div class="product-price">$precio <span class="swg swg-credits"></span></div>
                                        <div class="product-stock">In Stock</div>
                                        <div class="btn-group cart">
                                            <button type="button" class="btn btn-success">
                                                Añadir al carro
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
HERE;
                
                ?>
                
                <br><br><br>
            </div>
            <br>

        </div>
    </body>
</html>
