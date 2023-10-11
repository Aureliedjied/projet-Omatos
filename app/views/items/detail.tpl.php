<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase"><?= $item->getName() ?></h2>

        </div>
        <div class="row">
            <div class="portfolio-item">
                <a class="portfolio-link" data-bs-toggle="modal">
                    <div class="portfolio-hover">
                        <img class="img-fluid" src="<?= $item->getImage()?>" alt="image du produit" />
                        </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading"><?= $item->getName() ?></div>
                        <div class="portfolio-caption-subheading text-muted"><?= $item->getPrice() ?>€</div>
                        <div class="portfolio-caption-subheading text-muted"><?= $item->getDescription() ?></div>
                    </div>
                    <div>
                    <button class="btn btn-primary" id="item<?= $item->getName() ?>" data-nom="<?= $item->getName() ?>">
                    <input type="number" id="quantityItem<?= $item->getId() ?>" value="0" min="0">
                    <i class="fas fa-shopping-cart"></i> Ajouter au Panier
                    </button>
                    </div>
            </div>
        </div>
    </div>
</section>