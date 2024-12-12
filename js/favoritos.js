document.addEventListener('DOMContentLoaded', () => {
    const favoritesList = document.getElementById('favorites-list');
    const favorites = JSON.parse(localStorage.getItem('favorites') || '[]');

    function renderFavorites() {
        favoritesList.innerHTML = '';
        if (favorites.length === 0) {
            favoritesList.innerHTML = `<li class="list-group-item text-center">No hay favoritos aún.</li>`;
        } else {
            favorites.forEach(fav => {
                const listItem = document.createElement('li');
                listItem.className = 'list-group-item d-flex justify-content-between align-items-center';
                listItem.textContent = fav.name;

                const removeBtn = document.createElement('button');
                removeBtn.className = 'btn btn-danger btn-sm';
                removeBtn.textContent = 'Eliminar';
                removeBtn.addEventListener('click', () => {
                    const index = favorites.findIndex(item => item.id === fav.id);
                    if (index > -1) favorites.splice(index, 1);
                    localStorage.setItem('favorites', JSON.stringify(favorites));
                    renderFavorites();
                });

                listItem.appendChild(removeBtn);
                favoritesList.appendChild(listItem);
            });
        }
    }

    renderFavorites();
});
