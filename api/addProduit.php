<?php
include __DIR__.'/../bdd/bdd.php';



if(!empty($_POST)
    && isset($_POST["ref"])
    && trim($_POST["ref"]) != ""
    && isset($_POST["user"])
    && trim($_POST["user"]) != ""
    && isset($_POST["mdp"])
    && trim($_POST["mdp"]) != ""
    && isset($_POST["label"])
    && trim($_POST["label"]) != ""
    && isset($_POST["prix"])
    && isset($_POST["stock"])
    && isset($_POST["img"])
    && trim($_POST["img"]) != ""
    && isset($_POST["categorie"])
    && trim($_POST["categorie"]) != ""){
    if(auth($_POST["user"],$_POST["mdp"])==2){
        if(strlen($_POST["label"])<50
        && floatval($_POST["prix"])>0
        && strlen($_POST["img"])<50 
        && strlen($_POST["categorie"])>2
        && ((intval($_POST["stock"])!=0) 
            || $_POST["stock"]=0
            || $_POST["stock"]="0")){
            addProduit();
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