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
        $req = $GLOBALS['cnx'] -> prepare('SELECT * FROM categories;');
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
        $req = $GLOBALS['cnx'] -> prepare('SELECT * FROM produits WHERE categorie = ?;');
        $req -> execute(array($categorie));
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

function auth($user,$password){
    if (Connexion()==false){
        echo "Erreur dans la connexion.";
        return NULL;
    }
    try{
        $req = $GLOBALS['cnx'] -> prepare('SELECT * FROM users WHERE user = ? AND password = ?;');
        $req -> execute(array($user,$password));
        $res = array();
        foreach ($req as $row) {
            array_push($res,$row);
        }
        Deconnexion();
        $req = NULL;
        if(count($res)>0){
            if($res[0]['role']=='administrateur'){
                return 2;
            }else{
                return 1;
            }
        }else{
            return 0;
        }
    }catch (PDOException $e) {
        print "Erreur !".$e -> getMessage();
        return 0;
    }
}

function getStock($ref){
    if (Connexion()==false){
        echo "Erreur dans la lecture du stock du produit.";
        return NULL;
    }
    try{
        $req = $GLOBALS['cnx'] -> prepare('SELECT stock FROM produits WHERE ref = ? LIMIT 1;');
        $req -> execute(array($ref));
        $res = array();
        foreach ($req as $row) {
            array_push($res,$row);
        }
        Deconnexion();
        $req = NULL;
        return count($res)>0?intval($res[0]['stock']):0;
    }catch (PDOException $e) {
        print "Erreur !".$e -> getMessage();
        return NULL;
    }
}

function getProduit($ref){
    if (Connexion()==false){
        echo "Erreur dans la lecture du stock du produit.";
        return NULL;
    }
    try{
        $req = $GLOBALS['cnx'] -> prepare('SELECT * FROM produits WHERE ref = ? LIMIT 1;');
        $req -> execute(array($ref));
        $res = array();
        foreach ($req as $row) {
            array_push($res,$row);
        }
        Deconnexion();
        $req = NULL;
        return count($res)>0?$res[0]:NULL;
    }catch (PDOException $e) {
        print "Erreur !".$e -> getMessage();
        return NULL;
    }
}

function verificationFinale($panier){
    foreach ($panier as $value){
        $produit = getProduit($value[0]);
        if(intval($value[1])>intval($produit['stock'])){
            return false;
        }
    }
    return true;
}
?>