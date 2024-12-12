<?php
 include "./php/conexion.php";
 $sql="select * from categorias order by id DESC";
 $res = $conn->query($sql) or die($conn->error);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías - Disa Tienda</title>
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
                    <li class="nav-item"><a href="index.html" class="nav-link">Inicio</a></li>
                    <li class="nav-item"><a href="login.html" class="nav-link">Login</a></li>
                    <li class="nav-item"><a href="registro.html" class="nav-link">Registro</a></li>
                    <li class="nav-item"><a href="categorias.html" class="nav-link active">Categorías</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sección de Categorías -->
    <div class="container my-5">
        <h1 class="text-center mb-4">Gestión de Categorías</h1>

        <!-- Formulario para agregar nueva categoría -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title">Añadir Nueva Categoría</h4>
                        <form id="categoriaForm" action="./php/product-add.php"enctype="multipart/from-data" method="POST" class="needs-validation" novalidate>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre de la Categoría</label>
                                <input name="txtName" type="text" class="form-control" id="nombre" name="nombre" required>
                                <div class="invalid-feedback">Por favor, ingresa un nombre para la categoría.</div>
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" maxlength="200" required></textarea>
                                <div class="invalid-feedback">Por favor, ingresa una descripción (máximo 200 caracteres).</div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Guardar Categoría</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabla de Categorías -->
        <h2 class="text-center mt-5">Categorías Existentes</h2>
        <div id="tabla-categorias">
            <tbody>
                   <?php
                   while($fila=mysqli_fetch_array($res)){
                     
                   
                   ?>
                <tr>
                   <!--echo $fila['id'] todo en php-->  
                   <!--if($fila['level']==1){
                   echo "<span class='rounded bg-success text while p-1'>administrador"
                   }else{
                   echo "<span class='rounded bg-success text while p-1>cliente"
                   }-->
                </tr>
                <?php }?>
            </tbody>
            <!-- La tabla se genera dinámicamente desde PHP -->
        </div>
    </div>

    <!-- Modal para Editar Categoría -->
    <div class="modal fade" id="modalEditar" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <form action="procesar_categoria.php" method="POST" class="needs-validation" novalidate>
                    <div class="modal-header">
                        <h5 class="modal-title">Editar Categoría</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="editarId" name="id">
                        <div class="mb-3">
                            <label for="editarNombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="editarNombre" name="nombre" required>
                            <div class="invalid-feedback">Por favor, ingresa un nombre.</div>
                        </div>
                        <div class="mb-3">
                            <label for="editarDescripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="editarDescripcion" name="descripcion" rows="3" maxlength="200" required></textarea>
                            <div class="invalid-feedback">Por favor, ingresa una descripción (máximo 200 caracteres).</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios
                            <link rel="stylesheet" href="">
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-primary text-white text-center py-3">
        © 2024 Disa. Todos los derechos reservados.
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/categoria.js"></script>
</body>
</html>
