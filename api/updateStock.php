<?php
include __DIR__.'/../bdd/bdd.php';

if(!empty($_POST)){
    $panier = $_POST["informations"];
    if(verificationFinale($panier)){
        foreach ($panier as $value) {
            $stockTotal = getStock($value[0]);
            $nouveauStock = $stockTotal - $value[1];
            if(!updateStock($value[0],$nouveauStock)){
                echo "Erreur";
                return;
            };
        }
        echo "ok";
    }else{
        echo "Erreur";
    }
}
?>