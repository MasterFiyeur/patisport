<?php
include __DIR__.'/../bdd/bdd.php';

if(!empty($_POST) 
    && isset($_POST["ref"])
    && isset($_POST["user"])
    && isset($_POST["mdp"])
    && isset($_POST["label"])
    && isset($_POST["prix"])
    && isset($_POST["stock"])
    && isset($_POST["img"])
    && isset($_POST["categorie"])){
    if(auth($_POST["user"],$_POST["mdp"])==2){
        if(strlen($_POST["label"])<50
        && floatval($_POST["prix"])>0
        && strlen($_POST["img"])<50 
        && ((intval($_POST["stock"])!=0) 
            || $_POST["stock"]=0
            || $_POST["stock"]="0")){
            updateProduit();
        }else{
            echo "Erreur, les arguments ne sont pas conformes.";
        }
    }else{
        echo "Erreur, l'utilisateur n'est pas administrateur.";
    }
}else{
    echo "Erreur, il n'y a pas les arguments requis.";
}
?>