<section>
    <div class="container mt-5">
        <h2>Mon espace client</h2>

        <div class="user-info">
            <h3>Mes informations</h3>
            <p><strong>Nom:</strong> <?= $user->getName() ?></p>
            <p><strong>Email:</strong> <?= $user->getEmail() ?></p>
            <p><strong>Adresse:</strong> <?= $user->getAddress() ?></p>
        </div>

        <div class="user-reservations">
            <h3>Mes réservations</h3>

            <?php if (empty($reservations)) : ?>
                <p>Aucune réservation n'est disponible.</p>
            <?php else : ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Date de début</th>
                            <th scope="col">Date de fin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reservations as $reservation) : ?>
                            <tr>
                                <td><?= $reservation->getId() ?></td>
                                <td><?= date_format($reservation->getStartDate(), 'd/m/Y') ?></td>
                                <td><?= date_format($reservation->getEndDate(), 'd/m/Y') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</section>
