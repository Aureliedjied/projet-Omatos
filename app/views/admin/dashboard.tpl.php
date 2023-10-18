<section>
<div class="container mt-5">
        <h2>Tableau de bord d'administration</h2>

        <div>
            <h3>Liste des clients</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Email</th>
                        <th scope="col">Adresse</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clients as $client) : ?>
                        <tr>
                            <td><?= $client->getId() ?></td>
                            <td><?= $client->getName() ?></td>
                            <td><?= $client->getEmail() ?></td>
                            <td><?= $client->getAddress() ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
    </section>
