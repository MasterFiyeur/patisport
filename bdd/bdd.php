<?php 

$cnx="";

function Connexion(){
    include 'bddData.php';
    $ret;
    try{
        $GLOBALS['cnx'] = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $mdp);
        return true;
    }catch(PDOException $e){
        print "Erreur de connexion PDO";
        return false;
    }
}

function Deconnexion(){
    $GLOBALS['cnx']=null;
}

function recup(){
    echo Connexion();
    var_dump($GLOBALS['cnx']);
}

function getCategories(){
    if (Connexion()==false){
        echo "Erreur dans la lecture des catégories";
        return NULL;
    }
    try{
        $req = $GLOBALS['cnx'] -> prepare('SELECT * FROM categories');
        $req -> execute();
        $res = array();
        foreach ($req as $row) {
            array_push($res,$row);
        }
        Deconnexion();
        $req = NULL;
        return $res;
    }catch (PDOException $e) {
        print "Erreur !".$e -> getMessage();
        return NULL;
    }
}

function getProduits($categorie){
    if (Connexion()==false){
        echo "Erreur dans la lecture des produits";
        return NULL;
    }
    try{
        if(strrpos($categorie, ";")!=false){
            //Prévention des injections
            return;
        }
        $req = $GLOBALS['cnx'] -> prepare('SELECT * FROM '.$categorie);
        $req -> execute();
        $res = array();
        foreach ($req as $row) {
            array_push($res,$row);
        }
        Deconnexion();
        $req = NULL;
        return $res;
    }catch (PDOException $e) {
        print "Erreur !".$e -> getMessage();
        return NULL;
    }
}

?>