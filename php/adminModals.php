<div class="modal fade" id="patienter" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Patientez...</h5>
      </div>
      <div class="modal-body">
        Veuillez attendre que l'opération s'exécute.
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="delModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Suppression</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="delModalBody">
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <button type="button" class="btn btn-danger" onclick="deleteProduit()" data-bs-dismiss="modal">Je suis sûr</button>
        </div>
    </div>
  </div>
</div>
<?php
    if(isset($_POST["action"]) && isset($_POST["ref"]) && $_POST["action"]=="modify" && !empty($_POST["ref"])){
        $produit = getProduit($_POST["ref"]);
        $pre = strrpos($produit["img"], 'src="')+5;
        $end = strrpos($produit["img"], '" alt="')-5;
        $produit["img"] = substr($produit["img"],$pre,$end);
?>
<div class="modal fade" id="modModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Modification</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="delModalBody">
            <form class="row g-3">
                <input type="hidden" id="reference" <?php echo "value='".$produit["ref"]."'"; ?>>
                <div class="col-md-6">
                    <label for="Mlabel" class="form-label">Label</label>
                    <input type="text" class="form-control" maxlength="50" id="Mlabel" <?php echo "value='".$produit["label"]."'"; ?> >
                </div>
                <div class="col-md-3">
                    <label for="Mprix" class="form-label">Prix</label>
                    <input type="text" step="any" class="form-control" id="Mprix" <?php echo "value='".$produit["prix"]."'"; ?> >
                </div>
                <div class="col-md-3">
                    <label for="Mstock" class="form-label">Stock</label>
                    <input type="number" min="0" class="form-control" id="Mstock" <?php echo "value='".$produit["stock"]."'"; ?> >
                </div>
                <div class="col-6">
                    <label for="Mimage" class="form-label">Source serveur de l'image (./img/***)</label>
                    <input type="text" class="form-control" id="Mimage" maxlength="50" <?php echo "value='".$produit["img"]."'"; ?> >
                </div>
                <div class="col-6">
                    <label for="Mcategorie" class="form-label">Catégorie</label>
                    <select class="form-select" id="Mcategorie">
                        <?php
                            $categories = getCategories();
                            foreach ($categories as $value) {
                                echo '<option value="'.$value["categorie"].'">'.$value["label"].'</option>';
                            }
                        ?>
                    </select>
                </div>
                </form>
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <button type="button" class="btn btn-primary" onclick="modifyProduit()" data-bs-dismiss="modal">Confirmer</button>
        </div>
    </div>
  </div>
</div>
<script>    
    var myModalMod = new bootstrap.Modal(document.getElementById('modModal'));
    myModalMod.show();
</script>
<?php
    }
?>
<div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Ajouter</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="delModalBody">
            <form class="row g-3">
                <div class="col-md-6">
                    <label for="label" class="form-label">Label</label>
                    <input type="text" class="form-control" maxlength="50" id="label" placeholder="Noix de coco">
                </div>
                <div class="col-md-3">
                    <label for="prix" class="form-label">Prix</label>
                    <input type="number" step="any" min="0" class="form-control" id="prix" placeholder="5,99">
                </div>
                <div class="col-md-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" min="0" class="form-control" id="stock" placeholder="15">
                </div>
                <div class="col-12">
                    <label for="image" class="form-label">Source serveur de l'image (./img/***)</label>
                    <input type="text" class="form-control" maxlength="50" id="image" placeholder="./img/produits/lacets/lacet2.png">
                </div>
                <div class="form-check form-switch col-12 d-flex justify-content-center">
                    <input class="form-check-input" type="checkbox" id="categorieCheck" onchange="toggleCatNewOld()">
                    <label class="form-check-label" for="categorieCheck">Nouvelle catégorie</label>
                </div>
                <div class="col-12" id="oldCat">
                    <label for="categorie" class="form-label">Catégorie</label>
                    <select class="form-select" id="categorie">
                        <?php
                            $categories = getCategories();
                            foreach ($categories as $value) {
                                echo '<option value="'.$value["categorie"].'">'.$value["label"].'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="col-6 display-none" id="newCat">
                    <label for="categorieNew" class="form-label">Catégorie (sans majuscule ni espace)</label>
                    <input type="text" class="form-control" maxlength="15" id="categorieNew" placeholder="lacets">
                </div>
                <div class="col-6 display-none" id="newCat2">
                    <label for="categorieNew2" class="form-label">Label de catégorie</label>
                    <input type="text" class="form-control" maxlength="64" id="categorieNew2" placeholder="Lacets">
                </div>
                </form>
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <button type="button" class="btn btn-primary" onclick="addProduit()" data-bs-dismiss="modal">Confirmer</button>
        </div>
    </div>
  </div>
</div>
