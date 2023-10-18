
// Fonction qui ouvre et remplir la modale des produits:

function openProductModal(name, description, price, picture) {
    const modal = document.getElementById('produitModal');
    const modalTitle = document.getElementById('produitModalLabel');
    const modalContent = document.getElementById('modalContent');

    // Ici, je supprime tous les "enfants" de la modal
    while (modalContent.firstChild) {
        modalContent.firstChild.remove();
    }

    // Je remplace le texte par le nom du produit :
    modalTitle.textContent = name;

    // Affichage de l'image du produit :
    const image = document.createElement('img');
    image.src = picture;
    image.alt = 'image du produit';
    image.className = 'img-fluid';

    // Je créee une balise p pour y inclure la description :
    const descriptionElement = document.createElement('p');
    descriptionElement.textContent = 'Description: ' + description;

    // idem pour le prix :
    const priceElement = document.createElement('p');
    priceElement.textContent = 'Prix: ' + price + '€';

    // Je les ajoute maintenant à la modal :
    modalContent.appendChild(image);
    modalContent.appendChild(descriptionElement);
    modalContent.appendChild(priceElement);

    // J'ajoute une classe pour montrer/cacher la modal (vu en cours):
    modal.classList.add('show');
    modal.style.display = 'block';

    // Ajout d'un écouteur d'événements pour fermer la modale si on clique à l'extérieur
    modal.addEventListener('click', function (event) {
        if (event.target === modal) {
            closeProductModal();
        }
    });
}

// Fonction qui ferme la modale des produits :
function closeProductModal() {
    const modal = document.getElementById('produitModal');
    modal.classList.remove('show');
    modal.style.display = 'none';
}






