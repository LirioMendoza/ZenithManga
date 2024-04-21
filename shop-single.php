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
    <section>
        <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
            <div class="container text-light">
                <div class="w-100 d-flex justify-content-between">
                    <div id="cuadro-texto">
                        <p>° González Del Moral Ángel</p>
                        <p>° Mendoza de los Santos Lirio Aketzalli</p>
                        <p>° Ortíz Camacho Jessica Elizabeth</p>
                        <p>° Villeda Hernández Erick Ricardo</p>
                    </div>
                    <div>
                        <!-- Contacto -->
                        <img src="assets/img/components/correo.png" alt="" style="width: 25px;">
                        <a class="navbar-sm-brand text-light text-decoration-none"
                            href="#">administracion@zenithmanga.com</a>
                        <div style="margin-left: 1%;"></div>
                        <img src="assets/img/components/phone.png" alt="" style="width: 25px;">
                        <a class="navbar-sm-brand text-light text-decoration-none" href="#">01-800-123456789</a>
                    </div>
                    <div>
                        <!-- Logos redes sociales -->
                        <a class="text-light" href="http://facebook.com/" target="_blank" rel="sponsored"> <img
                                src="assets/img/components/facebook.png" alt="" style="width: 27px;"></a>
                        <a class="text-light" href="https://www.instagram.com/" target="_blank"><img
                                src="assets/img/components/instagram.png" alt="" style="width: 27px;"></a>
                        <a class="text-light" href="https://www.twitter.com/" target="_blank"><img
                                src="assets/img/components/twitter.png" alt="" style="width: 27px;"></a>
                        <a class="text-light" href="https://www.linkedin.com/" target="_blank"><img
                                src="assets/img/components/x.png" alt="" style="width: 27px;"></a>
                    </div>
                </div>
            </div>
        </nav>
    </section>
    <!-- FIN Header -->

    <!-- Nav -->
    <section>
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
                            <img src="assets/img/components/carrito.png" alt="" style="width: 25px; margin-top: 9px">
                            <span
                                class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">0</span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </section>
    <!-- FIN Nav -->

    <!-- Body principal -->
    <section>
        <!-- Conexion a la base de datos -->
        <section>
            <?php
            include ("assets/php/conexion.php");
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
            <div class="container pt-4" style="display: flex; justify-content: flex-end;">
                <a href="shop.php"><button class="btn btn-primary">Volver</button></a>
            </div>
        </section>

        <!-- Primera seccion -->
        <section class="bg-light">
            <div class="container pb-4 mb-3">
                <div class="row">
                    <div class="col-lg-4 mt-4">
                        <div class="card mb-3">
                            <?php
                            $id = $_POST["id"];
                            $imagen = "assets/img/products/" . $id . ".png";
                            if (!file_exists($imagen)) {
                                $imagen = "assets/img/products/error.jpeg";
                            }
                            ?>
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
                                                    $imagen = "assets/img/products/2.png";
                                                    ?>
                                                    <img class="card-img img-fluid" src="<?php echo $imagen; ?>"
                                                        alt="Product Image 1">
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <a href="#">
                                                    <?php
                                                    $imagen = "assets/img/products/3.png";
                                                    ?>
                                                    <img class="card-img img-fluid" src="<?php echo $imagen; ?>"
                                                        alt="Product Image 2">
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <a href="#">
                                                    <?php
                                                    $imagen = "assets/img/products/1.png";
                                                    ?>
                                                    <img class="card-img img-fluid" src="<?php echo $imagen; ?>"
                                                        alt="Product Image 3">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/.First slide-->
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
                                    <h5 class="py-2"><strong style="color: #339900">
                                            $
                                            <?php echo $value["precio"] * 17; ?> MXN
                                        </strong></h5>
                                    <p class="py-2">
                                        <?php for ($i = 0; $i < $value['calificacion']; $i++) { ?>
                                            <img src="assets/img/components/estrella1.png" alt=""
                                                style="width: 20px; height: 20px">
                                        <?php } ?>
                                        <?php for ($i = $value['calificacion']; $i < 5; $i++) { ?>
                                            <img src="assets/img/components/estrella2.png" alt=""
                                                style="width: 20px; height: 20px">
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
                                        <?php echo $value["descripcion"]; ?> El manga es un cómic japonés caracterizado por
                                        su
                                        estilo artístico, narrativa y formato.
                                        Se distingue por sus líneas finas, ojos grandes, onomatopeyas llamativas y una
                                        amplia
                                        variedad de géneros, desde romance hasta ciencia ficción. Se lee de derecha a
                                        izquierda,
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
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>

        <!-- Segunda seccion -->
        <section>
            <?php
            include ("assets/php/conexion.php");
            $sql = "SELECT id, nombre, descripcion, precio, calificacion, categoria FROM productos WHERE id > 1 LIMIT 4;";
            $result = $conn->query($sql);
            $data2 = array();
            while ($row = $result->fetch_assoc()) {
                $data2[] = $row;
            }
            $conn->close();
            ?>
            <div class="container mt-1">
                <h1 style="color: red; margin-left: 2% !important; ">Productos relacionados:</h1>
            </div>
            <div class="container" style="display: flex; justify-content: flex-end;">
                <a href="shop.php"><button class="btn btn-primary">Volver</button></a>
            </div>
            <div class="container row mb-4">
                <?php foreach ($data2 as $key => $value) { ?>
                    <div class="col-sm-6 col-md-4 col-lg-3 mb-3" style="height: 850px; ">
                        <div class="card" style="height: 100%;">
                            <?php
                            $id = $value['id'];
                            $imagen = "assets/img/products/" . $id . ".png";
                            if (!file_exists($imagen)) {
                                $imagen = "assets/img/products/error.jpeg";
                            }
                            ?>
                            <img src="<?php echo $imagen; ?>" alt="Card image cap" class="card-img-top"
                                style="height: 500px;">
                            <div class="card-body">
                                <div style="height: 10%;">
                                    <h5 class="card-title">
                                        <?php echo $value['nombre']; ?>
                                    </h5>
                                </div>
                                <div style="height: 10%;">
                                    <p style="display: flex; justify-content: flex-end; color: red ;"><strong>
                                            <?php echo $value['categoria']; ?>
                                        </strong></p>
                                </div>
                                <div style="height: 40%;">
                                    <p style="font-size: 1rem !important;" class="card-text">
                                        <?php echo $value['descripcion']; ?>
                                    </p>
                                </div>
                                <div style="height: 15%;">
                                    <h6 class="card-subtitle mb-2 text-muted"><strong>$
                                            <?php echo $value['precio'] * 17; ?> MXN
                                        </strong></h6>
                                </div>
                                <div style="height: 10%;">
                                    <form action="shop-single.php" method="post" id="verMasForm">
                                        <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
                                        <button type="submit" class="btn btn-primary">Ver más</button>
                                    </form>
                                </div>
                                <div class="card-rating" style="height: 15%; display: flex; justify-content: flex-end;">
                                    <?php for ($i = 0; $i < $value['calificacion']; $i++) { ?>
                                        <img src="assets/img/components/estrella1.png" alt="" style="width: 20px; height: 20px">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
    </section>
    <!-- FIN Body principal -->

    <!-- Footer -->
    <section>
        <footer class="bg-dark" id="tempaltemo_footer">
            <div class="container">
                <div class="row">
                    <!-- Datos de la empresa -->
                    <div class="col-md-4 pt-5">
                        <h2 class="h2 text-warning border-bottom pb-3 border-light logo">Zenith Manga</h2>
                        <ul class="list-unstyled text-light footer-link-list">
                            <li>
                                <img src="assets/img/components/point.png" alt="" style="width: 25px;">
                                Av. Universidad 3000, Ciudad Universitaria, Coyoacán, Cd. Mx., CP 04510
                            </li>
                            <li>
                                <img src="assets/img/components/phone.png" alt="" style="width: 25px;">
                                <a class="text-decoration-none" href="#">01-800-123456789</a>
                            </li>
                            <li>
                                <img src="assets/img/components/correo.png" alt="" style="width: 25px;">
                                <a class="text-decoration-none" href="#">administracion@zenithmanga.com</a>
                            </li>
                            <br>
                            <li style="margin-left: 50px;">
                                <img src="assets/img/components/fi_unam.png" alt="FI UNAM" width="130">
                            </li>
                        </ul>
                    </div>
                    <!-- Links de la pagina -->
                    <div class="col-md-4 pt-5">
                        <h2 class="h2 text-light border-bottom pb-3 border-light">Nosotros</h2>
                        <ul class="list-unstyled text-light footer-link-list">
                            <li><img src="assets/img/components/flecha.png" alt="" style="width: 20px;"><a
                                    class="text-decoration-none" href="index.html">
                                    Inicio</a></li>
                            <li><img src="assets/img/components/flecha.png" alt="" style="width: 20px;"><a
                                    class="text-decoration-none" href="about.html">
                                    Nosotros</a></li>
                            <li><img src="assets/img/components/flecha.png" alt="" style="width: 20px;"><a
                                    class="text-decoration-none" href="shop.php">
                                    Tienda</a></li>
                            <li><img src="assets/img/components/flecha.png" alt="" style="width: 20px;"><a
                                    class="text-decoration-none" href="shop.php">
                                    Productos</a></li>
                            <li><img src="assets/img/components/flecha.png" alt="" style="width: 20px;"><a
                                    class="text-decoration-none" href="contact.html">
                                    Contacto</a></li>
                        </ul>
                    </div>
                    <!-- Autores de la empresa -->
                    <div class="col-md-4 pt-5">
                        <h2 class="h2 text-light border-bottom pb-3 border-light">Autores</h2>
                        <ul class="list-unstyled text-light footer-link-list">
                            <li>
                                <img src="assets/img/components/user.png" alt="" style="width: 25px;">
                                González Del Moral Ángel
                            </li>
                            <li>
                                <img src="assets/img/components/user.png" alt="" style="width: 25px;">
                                Mendoza de los Santos Lirio Aketzalli
                            </li>
                            <li>
                                <img src="assets/img/components/user.png" alt="" style="width: 25px;">
                                Ortíz Camacho Jessica Elizabeth
                            </li>
                            <li>
                                <img src="assets/img/components/user.png" alt="" style="width: 25px;">
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
                                <a class="text-light text-decoration-none" target="_blank"
                                    href="http://facebook.com/"><img src="assets/img/components/facebook.png" alt=""
                                        style="width: 27px;"></a>
                            </li>
                            <li class="list-inline-item border border-light rounded-circle text-center">
                                <a class="text-light text-decoration-none" target="_blank"
                                    href="https://www.instagram.com/"><img src="assets/img/components/instagram.png"
                                        alt="" style="width: 27px;"></a>
                            </li>
                            <li class="list-inline-item border border-light rounded-circle text-center">
                                <a class="text-light text-decoration-none" target="_blank"
                                    href="https://twitter.com/"><img src="assets/img/components/twitter.png" alt=""
                                        style="width: 27px;"></a>
                            </li>
                            <li class="list-inline-item border border-light rounded-circle text-center">
                                <a class="text-light text-decoration-none" target="_blank"
                                    href="https://www.linkedin.com/"><img src="assets/img/components/x.png" alt=""
                                        style="width: 27px;"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <div class="input-group mb-2">
                            <form action="assets/php/suscripcion.php" method="post" style="display: flex;"
                                name="formulario">
                                <input class="form-control bg-light border-light" type="email" name="correo" id="correo"
                                    placeholder="Correo electronico">
                                <input class="input-group-text btn-success text-light" type="submit"
                                    value="Suscribirse">
                                <input type="hidden" name="redirect" value="../../shop-single.php">
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
                            <p class="text-left text-light"
                                style="text-align: center; color: rgb(246, 87, 87) !important;">
                                Última actualización: 20 de mayo de 2024.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </section>
    <!-- FIN Footer -->

    <!-- Start Script -->
    <script src="assets/js/validacionSuscripciones.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- End Script -->
</body>

</html>