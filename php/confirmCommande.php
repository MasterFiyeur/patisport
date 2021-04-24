<?php
/* Verification des infos générales */
verifCommande();
?>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Message</h5>
        </div>
        <div class="modal-body" id="write_message"></div>
        <div class="modal-footer">
            <a href="index.php?reset=true"><button type="button" class="btn btn-secondary">D'accord</button></a>
        </div>
    </div>
  </div>
</div>
<div class="infosRecap row g-3">
    <div class="col-md-5 infosG">
        <h5>Informations utilisateur</h5>
        <div>
            Prénom :
            <?php echo $_POST["prenom"] ?>
        </div>
        <div>
            Nom :
            <?php echo $_POST["nom"] ?>
        </div>
        <div>
            E-mail :
            <?php echo $_POST["mail"] ?>
        </div>
        <h5>Adresse de livraison</h5>
        <div>
            Adresse :
            <?php echo $_POST["adresseLivr"] ?>
        </div>
        <?php 
        if(!(trim($_POST["adresse2Livr"]) == "")){
        ?>
        <div>
            Complément :
            <?php echo $_POST["adresse2Livr"] ?>
        </div>
        <?php } ?>
        <div>
            Pays :
            <?php echo $_POST["paysLivr"] ?>
        </div>
        <div>
            Ville :
            <?php echo $_POST["villeLivr"] ?>
        </div>
        <div>
            Code postal :
            <?php echo $_POST["codeLivr"] ?>
        </div>
        <h5>Adresse de facturation</h5>
        <div>
            Adresse :
            <?php echo $_POST["adresseFact"] ?>
        </div>
        <?php 
        if(!(trim($_POST["adresse2Fact"]) == "")){
        ?>
        <div>
            Complément :
            <?php echo $_POST["adresse2Fact"] ?>
        </div>
        <?php } ?>
        <div>
            Pays :
            <?php echo $_POST["paysFact"] ?>
        </div>
        <div>
            Ville :
            <?php echo $_POST["villeFact"] ?>
        </div>
        <div>
            Code postal :
            <?php echo $_POST["codeFact"] ?>
        </div>
    </div>
    <div class="col-md-5 infosG">
        <h5>Panier</h5>
        <?php
            $total = 0;
            foreach ($_SESSION["panier"] as $value) {
                $produit = getProduit($value[0]);
                echo "<div>".$value[1]."x ".$produit["label"]."</div>";
                $total += $value[1]*floatval($produit["prix"]);
            }
        ?>
        <hr>
        <div>
            Sous-total : <?php echo $total ?>€</br>
            Frais : <?php echo $_SESSION["taxes"] ?>€</br>
            Total : <?php echo ($total+floatval($_SESSION["taxes"])) ?>€<br/>
        </div>
    </div>
    <?php 
        if(verificationFinale($_SESSION["panier"])){
            echo '<input type=hidden value=\''.json_encode($_SESSION["panier"]).'\' id="datas"/>';
            echo '<input type="button" class="btn btn-primary" value="Valider" onclick="verification_informations()"\>';
        }else{
            echo 'Un problème est survenu lors de la vérification des stocks.';
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="./js/confirmCommande.js"></script>
</div>