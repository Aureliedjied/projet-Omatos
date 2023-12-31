
<section class="page-section" id="contact">
<img class="mx-auto rounded-circle" src="assets/images/map-image.png" alt="..." />
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Rejoignez nous !</h2>
                    <h3 class="section-subheading text-muted">Veuillez remplir tous les champs</h3>
                </div>

                <form method="POST" class="mt-5">
    <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input value="<?= isset($user) ? $user->getEmail() : '' ?>" type="text" class="form-control" id="email" placeholder="Votre adresse mail" name="email" required>
    </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nom </label>
            <input value="<?= isset($user) ? $user->getName() : '' ?>" type="text" class="form-control" id="name" placeholder="Votre nom" name="name">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="mot de passe" placeholder="**********" name="password" value="<?= isset($user) ? $user->getPassword() : '' ?>">
            <small>
                Minimum 5 caractères, au moins une lettre, un chiffre et un caractère spécial 
            </small>
        </div>
        </div>
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <div class="mb-3">
            <label for="addresse" class="form-label">Adresse</label>
            <input value="<?= isset($user) ? $user->getAddress() : '' ?>" type="text" class="form-control" id="addresse" placeholder="Votre adresse" name="address">
        </div>
        </div>
        <button type="submit" class="btn btn-success">S'inscrire</button>
            </form>
                </div>
        </section>