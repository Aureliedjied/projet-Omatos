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
                    <li class="nav-item"><a class="nav-link" href="<?= $router->generate('items-list') ?>">Produits</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= $router->generate('user-panier') ?>">Panier</a></li>

                    <?php if (isset($_SESSION["user"])) : ?>
    <?php if (isset($_SESSION["role"]) && $_SESSION["role"] == 'admin'): ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= $router->generate('admin-dashboard') ?>">Tableau de bord admin</a>
        </li>
    <?php else : ?>
        <?php if (isset($client)): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= $router->generate('user-dashboard', ['email' => $client->getEmail()]) ?>">Mon espace</a>
            </li>
        <?php endif; ?>
    <?php endif; ?>
    <li class="nav-item">
        <a class="nav-link" href="<?= $router->generate('user-logout') ?>">Deconnexion</a>
    </li>
<?php else : ?>
    <li class="nav-item">
        <a class="nav-link" href="<?= $router->generate('user-login') ?>">Connexion</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= $router->generate('user-add') ?>">Inscription</a>
    </li>
<?php endif; ?>

                </ul>
            </div>
        </div>
    </nav>
    <!-- /.navbar -->
</main>



