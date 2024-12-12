document.addEventListener('DOMContentLoaded', () => {
    const categoryButtons = document.querySelectorAll('.category-btn');
    const productsContainer = document.getElementById('products-grid');

    categoryButtons.forEach(button => {
        button.addEventListener('click', () => {
            const category = button.dataset.category;

            fetch(`categories.php?category=${category}`)
                .then(response => response.json())
                .then(data => {
                    renderProducts(data);
                });
        });
    });

    function renderProducts(products) {
        productsContainer.innerHTML = '';
        products.forEach(product => {
            const productCard = document.createElement('div');
            productCard.className = 'col-md-4';
            productCard.innerHTML = `
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">${product.name}</h5>
                        <p class="card-text">${product.price}</p>
                        <button class="btn btn-primary add-to-favorites" data-id="${product.id}" data-name="${product.name}">Añadir a Favoritos</button>
                    </div>
                </div>
            `;
            productsContainer.appendChild(productCard);
        });

        document.querySelectorAll('.add-to-favorites').forEach(button => {
            button.addEventListener('click', (e) => {
                const id = e.target.dataset.id;
                const name = e.target.dataset.name;

                const favorites = JSON.parse(localStorage.getItem('favorites') || '[]');
                if (!favorites.find(fav => fav.id === id)) {
                    favorites.push({ id, name });
                    localStorage.setItem('favorites', JSON.stringify(favorites));
                }
            });
        });
    }
});
