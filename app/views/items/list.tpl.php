
<!-- Creation d'une div modale pour afficher les produits -->
<!-- Modal -->
<div class="modal fade" id="produitModal" tabindex="-1" aria-labelledby="produitModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="produitModalLabel">Détails du Produit</h5>
            </div>
            <div class="modal-body" id="modalContent">
                <!-- Le contenu du produit sera ajouté ici dynamiquement -->
            </div>
        </div>
    </div>
</div>

<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Tous nos produits</h2>
<<<<<<< HEAD:app/views/produits/list.tpl.php
            <h3 class="section-subheading text-muted">Ici, trouvez tous nos produits confondus</h3>
=======
            <h3 class="section-subheading text-muted">Ici, retrouvez tous nos produits confondus </h3>
>>>>>>> 03f9ecf3f19c3755dcdf163f150dde3d8083a327:app/views/items/list.tpl.php
        </div>
        <div class="row">
            <?php foreach ($items as $item) : ?>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item -->
                    <div class="portfolio-item">
                    <a class="portfolio-link" href="#" onclick="openModal('<?= $produit->getName() ?>', '<?= $produit->getDescription() ?>', '<?= $produit->getPrice() ?>', '<?= $produit->getPicture() ?>')">

<<<<<<< HEAD:app/views/produits/list.tpl.php
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="<?= $produit->getPicture() ?>" alt="image du produit" />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading"><?= $produit->getName() ?></div>
                            <div class="portfolio-caption-subheading text-muted"><?= $produit->getPrice() ?>€</div>
                        </div>
                        <div>
                            <button class="btn btn-primary" id="produit<?= $produit->getName() ?>">
                                <input type="number" id="quantiteProduit<?= $produit->getId() ?>" value="0" min="0">
                                <i class="fas fa-shopping-cart"></i> Ajouter au Panier
                            </button>
                        </div>
=======
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
>>>>>>> 03f9ecf3f19c3755dcdf163f150dde3d8083a327:app/views/items/list.tpl.php
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script src="js/app.js"></script>









