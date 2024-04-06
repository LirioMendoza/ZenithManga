<!DOCTYPE html>
<html lang="en">

<head>
    <title>Proyecto Final-Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Estilos CSS de bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Estilos propios -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Estilos de letra -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <!-- Iconos -->
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <!-- Contacto -->
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none"
                        href="#">administracion@zenithmanga.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="#">01-800-123456789</a>
                </div>
                <div>
                    <!-- Logos redes sociales -->
                    <a class="text-light" href="http://facebook.com/" target="_blank" rel="sponsored"><i
                            class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/" target="_blank"><i
                            class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.twitter.com/" target="_blank"><i
                            class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i
                            class="fab fa-linkedin fa-sm fa-fw"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- FIN Header -->

    <!-- Nav -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Logo empresa -->
            <a class="navbar-brand text-warning logo h1 align-self-center" href="index.html">
                Zenith
            </a>
            <!-- Menu de hambuergesa (responsive) -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Menu de opciones -->
            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between"
                id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shop.php">Tienda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contacto</a>
                        </li>
                    </ul>
                </div>
                <br>
                <div class="navbar align-self-center d-flex">
                    <!-- Imagen de carrito -->
                    <a class="nav-icon position-relative text-decoration-none" href="#">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        <span
                            class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">0</span>
                    </a>
                    <!-- Imagen de usuario -->
                    <a class="nav-icon position-relative text-decoration-none" href="#">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>
                        <span
                            class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">+99</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <!-- FIN Nav -->

    <?php
    include ("php/conexion.php");
    if (isset($_POST["id"])) {
        $id = $_POST["id"];
        $sql = "SELECT id, nombre, descripcion, precio, calificacion, categoria FROM productos WHERE id = $id";
    } else {
        $sql = "SELECT id, nombre, descripcion, precio, calificacion, categoria FROM productos WHERE id = 1";
    }
    $result = $conn->query($sql);
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    $conn->close();
    ?>
    <!-- Body principal -->
    <!-- Open Content -->
    <?php
    $id = $_POST["id"] % 20;
    if ($id == 0) {
        $id = 1;
    }
    $imagen = "img/shop/Extras/" . $id . ".png";
    if (!file_exists($imagen)) {
        $imagen = "img/shop/Products/error.jpg";
    }
    ?>
    <div class="container pt-4" style="display: flex; justify-content: flex-end;">
        <a href="shop.php"><button type="button" class="btn btn-danger">Volver</button></a>
    </div>
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-4 mt-4">
                    <div class="card mb-3">
                        <img class="card-img img-fluid" src="<?php echo $imagen; ?>" alt="Card image cap"
                            id="product-detail">
                    </div>
                    <div class="row">
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-dark fas fa-chevron-left"></i>
                                <span class="sr-only"></span>
                            </a>
                        </div>
                        <!--End Controls-->

                        <!--Start Carousel Wrapper-->
                        <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item"
                            data-bs-ride="carousel">
                            <!--Start Slides-->
                            <div class="carousel-inner product-links-wap" role="listbox">

                                <!--First slide-->
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                <?php
                                                $id = ($id * 17) % 20;
                                                if ($id == 0) {
                                                    $id = 1;
                                                }
                                                $imagen = "img/shop/Extras/" . $id . ".png";
                                                ?>
                                                <img class="card-img img-fluid" src="<?php echo $imagen; ?>"
                                                    alt="Product Image 1">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <?php
                                                $id = ($id * 17) % 20;
                                                if ($id == 0) {
                                                    $id = 1;
                                                }
                                                $imagen = "img/shop/Extras/" . $id . ".png";
                                                ?>
                                                <img class="card-img img-fluid" src="<?php echo $imagen; ?>"
                                                    alt="Product Image 2">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <?php
                                                $id = ($id * 17) % 20;
                                                if ($id == 0) {
                                                    $id = 1;
                                                }
                                                $imagen = "img/shop/Extras/" . $id . ".png";
                                                ?>
                                                <img class="card-img img-fluid" src="<?php echo $imagen; ?>"
                                                    alt="Product Image 3">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--/.First slide-->

                                <!--Second slide-->
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                <?php
                                                $id = ($id * 17) % 20;
                                                if ($id == 0) {
                                                    $id = 1;
                                                }
                                                $imagen = "img/shop/Extras/" . $id . ".png";
                                                ?>
                                                <img class="card-img img-fluid" src="<?php echo $imagen; ?>"
                                                    alt="Product Image 4">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <?php
                                                $id = ($id * 17) % 20;
                                                if ($id == 0) {
                                                    $id = 1;
                                                }
                                                $imagen = "img/shop/Extras/" . $id . ".png";
                                                ?>
                                                <img class="card-img img-fluid" src="<?php echo $imagen; ?>"
                                                    alt="Product Image 5">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <?php
                                                $id = ($id * 17) % 20;
                                                if ($id == 0) {
                                                    $id = 1;
                                                }
                                                $imagen = "img/shop/Extras/" . $id . ".png";
                                                ?>
                                                <img class="card-img img-fluid" src="<?php echo $imagen; ?>"
                                                    alt="Product Image 6">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--/.Second slide-->

                                <!--Third slide-->
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                <?php
                                                $id = ($id * 17) % 20;
                                                if ($id == 0) {
                                                    $id = 1;
                                                }
                                                $imagen = "img/shop/Extras/" . $id . ".png";
                                                ?>
                                                <img class="card-img img-fluid" src="<?php echo $imagen; ?>"
                                                    alt="Product Image 7">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <?php
                                                $id = ($id * 17) % 20;
                                                if ($id == 0) {
                                                    $id = 1;
                                                }
                                                $imagen = "img/shop/Extras/" . $id . ".png";
                                                ?>
                                                <img class="card-img img-fluid" src="<?php echo $imagen; ?>"
                                                    alt="Product Image 8">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <?php
                                                $id = ($id * 17) % 20;
                                                if ($id == 0) {
                                                    $id = 1;
                                                }
                                                $imagen = "img/shop/Extras/" . $id . ".png";
                                                ?>
                                                <img class="card-img img-fluid" src="<?php echo $imagen; ?>"
                                                    alt="Product Image 9">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--/.Third slide-->
                            </div>
                            <!--End Slides-->
                        </div>
                        <!--End Carousel Wrapper-->

                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-dark fas fa-chevron-right"></i>
                                <span class="sr-only"></span>
                            </a>
                        </div>
                        <!--End Controls-->
                    </div>
                </div>
                <!-- col end -->
                <?php foreach ($data as $key => $value) { ?>
                    <div class="col-lg-8 mt-4">
                        <div class="card">
                            <div class="card-body" style="background-color: #f5f5f5;">
                                <h1 style="color: red"><strong>
                                        <?php echo $value["nombre"]; ?>
                                    </strong></h1>
                                <p class="py-2"><strong>Precio:
                                        $
                                        <?php echo $value["precio"] * 17; ?> MXN
                                    </strong></p>
                                <p class="py-2">
                                    <?php for ($i = 0; $i < $value['calificacion']; $i++) { ?>
                                        <i class="fa fa-star text-warning"></i>
                                    <?php } ?>
                                    <?php for ($i = $value['calificacion']; $i < 5; $i++) { ?>
                                        <i class="fa fa-star text-secondary"></i>
                                    <?php } ?>

                                    <span class="list-inline-item text-dark">Calificación: <strong>
                                            <?php echo $value["calificacion"]; ?>
                                        </strong> | Comentarios: <strong>
                                            <?php echo $value["calificacion"] * 34; ?>
                                        </strong></span>
                                </p>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <h5 style="color: red">Categoria:</h5>
                                    </li>
                                    <li class="list-inline-item">
                                        <p class="text-muted"><strong>
                                                <?php echo $value["categoria"]; ?>
                                            </strong></p>
                                    </li>
                                </ul>

                                <h5 style="color: red">Descripción:</h5>
                                <p style="text-align: justify;">
                                    <?php echo $value["descripcion"]; ?> El manga es un cómic japonés caracterizado por su
                                    estilo artístico, narrativa y formato.
                                    Se distingue por sus líneas finas, ojos grandes, onomatopeyas llamativas y una amplia
                                    variedad de géneros, desde romance hasta ciencia ficción. Se lee de derecha a izquierda,
                                    con diálogos en globos y narración para explicar el contexto. Se publica en páginas
                                    sueltas, generalmente en blanco y negro, y luego se recopila en volúmenes.
                                </p>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <h5 style="color: red">Disponiblres en Tienda:</h5>
                                    </li>
                                    <li class="list-inline-item">
                                        <p class="text-muted"><strong>
                                                <?php echo $value["calificacion"] * 3; ?> piezas
                                            </strong></p>
                                    </li>
                                </ul>

                                <h5 style="color: red">Especificaciones:</h5>
                                <ul class="list-unstyled pb-3">
                                    <li>• Tamaño de página: B5 (210 x 297 mm).</li>
                                    <li>• Grosor del papel: 90-120 g/m².</li>
                                    <li>• Número de páginas: 200-400 páginas.</li>
                                    <li>• Encuadernación: Rústica con lomo pegado.</li>
                                    <li>• Colores: Blanco y negro (con algunas páginas a color).</li>
                                    <li>• Tipo de impresión: Offset o digital.</li>
                                    <li>• Calidad de impresión: Buena.</li>
                                </ul>

                                <form action="" method="GET">
                                    <input type="hidden" name="product-title" value="Activewear">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <ul class="list-inline pb-3">
                                                <li class="list-inline-item text-right">
                                                    Cantidad:
                                                    <input type="hidden" name="product-quanity" id="product-quanity"
                                                        value="1">
                                                </li>
                                                <li class="list-inline-item"><span class="btn btn-success"
                                                        id="btn-minus">-</span></li>
                                                <li class="list-inline-item"><span class="badge bg-secondary"
                                                        id="var-value">1</span></li>
                                                <li class="list-inline-item"><span class="btn btn-success"
                                                        id="btn-plus">+</span></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <ul class="list-inline pb-3">
                                                <li class="list-inline-item">Calidad:
                                                    <input type="hidden" name="product-size" id="product-size" value="S">
                                                </li>
                                                <li class="list-inline-item"><span
                                                        class="btn btn-success btn-size">Regular</span>
                                                </li>
                                                <li class="list-inline-item"><span
                                                        class="btn btn-success btn-size">Premium</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row pb-3">
                                        <div class="col d-grid">
                                            <button class="btn-success btn-lg" disabled>Comprar</button>
                                        </div>
                                        <div class="col d-grid">
                                            <button class="btn-success btn-lg" disabled>Añadir al carrito</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <!-- Close Content -->


    <!-- FIN Body principal -->



    <!-- Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">
                <!-- Datos de la empresa -->
                <div class="col-md-4 pt-5">
                    <h5 style="color: red" class="h5 style=" color: red" text-warning border-bottom pb-3 border-light
                        logo">Zenith Manga</h5>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            Av. Universidad 3000, Ciudad Universitaria, Coyoacán, Cd. Mx., CP 04510
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="#">01-800-123456789</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="#">administracion@zenithmanga.com</a>
                        </li>
                        <br>
                        <li style="margin-left: 50px;">
                            <img src="./img/componentes/fi_unam.png" alt="FI UNAM" width="130">
                        </li>
                    </ul>
                </div>

                <!-- Links de la pagina -->
                <div class="col-md-4 pt-5">
                    <h5 style="color: red" class="h5 style=" color: red" text-light border-bottom pb-3 border-light">
                        Nosotros</h5>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><i class="fa fa-arrow-right fa-fw"></i><a class="text-decoration-none" href="index.html">
                                Inicio</a></li>
                        <li><i class="fa fa-arrow-right fa-fw"></i><a class="text-decoration-none" href="about.html">
                                Nosotros</a></li>
                        <li><i class="fa fa-arrow-right fa-fw"></i><a class="text-decoration-none" href="shop.php">
                                Tienda</a></li>
                        <li><i class="fa fa-arrow-right fa-fw"></i><a class="text-decoration-none" href="shop.php">
                                Productos</a></li>
                        <li><i class="fa fa-arrow-right fa-fw"></i><a class="text-decoration-none" href="contact.html">
                                Contacto</a></li>
                    </ul>
                </div>

                <!-- Autores de la empresa -->
                <div class="col-md-4 pt-5">
                    <h5 style="color: red" class="h5 style=" color: red" text-light border-bottom pb-3 border-light">
                        Autores</h5>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fa fa-user fa-fw"></i>
                            González Del Moral Ángel
                        </li>
                        <li>
                            <i class="fa fa-user fa-fw"></i>
                            Mendoza de los Santos Lirio Aketzalli
                        </li>
                        <li>
                            <i class="fa fa-user fa-fw"></i>
                            Ortíz Camacho Jessica Elizabeth
                        </li>
                        <li>
                            <i class="fa fa-user fa-fw"></i>
                            Villeda Hernández Erick Ricardo
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Logos de redes sociales -->
            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
                <div class="col-auto me-auto">
                    <ul class="list-inline text-left footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i
                                    class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank"
                                href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i
                                    class="fab fa-twitter fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank"
                                href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-auto">
                    <div class="input-group mb-2">
                        <form action="php/suscripcion.php" method="post" style="display: flex;" name="formulario">
                            <input class="form-control bg-light border-light" type="email" name="correo" id="correo"
                                placeholder="Correo electronico">
                            <input class="input-group-text btn-success text-light" type="submit" value="Suscribirse">
                            <input type="hidden" name="redirect" value="../shop.html">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Derechos reservados -->
        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-light" style="text-align: center;">
                            Copyright &copy; 2024 - Todos los derechos reservados a Zenith Manga.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- FIN Footer -->

    <!-- Bottom de scroll -->
    <button class="scroll-to-top"><i class="fa fa-arrow-up fa-fw"></i></button>
    <!-- FIN Bottom de scroll -->

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="js/validacionSuscripciones.js"></script>
    <script src="js/scroll.js"></script>
    <!-- <script src="js/producto.js"></script> -->
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>

    <!-- End Script -->
</body>

</html>