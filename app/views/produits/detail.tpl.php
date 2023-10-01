<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase"><?= $produit->getName() ?></h2>

        </div>
        <div class="row">
            <div class="portfolio-item">
                <a class="portfolio-link" data-bs-toggle="modal">
                    <div class="portfolio-hover">
                        <img class="img-fluid" src="<?= $produit->getPicture()?>" alt="image du produit" />
                        </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading"><?= $produit->getName() ?></div>
                        <div class="portfolio-caption-subheading text-muted"><?= $produit->getPrice() ?>€</div>
                        <div class="portfolio-caption-subheading text-muted"><?= $produit->getDescription() ?></div>
                    </div>
                    <div>
                    <button class="btn btn-primary" id="produit<?= $produit->getName() ?>" data-nom="<?= $produit->getName() ?>">
                    <input type="number" id="quantiteProduit<?= $produit->getId() ?>" value="0" min="0">
                    <i class="fas fa-shopping-cart"></i> Ajouter au Panier
                    </button>
                    </div>
            </div>
        </div>
    </div>
</section>