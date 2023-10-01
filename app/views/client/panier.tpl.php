<section class="page-section" id="about">
<div class="container mt-5">
    <h2 class="mb-4">Recapitulatif de vos produits</h2>


    <form id="locationForm" class="form-horizontal">
        <div class="form-group row">
            <label for="dateDebut" class="col-sm-2 col-form-label">Date de Début</label>
            <div class="col-sm-4">
                <input type="date" class="form-control" id="dateDebut">
            </div>
            <label for="dateFin" class="col-sm-2 col-form-label">Date de Fin</label>
            <div class="col-sm-4">
                <input type="date" class="form-control" id="dateFin">
            </div>
        </div>

    <!-- ici mon panier : -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Panier</label>
            <div class="col-sm-10">
                <ul id="panier" class="list-group mb-2">
                    <!-- Le contenu du panier sera ajouté ici dynamiquement avec JavaScript ( fichier app.js )-->
                </ul>
                <h5>Total: <span id="totalPanier">0</span> €</h5>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-success">Finaliser la Réservation</button>
            </div>
        </div>
    </form>
</div>
<script src="../../../public/js/app.js"></script>

