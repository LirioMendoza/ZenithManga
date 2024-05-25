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
                        <a class="text-light" href="http://facebook.com/" target="_blank"<img
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
                            <li class="nav-item">
                                <a class="nav-link" href="#productos">Productos</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </section>
    <!-- FIN Nav -->

    <!-- Body principal -->
    <section>
        <div class="container-fluid bg-light py-5" style="background-color: rgb(255, 244, 244) !important;">
            <div class="container col-lg-8 col-sm-12">
                <h1 style="color: red">Buscador de mangas</h1>
                <form action="#" method="get" class="search-form">
                    <div class="form-group">
                        <label for="categoria">Categoría:</label>
                        <select name="categoria" id="categoria" class="form-control">
                            <option value="">Todas</option>
                            <option value="anime">Anime</option>
                            <option value="manga">Manga</option>
                            <option value="seinen">Seinen</option>
                            <option value="shonen">Shonen</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="orden">Orden:</label>
                        <select name="orden" id="orden" class="form-control">
                            <option value="nombre_asc">Nombre (A-Z)</option>
                            <option value="nombre_desc">Nombre (Z-A)</option>
                            <option value="calificacion_desc">Calificación (mayor a menor)</option>
                            <option value="calificacion_asc">Calificación (menor a mayor)</option>
                        </select>
                    </div>
                    <input type="hidden" name="search" value="active">
                    <button type="submit" class="btn btn-success">Buscar</button>
                </form>
                <?php
                include ("assets/php/conexion.php");
                if (isset($_GET['search'])) {
                    $categoria = isset($_GET['categoria']) ? $_GET['categoria'] : "";
                    $orden = isset($_GET['orden']) ? $_GET['orden'] : 'nombre_asc';
                    $sql = "SELECT * FROM productos ";
                    if ($categoria) {
                        $sql .= " WHERE categoria = '$categoria' ";
                    }
                    switch ($orden) {
                        case "nombre_asc":
                            $sql .= " ORDER BY nombre ASC;";
                            break;
                        case "nombre_desc":
                            $sql .= " ORDER BY nombre DESC;";
                            break;
                        case "calificacion_desc":
                            $sql .= " ORDER BY calificacion DESC;";
                            break;
                        case "calificacion_asc":
                            $sql .= " ORDER BY calificacion ASC;";
                            break;
                    }
                } else {
                    $sql = "SELECT id, nombre, descripcion, precio, calificacion, categoria FROM productos";
                }
                $result = $conn->query($sql);
                $data = array();
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
                $conn->close();
                ?>
            </div>
        </div>
        <br><br>
        <div class="container" id="productos">
            <h1 style="color: red">Nuestros productos</h1>
            <div class="row">
                <?php foreach ($data as $key => $value) { ?>
                    <div class="col-sm-6 col-md-4 col-lg-3 mb-3" style="height: 850px; margin-top: 2rem">
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
        </div>
    </section>
    <!-- FIN Body principal -->

    <!-- Footer -->
    <section style="margin-top: 5%">
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
                        </ul>
                    </div>
                    <!-- Links de la pagina -->
                    <div class="col-md-4 pt-5">
                        <h2 class="h2 text-light border-bottom pb-3 border-light">Nosotros</h2>
                        <ul class="list-unstyled text-light footer-link-list">
                            <li><a class="text-decoration-none" href="index.html">
                                    Inicio</a></li>
                            <li><a class="text-decoration-none" href="about.html">
                                    Nosotros</a></li>
                            <li><a class="text-decoration-none" href="shop.php">
                                    Productos</a></li>
                            <li><a class="text-decoration-none" href="contact.html">
                                    Contacto</a></li>
                        </ul>
                    </div>
                    <!-- Autores de la empresa -->
                    <div class="col-md-4 pt-5">
                        <h2 class="h2 text-light border-bottom pb-3 border-light">Autores</h2>
                        <ul class="list-unstyled text-light footer-link-list">
                            <li>
                                González Del Moral Ángel
                            </li>
                            <li>
                                Mendoza de los Santos Lirio Aketzalli
                            </li>
                            <li>
                                Ortíz Camacho Jessica Elizabeth
                            </li>
                            <li>
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
                                <input type="hidden" name="redirect" value="../../shop.php">
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
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- End Script -->
</body>

</html>