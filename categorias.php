<?php
$products = [
    "computadoras" => [
        ["id" => 1, "name" => "Laptop HP Pavilion 15", "price" => "$15,000"],
        ["id" => 2, "name" => "MacBook Air M2", "price" => "$25,000"],
        ["id" => 3, "name" => "Dell XPS 13", "price" => "$20,000"],
        ["id" => 4, "name" => "Lenovo ThinkPad X1", "price" => "$18,500"]
    ],
    "accesorios" => [
        ["id" => 5, "name" => "Mouse Logitech MX Master 3", "price" => "$1,200"],
        ["id" => 6, "name" => "Teclado Mecánico Razer", "price" => "$2,500"],
        ["id" => 7, "name" => "Audífonos Sony WH-1000XM4", "price" => "$6,000"],
        ["id" => 8, "name" => "Cargador Rápido Anker 45W", "price" => "$800"]
    ],
   
    "smartphones" => [
        ["id" => 13, "name" => "iPhone 14 Pro", "price" => "$30,000"],
        ["id" => 14, "name" => "Samsung Galaxy S24 Ultra", "price" => "$28,000"],
        ["id" => 15, "name" => "Xiaomi Mi 13", "price" => "$15,000"],
        ["id" => 16, "name" => "Google Pixel 7 Pro", "price" => "$22,000"]
    ]
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        .product-item img {
            max-width: 100%;
            height: auto;
            margin-bottom: 15px;
        }
        .product-item {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            text-align: center;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .price-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>
<body>
    <header class="bg-primary text-white py-3">
        <div class="container d-flex justify-content-between">
            <h1 class="h3">Categorías</h1>
            <a href="favoritos.php" class="btn btn-light">Ir a Favoritos</a>
        </div>
    </header>

    <main class="container my-4">
        <h2 class="mb-4 text-center">Categorías</h2>
        <div class="row text-center mb-4">
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

        <!-- Lista de productos -->
        <div class="row g-4">
            <?php foreach ($products as $category => $items): ?>
                <?php foreach ($items as $item): ?>
                    <div class="col-md-3">
                        <div class="product-item">
                            <img src="./img/product-placeholder.png" alt="<?= $item['name'] ?>">
                            <h5><?= $item['name'] ?></h5>
                            <div class="price-container">
                                <p class="text-primary fw-bold"><?= $item['price'] ?></p>
                                <button class="btn btn-outline-primary">
                                    <i class="fa-solid fa-cart-shopping"></i> Agregar
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
    </main>

    <footer class="bg-primary text-white text-center py-3">
        © 2024 Disa. Todos los derechos reservados.
    </footer>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
