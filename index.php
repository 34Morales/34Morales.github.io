<?php session_start();
if(isset($_SESSION['userdata'])){
  $user=$_SESSION['userdata'];
}else{
  header('Location: ./login.php');
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disa - Tienda</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="/css/mediaquerys.css">
    <link rel="stylesheet" href="/css/estilos.css">
</head>
<body>
    <!-- Navbar -->
<!--<input accept="image/">

-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="./img/Logo1.png" alt="Logo" class="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="input-group mx-auto w-50">
                    <input type="text" class="form-control" placeholder="¿Qué producto buscas el día de hoy?">
                    <button class="btn btn-warning">Buscar</button>
                </div>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="categorias.php" class="nav-link">Categorías</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Ingresar</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="login.php">Login</a></li>
                            <li><a class="dropdown-item" href="registro.php">Registro</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="favoritos.php" class="nav-link">Favoritos (0)</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Comparar (0)</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Perfil</a>
                            <?phpecho $user['name'] ?>
                </li>
                    <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-shopping-cart"></i> $0.00</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <?php include"./layouts/aside.php"; ?>
    <!-- Carrusel -->
<div id="carouselExample" class="carousel slide mt-4" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./img/cel.jpg" class="d-block w-100 carousel-img" alt="Promoción 1">
        </div>
        <div class="carousel-item">
            <img src="./img/pantalla.jpeg" class="d-block w-100 carousel-img" alt="Promoción 2">
        </div>
        <div class="carousel-item">
            <img src="./img/mouse.jpg" class="d-block w-100 carousel-img" alt="Promoción 3">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
</div>


    <!-- Categorías -->
    <div class="container my-5">
        <h2 class="text-center mb-4">Explora por Categorías</h2>
        <div class="row text-center g-4">
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <i class="fas fa-laptop fa-3x mt-4 text-primary"></i>
                    <div class="card-body">
                        <h5 class="card-title">Computadoras</h5>
                        <p class="card-text">Encuentra laptops, desktops y más.</p>
                        <a href="categorias.php" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <i class="fas fa-headphones fa-3x mt-4 text-success"></i>
                    <div class="card-body">
                        <h5 class="card-title">Accesorios</h5>
                        <p class="card-text">Mouse, teclados y accesorios.</p>
                        <a href="categorias.php" class="btn btn-success">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <i class="fas fa-tv fa-3x mt-4 text-info"></i>
                    <div class="card-body">
                        <h5 class="card-title">Monitores</h5>
                        <p class="card-text">Pantallas de alta definición.</p>
                        <a href="categorias.php" class="btn btn-info">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <i class="fas fa-mobile-alt fa-3x mt-4 text-warning"></i>
                    <div class="card-body">
                        <h5 class="card-title">Smartphones</h5>
                        <p class="card-text">Últimos modelos disponibles.</p>
                        <a href="categorias.php" class="btn btn-warning text-white">Ver más</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonios -->
    <div class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-4">Lo que dicen nuestros clientes</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <p>“Excelente servicio, productos de alta calidad.”</p>
                                <footer class="blockquote-footer mt-3">Juan Pérez</footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <p>“Los precios son competitivos y la entrega fue rápida.”</p>
                                <footer class="blockquote-footer mt-3">María Gómez</footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <p>“Gran variedad de productos. ¡Muy recomendable!”</p>
                                <footer class="blockquote-footer mt-3">Carlos Martínez</footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-primary text-white text-center py-3">
        © 2024 Disa. Todos los derechos reservados.
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
