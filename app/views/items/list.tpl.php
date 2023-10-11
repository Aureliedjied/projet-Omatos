<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Tous nos produits</h2>
            <h3 class="section-subheading text-muted">Ici, retrouvez tous nos produits confondus </h3>
        </div>
        <div class="row">
            <?php foreach ($items as $item) : ?>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item -->
                    <div class="portfolio-item">

                        <a class="portfolio-link" data-bs-toggle="modal" href="<?= $router->generate('item-detail', ['id' => $item->getId()])?>">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="<?= $item->getImage()?>" alt="image du produit" />
                        </a>
                        <div class="portfolio-caption">
                        <div class="portfolio-caption-heading"><?= $item->getName() ?></div>
                        <div class="portfolio-caption-subheading text-muted"><?= $item->getPrice() ?>€</div>
                    </div>
                        <div>
                        <button class="btn btn-primary" id="ajouterAuPanier<?= $item->getId() ?>">
                        <input type="number" id="quantiteProduit<?= $item->getId() ?>" value="0" min="0">
                        <i class="fas fa-shopping-cart"></i> Ajouter au Panier
                        </button>
                    </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>