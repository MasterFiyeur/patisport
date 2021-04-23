<div class="infoClient">
    <form class="row g-3 needs-validation" id="infoClient_form" action="panier.php" method="post">
        <div class="col-12">
            <h3>Informations générales</h3>
        </div>
        <div class="col-md-6">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" name="prenom" id="prenom" required>
        </div>
        <div class="col-md-6">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" name="nom" id="nom">
        </div>
        <div class="col-12">
            <label for="mail" class="form-label">Adresse email</label>
            <input type="email" class="form-control" name="mail" id="mail" placeholder="contact@patisport.fr">
        </div>
        <hr>
        <div class="col-12">
            <h3>Adresse de livraison</h3>
        </div>
        <div class="col-md-6">
            <label for="adresseLivr" class="form-label">Addresse</label>
            <input type="text" class="form-control" name="adresseLivr" id="adresseLivr" placeholder="19 rue du projet d'informatique">
        </div>
        <div class="col-md-6">
            <label for="adresse2Livr" class="form-label">Complément d'adresse</label>
            <input type="text" class="form-control" name="adresse2Livr" id="adresse2Livr" placeholder="Appartement, étage...">
        </div>
        <div class="col-md-4">
            <label for="paysLivr" class="form-label">Pays</label>
            <input type="text" class="form-control" name="paysLivr" id="paysLivr">
        </div>
        <div class="col-md-6">
            <label for="villeLivr" class="form-label">Ville</label>
            <input type="text" class="form-control" name="villeLivr" id="villeLivr">
        </div>
        <div class="col-md-2">
            <label for="codeLivr" class="form-label">Code postal</label>
            <input type="text" class="form-control" name="codeLivr" id="codeLivr">
        </div>
        <hr>
        <div class="col-12">
            <h3>Adresse de Facturation</h3>
            <h6>*(Laisser vide si même que livraison)</h6>
        </div>
        <div class="col-md-6">
            <label for="adresseFact" class="form-label">Addresse</label>
            <input type="text" class="form-control" name="adresseFact" id="adresseFact" placeholder="19 rue du projet d'informatique">
        </div>
        <div class="col-md-6">
            <label for="adresse2Fact" class="form-label">Complément d'adresse</label>
            <input type="text" class="form-control" name="adresse2Fact" id="adresse2Fact" placeholder="Appartement, étage...">
        </div>
        <div class="col-md-4">
            <label for="paysFact" class="form-label">Pays</label>
            <input type="text" class="form-control" name="paysFact" id="paysFact">
        </div>
        <div class="col-md-6">
            <label for="villeFact" class="form-label">Ville</label>
            <input type="text" class="form-control" name="villeFact" id="villeFact">
        </div>
        <div class="col-md-2">
            <label for="codeFact" class="form-label">Code postal</label>
            <input type="text" class="form-control" name="codeFact" id="codeFact">
        </div>
        <div class="col-12 d-flex justify-content-end">
            <input type="button" class="btn btn-primary" value="Valider" onclick="verification_informations()">
        </div>
    </form>

    <script type="text/javascript" src="./js/infoClient.js"></script>
</div>
