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
        <link href="css/estiloCarrito.css" rel="stylesheet" type="text/css"/>


        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="js/main.js" type="text/javascript"></script>

        <title>Tienda</title>
    </head>
    <body>
        <?php

        $sql = "SELECT * FROM productos WHERE  productos.cod_producto IN (SELECT venta.producto FROM venta WHERE venta.usuario = '$id_user')";

        $resultado = $mysqli_conn->query($sql);

        $productos = mysqli_fetch_all($resultado);
        ?>
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
                    <div class="shopping-cart">
                        <div class="column-labels">
                            <label class="product-image">Imagen</label>
                            <label class="product-details">Producto</label>
                            <label class="product-price">Precio</label>
                            <label class="product-quantity">Cantidad</label>
                            <label class="product-removal">Eliminar</label>
                            <label class="product-line-price">Total</label>
                        </div>

                        <?php
                        $total = count($productos);
                        for ($i = 0; $i < count($productos); $i++) {
                            $codigo = $productos[$i][0];
                            $precio = $productos[$i][1];
                            $nombre = $productos[$i][2];
                            $descripcion = $productos[$i][3];
                            $imagen = $productos[$i][6];
                            PRINT <<<HERE
                        <div class="product">
                            <div class="product-image">
                                <img src="imagenes/$imagen">
                            </div>
                            <div class="product-details">
                                <div class="product-title">$nombre</div>
                                <p class="product-description">$descripcion</p>
                            </div>
                            <div class="product-price">$precio</div>
                            <div class="product-quantity">
                                <input type="number" value="1" min="1" id="c$codigo" onchange="actualizar($codigo);">
                            </div>
                            <div class="product-removal">
                                <button class="remove-product btn btn-danger" onclick="borrar($codigo)">Eliminar</button>
                            </div>
                            <div class="product-line-price">$precio</div>
                        </div>
                        
HERE;
                        }
                        ?>

                        <div class="totals">
                            <div class="totals-item">
                                <label>Subtotal</label>
                                <div class="totals-value" id="cart-subtotal">0</div>
                            </div>
                            <div class="totals-item">
                                <label>IVA (5%)</label>
                                <div class="totals-value" id="cart-tax">0</div>
                            </div>
                            <div class="totals-item">
                                <label>Envio</label>
                                <div class="totals-value" id="cart-shipping">15.00</div>
                            </div>
                            <div class="totals-item totals-item-total">
                                <label>Total</label>
                                <div class="totals-value" id="cart-total">0</div>
                            </div>
                        </div>
                        <form action="comprar.php" method="post">
                            <input type="hidden" name="usuario" value="<?php echo $id_user; ?>">
                            <input type="submit" class="checkout btn btn-success" value="Comprar">
                        </form>
                        
                    </div>
                </div>     
            </div>
        </div>
        <script src="js/carrito.js" type="text/javascript"></script>
        <script>
            $(document).ready(function () {
                recalculateCart();
            });

            function borrar(idProducto) {
                var usuario = <?php echo $id_user; ?>;
                var codProducto = idProducto;
                console.log("usuario " + usuario + " produc" + codProducto);
                var parametro = {
                    "usuario": usuario,
                    "idProducto": codProducto
                };

                $.ajax({
                    data: parametro,
                    url: "borrarVenta.php",
                    method: "POST",
                    success: function (response) {
                        console.log("Producto eliminado");
                    }
                });
            }
            var cantidad;
            
            //NO FUNCIONA
            function actualizar(producActualiza) {
                var usuario = <?php echo $id_user; ?>;
                cantidad=$("#c"+producActualiza).val();
                cantidad = parseInt(cantidad);
                console.log(cantidad + " / " + producActualiza);
              var parametro = {
                    "usuario": usuario,
                    "producActualiza": producActualiza,
                    "cantidad": cantidad
                };
                console.log(parametro);

                $.ajax({
                    data: parametro,
                    url: "actualiza.php",
                    method: "POST",
                    success: function (response) {
                        console.log("Producto actualizado");
                    }
                });
            }
           

        </script>
    </body>
</html>
