<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favoritos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="bg-primary text-white py-3">
        <div class="container d-flex justify-content-between">
            <h1 class="h3">Favoritos</h1>
            <a href="categorias.php" class="btn btn-light">Ir a Categorías</a>
        </div>
    </header>

    <main class="container mt-4">
        <h2 class="mb-4">Productos Favoritos</h2>
        <ul id="favorites-list" class="list-group">
            <li class="list-group-item text-center">No hay favoritos aún.</li>
        </ul>
    </main>
     <!-- Footer -->
     <footer class="bg-primary text-white text-center py-3">
        © 2024 Disa. Todos los derechos reservados.
    </footer>

    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="./js/favoritos.js"></script>
</body>
</html>
