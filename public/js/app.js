const app = {

    // J'initialise mon module :
    init: function () {

    // j'initialise le panier :
        app.panier.init();

    },
    // Je définis le panier qui sera un objet :
    panier :{
        // Mon objet contiendra les produits ( dans un tableau:)
        produits: [],
        // Je réinitialise le panier avec l'ajout du tableau défini à l'interieur de celui ci
        init: function (){
            
            // Je selectionne tous les boutons avec la class css:
            const bouton = document.querySelectorAll('.btn-primary');

            // je boucle sur chaque bouton ( à défaut de vouloir ajouter un 2e id)
            // Je peux maintenant ajouter l'evenement :
            bouton.forEach(bouton => {
                bouton.addEventListener("click", app.panier.ajoutProduit);
            });
        }

    },

    // Maintenant, je crée ma fonction d'ajout au panier :
    ajoutProduit : function (event){

        // Je récupere le boutton et son evenement :
        const bouton = event.currentTarget;

        // Je récupère l'ID du produit à partir de l'ID du bouton
        // Ici j'utilise replace car j'ai défini mon id par "produit", qui sera donc remplacé par son id reel:
        const produitId = bouton.id.replace('produit', '');

        // je récupere la quantité choisie et le lie a mon item :
        const quantite = document.getElementById("quantiteProduit" + produitId);
    }
}

// ici, je charge mon module, une fois le DOM (elements html) chargés :
document.addEventListener('DOMContentLoaded', app.init);