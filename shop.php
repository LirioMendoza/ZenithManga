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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
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
                    <a class="navbar-sm-brand text-light text-decoration-none" href="#">administracion@zenithmanga.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="#">01-800-123456789</a>
                </div>
                <div>
                    <!-- Logos redes sociales -->
                    <a class="text-light" href="http://facebook.com/" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
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
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Menu de opciones -->
            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
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
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">0</span>
                    </a>
                    <!-- Imagen de usuario -->
                    <a class="nav-icon position-relative text-decoration-none" href="#">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">+99</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <!-- FIN Nav -->

    <!-- Body principal -->
    
    <div class="container-fluid bg-light py-5" style="background-image: url('img/carrusel/fondo.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
        <div class="container">
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
           include ("php/conexion.php");
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
    <div class="container">
    <h1 style="color: red">Nuestros Productos</h1>
    <br><br>
        <div class="row">
            <?php foreach ($data as $key => $value) {  ?>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-3" style="height: 530px;">
                    <div class="card" style="height: 100%;">
                        <?php
                        $id = $value['id'];
                        $imagen = "img/shop/Products/" . $id . ".jpg";
                        if (!file_exists($imagen)) {
                            $imagen = "img/shop/Products/error.jpg";
                        }
                        ?>
                        <img src="<?php echo $imagen; ?>" alt="Card image cap" class="card-img-top" style="height: 150px;">
                        <div class="card-body">
                            <div style="height: 10%;">
                                <h5 class="card-title"><?php echo $value['nombre']; ?></h5>
                            </div>
                            <div style="height: 10%;">
                                <p style="display: flex; justify-content: flex-end; color: red ;" ><strong><?php echo $value['categoria']; ?></strong></p>
                            </div>
                            <div style="height: 40%;">
                                <p style="font-size: 1rem !important;" class="card-text"><?php echo $value['descripcion']; ?></p>
                            </div>
                            <div style="height: 15%;">
                                <h6 class="card-subtitle mb-2 text-muted"><strong>$<?php echo $value['precio'] * 17; ?> MXN</strong></h6>
                            </div>
                            <div style="height: 10%;">
                                
                            <form action="shop-single.php" method="post">
                                <input type="hidden" name="id" value="<?php $value['id'] ?>">
                                <button class="btn btn-primary" type="submit">Ver más</button>
                            </form>
                            </div>
                            <div class="card-rating" style="height: 15%; display: flex; justify-content: flex-end;">
                                <?php for ($i = 0; $i < $value['calificacion']; $i++) { ?>
                                    <i class="fas fa-star"></i>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>



    <!-- FIN Body principal -->



    <!-- Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">
                <!-- Datos de la empresa -->
                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-warning border-bottom pb-3 border-light logo">Zenith Manga</h2>
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
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Nosotros</h2>
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
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Autores</h2>
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
                            <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-auto">
                    <div class="input-group mb-2">
                        <form action="php/suscripcion.php" method="post" style="display: flex;" name="formulario">
                            <input class="form-control bg-light border-light" type="email" name="correo" id="correo" placeholder="Correo electronico">
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
    <script src="js/producto.js"></script>
    <!-- End Script -->
</body>

</html>

<style>
    .container {
        max-width: 80%;
        margin: 0 auto;
    }

    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 1.0);
    }

    .card-img-top {
        width: 100%;
        border-radius: 5px 5px 0 0;
    }

    .card-body {
        padding: 16px;
        height: 100%;
    }

    .card-title {
        margin-bottom: 10px;
    }

    .card-subtitle {
        margin-top: 10px;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
        border-color: #007bff;
    }

    .card-rating {
        margin-top: 10px;
        font-size: 16px;
    }

    .fa-star {
        color: #FFD700;
    }

    .far fa-star {
        color: #ddd;
    }

    @media (max-width: 768px) {
        .col-sm-6 {
            width: 100%;
        }
    }

    @media (max-width: 576px) {
        .card-img-top {
            height: 150px;
        }
    }

    .search-form {
        display: flex;
        flex-direction: column;
        margin: 1rem auto;
    }

    .form-group {
        margin-bottom: 1rem;
    }
</style>