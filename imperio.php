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
        <link href="css/EstilosProducto.css" rel="stylesheet" type="text/css"/>


        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="js/main.js" type="text/javascript"></script>
        <title>Imperio</title>
    </head>
    <body>
        <?php
        $sql = "SELECT * FROM productos where categoria = 'imperio'";

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
                    <h1>Inicio</h1>
                </div>
                <div class="col-xs-3">

                </div>
            </div>
            <br>
            <div class="row">
                <div class="row fondoBlanco">
                    <h2>Productos del imperio</h2>
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
                                    <button class="btn btn-default" title="Añadir al carro" onclick="anadir($codigo);">
                                        <span class="fa fa-shopping-cart"></span>
                                    </button>
                                </div>
                                <a href="producto.php?id=$id_user&codigo=$codigo&precio=$precio&nombre=$nombre&descripcion=$descripcion&imagen=$imagen"> <img src="imagenes/$imagen" class="img-responsive" alt="$nombre" /> </a>
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
        <script>

            function anadir(idProducto) {
                var usuario = <?php echo $id_user; ?>;
                var codProducto = idProducto;
                console.log("usuario " + usuario + " produc" + codProducto);
                var parametro = {
                    "usuario": usuario,
                    "idProducto": codProducto
                };

                $.ajax({
                    data: parametro,
                    url: "anadirVenta.php",
                    method: "POST",
                    success: function (response) {
                        alert("Producto añadido");
                    }
                });
            }

        </script>
    </body>
</html>
