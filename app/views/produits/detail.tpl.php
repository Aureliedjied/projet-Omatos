<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase"><?= $router->generate('produit-detail', ['id' => $produit->getName()])?></h2>

        </div>
        <div class="row">
            <div class="portfolio-item">
                <a class="portfolio-link" data-bs-toggle="modal" href="<?= $router->generate('produit-detail', ['id' => $produit->getId()])?>">
                    <div class="portfolio-hover">
                         <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="<?= $produit->getPicture()?>" alt="image du produit" />
                        </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading"><?= $produit->getName() ?></div>
                        <div class="portfolio-caption-subheading text-muted"><?= $produit->getPrice() ?>€</div>
                    </div>
            </div>
        </div>
    </div>
</section>