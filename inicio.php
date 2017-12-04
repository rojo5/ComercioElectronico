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
        <title>Inicio</title>
    </head>
    <body>
        <?php
        define('DB_HOST', 'localhost');
        define('DB_DATABASE', 'usuarios');
        define('DB_USER', 'root');
        define('DB_PASS', '');


        $conex = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);

//$sql ="SELECT cod_producto, precio, nombre, descripcion, stock, categoria FROM productos";
        $sql = "SELECT * FROM productos";

        $resultado = mysqli_query($conex, $sql);

        $productos = mysqli_fetch_all($resultado);
        ?>
        <header>
            <div class="menu_bar">
                <a href="#" class="btn-menu"><span class="icon-menu"></span>Menu</a>
            </div>
            <nav>
                <ul class="derecha">
                    <li><a href="#"><span class="icon-home"></span>Incio</a></li>
                    <li class="submenu">
                        <a href="#"><span class="icon-cart"></span>Tienda</a>
                        <ul class="hijo">
                            <li><a href="imperio.php">Imperio<span class="swg swg-galemp swg-2x"></span></a></li>
                            <li><a href="#">Rebelión<span class=" swg swg-reball swg-2x"></span></a></li>
                            <li><a href="#">República <span class=" swg swg-galrep swg-2x"></span></a></li>
                            <li><a href="#">Separatistas<span class=" swg swg-separ swg-2x"></span></a></li>
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
                    <h1>Inicio</h1>
                </div>
                <div class="col-xs-3">
                    <i class="swg swg-porg-1 swg-3x"></i>
                </div>
            </div>
            <div class="row">
                <div class="carrusel col-xs-12">
                    <img src="imagenes/foto1.jpg" alt="" class="mySlides"/>
                    <img src="imagenes/foto2.jpg" alt="" class="mySlides"/>
                    <img src="imagenes/foto3.jpg" alt="" class="mySlides"/>
                </div>
                <script>
                    var myIndex = 0;
                    carousel();
                    function carousel() {
                        var i;
                        var x = document.getElementsByClassName("mySlides");
                        for (i = 0; i < x.length; i++) {
                            x[i].style.display = "none";
                        }
                        myIndex++;
                        if (myIndex > x.length) {
                            myIndex = 1
                        }
                        x[myIndex - 1].style.display = "block";
                        setTimeout(carousel, 2000); // Change image every 2 seconds
                    }
                </script>
            </div>
            <br>
            <div class="row">
                <div class="row fondoBlanco">
                    <h2>Ultimos añadidos</h2>
                    <!--PRODUCTOS-->
                    <?php
                    for ($i = 0; $i < count($productos); $i++) {
                        $codigo = $productos[$i][0];
                        $precio = $productos[$i][1];
                        $nombre = $productos[$i][2];
                        $descripcion = $productos[$i][3];
                        $imagen = $productos[$i][6];
                        PRINT <<<HERE
                    <div class="col-sm-3">
                        <article class="col-item">
                            <input type="hidden" value="$codigo">
                            <div class="photo">
                                <div class="options-cart-round">
                                    <button class="btn btn-default" title="Add to cart">
                                        <span class="fa fa-shopping-cart"></span>
                                    </button>
                                </div>
                                <a href="producto.php"> <img src="imagenes/$imagen" class="img-responsive" alt="$nombre" /> </a>
                            </div>
                            <div class="info">
                                <div class="row">
                                    <div class="price-details col-md-6">
                                        <p class="details">$descripcion</p>
                                        <h1>$nombre</h1>
                                        <span class="price-new">$precio<i class="swg swg-credits"></i></span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
HERE;
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
