<?php
if(isset($_GET['error'])){
    $error = $_GET['error'];
    
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Disa Tienda</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="./css/mq.css">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">

</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="./img/Logo1.png" alt="Logo" class="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="index.php" class="nav-link">Inicio</a></li>
                    <li class="nav-item"><a href="registro.php" class="nav-link">Registro</a></li>
                    <li class="nav-item"><a href="login.php" class="nav-link active">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Formulario de Login -->
    <div class="container my-5">
        <h1 class="text-center mb-4">Iniciar Sesión</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">

                     
                        <form id="loginForm" action="./php/login.php" method="POST" novalidate>
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" name="txtEmail" placeholder="correo@ejemplo.com" required>
                                <div class="invalid-feedback">Por favor, ingresa un correo válido.</div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="txtPassword" placeholder="Ingresa tu contraseña" required minlength="8">
                                <div class="invalid-feedback">La contraseña debe tener al menos 8 caracteres.</div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <a href="recuperar_contraseña.html" class="text-decoration-none">¿Olvidaste tu contraseña?</a>
                                </div>
                                <button type="submit" class="btn btn-primary">Iniciar sesión
                                    <link rel="stylesheet" href="./php/login.php">
                                </button>
                            </div>
                        </form>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!--  <script>
        // Validación del formulario
        (function () {
            'use strict';
            const form = document.getElementById('loginForm');
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            });
        })();
    </script> -->
    <?php
if (isset($_GET['error'])) {
    $error = $_GET['error'];
    if ($error == 1) {
        echo "<script>Swal.fire({ icon: 'error', title: 'Oops...', text: 'Contraseña incorrecta' });</script>";
    } elseif ($error == 2) {
        echo "<script>Swal.fire({ icon: 'error', title: 'Oops...', text: 'Usuario no encontrado' });</script>";
    }
}
?>


    
</body>
</html>
