<?php
include __DIR__.'/../bdd/bdd.php';

if(!empty($_POST) && isset($_POST["ref"]) && isset($_POST["user"]) && isset($_POST["mdp"])){
    if(auth($_POST["user"],$_POST["mdp"])==2){
        $produit = getProduit($_POST["ref"]); 
        supprimerProduit($produit);
    }else{
        echo "Erreur, l'utilisateur n'est pas administrateur.";
    }
}else{
    echo "Erreur, il n'y a pas les arguments requis.";
}
?>