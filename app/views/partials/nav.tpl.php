<main>
    	<!-- Fixed navbar -->
		<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="<?= $router->generate('main-home') ?>"><img src="assets/images/navbar-logo.png" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="<?= $router->generate('main-home') ?>">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= $router->generate('produits-list') ?>">Produits</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= $router->generate('client-panier') ?>">Panier</a></li>
                        <?php if(!isset($_SESSION["client"])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $router->generate('client-login') ?>">Connexion</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $router->generate('client-logout') ?>">Deconnexion</a>
                    </li>
                <?php endif ?>
                        <li class="nav-item"><a class="nav-link" href="<?= $router->generate('client-add') ?>">S'inscrire</a></li>
                    </ul>
                </div>
            </div>
        </nav>
	<!-- /.navbar -->
</main>