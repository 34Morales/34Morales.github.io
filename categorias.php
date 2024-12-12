<?php
$products = [
    "computadoras" => [
        ["id" => 1, "name" => "Laptop HP", "price" => "$15,000"],
        ["id" => 2, "name" => "MacBook Air", "price" => "$25,000"]
    ],
    "accesorios" => [
        ["id" => 3, "name" => "Mouse Logitech", "price" => "$500"],
        ["id" => 4, "name" => "Teclado Mecánico", "price" => "$1,200"]
    ],
    "monitores" => [
        ["id" => 5, "name" => "Monitor Dell 24\"", "price" => "$4,000"],
        ["id" => 6, "name" => "Monitor Samsung 27\"", "price" => "$6,000"]
    ],
    "smartphones" => [
        ["id" => 7, "name" => "iPhone 14", "price" => "$28,000"],
        ["id" => 8, "name" => "Samsung Galaxy S24", "price" => "$20,000"]
    ],
];

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $category = $_GET['category'];
    if (isset($products[$category])) {
        echo json_encode($products[$category]);
    } else {
        echo json_encode(["error" => "Categoría no encontrada"]);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="./js/script.js"></script>
</head>
<body>
    <header class="bg-primary text-white py-3">
        <div class="container d-flex justify-content-between">
            <h1 class="h3">Categorías</h1>
            <a href="favoritos.php" class="btn btn-light">Ir a Favoritos</a>
        </div>
    </header>

    <main class="container mt-4">
        <h2 class="mb-4">Categorías</h2>
        <div class="row text-center">
            <div class="col-md-3">
                <button class="btn btn-outline-primary category-btn w-100" data-category="computadoras">Computadoras</button>
            </div>
            <div class="col-md-3">
                <button class="btn btn-outline-primary category-btn w-100" data-category="accesorios">Accesorios</button>
            </div>
            <div class="col-md-3">
                <button class="btn btn-outline-primary category-btn w-100" data-category="monitores">Monitores</button>
            </div>
            <div class="col-md-3">
                <button class="btn btn-outline-primary category-btn w-100" data-category="smartphones">Smartphones</button>
            </div>
        </div>

        <section id="products-container" class="mt-5">
            <h3 class="text-center">Selecciona una categoría para ver productos</h3>
            <div id="products-grid" class="row g-3"></div>
        </section>
    </main>
     <!-- Footer -->
     <footer class="bg-primary text-white text-center py-3">
        © 2024 Disa. Todos los derechos reservados.
    </footer>

</body>
</html>
