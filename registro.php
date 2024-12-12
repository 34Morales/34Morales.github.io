
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Disa Tienda</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="styles.css">
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
                    <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
                    <li class="nav-item"><a href="registro.php" class="nav-link active">Registro</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Botón para abrir el Modal -->
    <div class="container my-5 text-center">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdd">
            Registrar Nuevo Usuario
        </button>
    </div>

    <!-- Modal de Registro -->
    <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="./php/user_update.php" class="needs-validation" novalidate>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="txtName">Nombre Completo:</label>
                            <input name="txtName" id="txtName" required type="text" class="form-control" placeholder="Inserta tu nombre completo">
                            <div class="valid-feedback">Correcto</div>
                            <div class="invalid-feedback">Por favor, ingresa tu nombre completo.</div>
                        </div>
                        <div class="mb-3">
                            <label for="email">Correo Electrónico:</label>
                            <input name="email" id="email" required type="email" class="form-control" placeholder="Inserta tu correo">
                            <div class="valid-feedback">Correcto</div>
                            <div class="invalid-feedback">Por favor, ingresa un correo válido.</div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="pass">Contraseña:</label>
                                <input name="pass" id="pass" required minlength="8" type="password" class="form-control" placeholder="Inserta tu contraseña">
                                <div class="valid-feedback">Correcto</div>
                                <div class="invalid-feedback">Debe tener al menos 8 caracteres.</div>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="pass2">Confirmar Contraseña:</label>
                                <input name="pass2" id="pass2" required minlength="8" type="password" class="form-control" placeholder="Confirma tu contraseña">
                                <div class="valid-feedback">Correcto</div>
                                <div class="invalid-feedback">Las contraseñas no coinciden.</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-dark" id="btnSave">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-primary text-white text-center py-3">
        © 2024 Disa. Todos los derechos reservados.
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Validación del formulario
        (function () {
            'use strict';
            const form = document.querySelector('.needs-validation');
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                } else {
                    const password = document.getElementById('pass').value;
                    const confirmPassword = document.getElementById('pass2').value;
                    if (password !== confirmPassword) {
                        event.preventDefault();
                        event.stopPropagation();
                        document.getElementById('pass2').classList.add('is-invalid');
                    }
                }
                form.classList.add('was-validated');
            });
        })();
    </script>
</body>
</html>
