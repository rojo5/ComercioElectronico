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
        <link href="css/estiloCarrito.css" rel="stylesheet" type="text/css"/>


        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="js/main.js" type="text/javascript"></script>
        
        <title>Tienda</title>
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
                    <h1>Lista de la compra</h1>
                </div>
                <div class="col-xs-3">
                    <i class="swg swg-porg-1 swg-3x"></i>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="row fondoBlanco margen">
                    <h1></h1>
                    <br><br>
                    <div class="shopping-cart">
                        <div class="column-labels">
                            <label class="product-image">Imagen</label>
                            <label class="product-details">Producto</label>
                            <label class="product-price">Precio</label>
                            <label class="product-quantity">Cantidad</label>
                            <label class="product-removal">Eliminar</label>
                            <label class="product-line-price">Total</label>
                        </div>

                        <div class="product">
                            <div class="product-image">
                                <img src="https://www.thewrap.com/wp-content/uploads/2017/08/last-jedi-porg.jpg">
                            </div>
                            <div class="product-details">
                                <div class="product-title">Dingo Dog Bones</div>
                                <p class="product-description">The best dog bones of all time. Holy crap. Your dog will 
                                    be begging for these things! I got curious once and ate one myself. I'm a fan.</p>
                            </div>
                            <div class="product-price">12.99</div>
                            <div class="product-quantity">
                                <input type="number" value="2" min="1">
                            </div>
                            <div class="product-removal">
                                <button class="remove-product btn btn-danger">
                                    Eliminar
                                </button>
                            </div>
                            <div class="product-line-price">25.98</div>
                        </div>

                        <div class="product">
                            <div class="product-image">
                                <img src="https://cdn1.thr.com/sites/default/files/imagecache/scale_crop_768_433/2017/10/screen_shot_2017-10-31_at_11.32.11_am_3_-_h_2017.jpg">
                            </div>
                            <div class="product-details">
                                <div class="product-title">Nutro™ Adult Lamb and Rice Dog Food</div>
                                <p class="product-description">Who doesn't like lamb and rice? We've all hit the 
                                    halal cart at 3am while quasi-blackout after a night of binge drinking in Manhattan. 
                                    Now it's your dog's turn!.</p>
                            </div>
                            <div class="product-price">45.99</div>
                            <div class="product-quantity">
                                <input type="number" value="2" min="1">
                            </div>
                            <div class="product-removal">
                                <button class="remove-product btn btn-danger">
                                    Eliminar
                                </button>
                            </div>
                            <div class="product-line-price">45.99</div>
                        </div>

                        <div class="totals">
                            <div class="totals-item">
                                <label>Subtotal</label>
                                <div class="totals-value" id="cart-subtotal">71.97</div>
                            </div>
                            <div class="totals-item">
                                <label>IVA (5%)</label>
                                <div class="totals-value" id="cart-tax">3.60</div>
                            </div>
                            <div class="totals-item">
                                <label>Envio</label>
                                <div class="totals-value" id="cart-shipping">15.00</div>
                            </div>
                            <div class="totals-item totals-item-total">
                                <label>Total</label>
                                <div class="totals-value" id="cart-total">90.57</div>
                            </div>
                        </div>
                        <button class="checkout btn btn-success">Comprar</button>
                    </div>
                </div>     
            </div>
        </div>
        <script src="js/carrito.js" type="text/javascript"></script>
    </body>
</html>
