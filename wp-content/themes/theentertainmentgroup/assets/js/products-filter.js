document.addEventListener('DOMContentLoaded', function() {
    const filterLinks = document.querySelectorAll('.category-filter');
    const products = document.querySelectorAll('.col-sm-6.col-md-4');

    function updateResultCount(category, selectedElement) {
        const visibleProducts = Array.from(products).filter(product => {
            if (category === 'all') {
                return true;
            }
            const productCategories = product.dataset.categories.split(',');
            return productCategories.includes(category);
        }).length;

        const resultText = category === 'all'
            ? `Am găsit ${visibleProducts} produse`
            : `Categorie ${selectedElement.textContent.split('(')[0].trim()} (${visibleProducts} produse)`;
        document.querySelector('.ori-filter-result').textContent = resultText;
    }

    filterLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();

            // Update active state for all filter links with same category
            filterLinks.forEach(l => {
                if (l.dataset.category === this.dataset.category) {
                    l.classList.add('active');
                } else {
                    l.classList.remove('active');
                }
            });

            const category = this.dataset.category;

            // Update visibility
            products.forEach(product => {
                if (category === 'all') {
                    product.style.display = '';
                } else {
                    const productCategories = product.dataset.categories.split(',');
                    product.style.display = productCategories.includes(category) ? '' : 'none';
                }
            });

            // Update count
            updateResultCount(category, this);
        });
    });
});