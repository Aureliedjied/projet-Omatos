
<section>

<main class="container my-5">
    <form method="POST" action="">
        <div class="mb-3">
            <label for="email" class="form-label">Adresse E-mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="jeanbon@gmail.com">
        </div>

        <div class="mb-3">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="* * * * * *">
        </div>
        <button type="submit" class="btn btn-success">Se connecter</button>
    </form>

    <p>Vous n'avez pas de compte ? <a href="<?= $router->generate('user-add') ?>">Inscrivez-vous ici</a></p>
</main>
</section>





